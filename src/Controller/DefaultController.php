<?php
/**
 * Created by PhpStorm.
 * User: lemaitre
 * Date: 2018/9/24
 * Time: 下午4:35
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function main()
    {
        return $this->render('default/main.html.twig');
    }
}