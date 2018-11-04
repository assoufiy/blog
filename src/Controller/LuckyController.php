<?php
/**
 * Created by PhpStorm.
 * User: younesform
 * Date: 29/10/18
 * Time: 17:51
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
        /**
         * @Route("/lucky/number")
        */
        public function number()
        {
           $number = random_int(0,100);
           return new Response(
               '<html><body>Lucky number: '.$number.'</body></html>');
        }
}