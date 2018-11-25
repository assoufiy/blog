<?php
    // src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Article;
use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ArticleType;



class BlogController extends AbstractController
{
/**
* Matches /blog exactly
* @Route("/blog/{page}", requirements={"page"="\d+"}, methods={"GET"}, name="blog_list")
*/
    public function list($page)
    {
        return $this->render('blog/index.html.twig', ['page' => $page]);
    }

    /**
     * @Route("blog/{slug}", requirements={"slug"="[a-z|0-9|-]+"}, methods={"GET"}, name="blog_show")
     * @param string $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($slug = "Article Sans Titre")
    {
    $slug = ucwords(str_replace("-", " ", $slug));
        return $this->render('blog/show.html.twig', ['slug' => $slug]);
    }

    /**
     * @Route("blogCat", name="blog_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request) : Response
    {
        $category = new Category();
        $repository = $this->getDoctrine()->getRepository(Category::class);
        $categories = $repository->findAll();
        $articles = $category->getArticles();

        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $data = $this->getDoctrine()->getManager();
            $data->persist($category);
            $data->flush();
            // $data contient les données du $_POST

        }
        return $this->render('blog/index.html.twig', ['categories' => $categories, 'articles' => $articles, 'form' => $form->createView()]);
    }

    /**
     * @Route("article/new", name="article_new")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexFormArticle(Request $request) : Response
    {

        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $data = $this->getDoctrine()->getManager();
            $data->persist($article);
            $data->flush();
            // $data contient les données du $_POST

        }
        return $this->render('blog/addNewArticle.html.twig', ['article' => $article, 'form' => $form->createView()]);
    }

    /**
     * @Route("/category/{category}", name="blog_show_category")
     * @param string $category
     * @return Response
     */
    public function showByCategory(string $category) : Response
    {
        $repository = $this->getDoctrine()->getRepository(Category::class);
        $category = $repository->findOneBy(['name' => $category]);
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repository->findBy(['category' => $category], ['id' => 'DESC'], 3 );

        return $this->render('/blog/category.html.twig', ['category' => $category, 'articles'=> $articles]);
    }
}
