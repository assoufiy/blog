<?php
/**
 * Created by PhpStorm.
 * User: younesform
 * Date: 14/11/18
 * Time: 13:31
 */

namespace App\Controller;


use App\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/show/{id}", name="show_categorie")
     * @ParamConverter
     */

    public function show(Category $category)
    {

        return $this->render('blog/categoryid.html.twig', ['category' => $category]);

    }
}