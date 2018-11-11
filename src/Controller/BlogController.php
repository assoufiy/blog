<?php
    // src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


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
}
