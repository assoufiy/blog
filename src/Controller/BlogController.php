<?php
    // src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Article;
use App\Entity\Category;


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
    public function index()
    {
        $category = new Category();
        $repository = $this->getDoctrine()->getRepository(Category::class);
        $categories = $repository->findAll();
        $articles = $category->getArticles();
        return $this->render('blog/index.html.twig', ['categories' => $categories, 'articles' => $articles]);
    }
}
