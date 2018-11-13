<?php
/**
 * Created by PhpStorm.
 * User: younesform
 * Date: 29/10/18
 * Time: 22:22
 */

namespace App\Controller;


    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;


    class HomeController extends AbstractController
    {
        /**
         * @Route ("/")
         */

        public function index()
        {
            return $this->render('home.html.twig');

        }
   }
