<?php
/**
 * Created by PhpStorm.
 * User: lemaitre
 * Date: 2018/9/25
 * Time: 上午10:56
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
#use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Service\FileUploader;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin_page")
     */
    public function main()
    {
        return $this->render('admin/main.html.twig');
    }

    /**
     * @Route("/admin/import", name="admin_import")
     * @param Request $request
     * @param FileUploader $fileUploader
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function import(Request $request, FileUploader $fileUploader)
    {
        if($request->isMethod('POST')) {
            $xlsx = $request->files->get('xlsx');
            dump($fileUploader->upload($xlsx));
            exit;
        }
        return $this->render('admin/import.html.twig');
    }


}