<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/28/2022
 * Time: 10:48 PM
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class InvoiceController
 * @package App\Controller
 * @Route("/")
 */
class InvoiceController extends AbstractController
{
    /**
     * @return string
     * @Route("/", name ="invoice_index")
     */
    public function index(){
        return $this->render("base.html.twig");

    }
}