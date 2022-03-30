<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/28/2022
 * Time: 10:48 PM
 */

namespace App\Controller;


use App\Entity\Invoice;
use App\Entity\InvoiceLine;
use App\Form\InvoiceType;
use App\Repository\InvoiceRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class InvoiceController
 * @package App\Controller
 * @Route("/invoice")
 */
class InvoiceController extends AbstractController
{
    /**
     * @var ManagerRegistry
     */
    private $doctrine;
    /**
     * @var InvoiceRepository
     */
    private $invoiceRepository;

    /**
     * InvoiceController constructor.
     */
    public function __construct(ManagerRegistry $doctrine, InvoiceRepository $invoiceRepository)
    {
        $this->doctrine = $doctrine;
        $this->invoiceRepository = $invoiceRepository;
    }


    /**
     * @return string
     * @Route("/", name ="invoice_list")
     */
    public function index(Request $request){
        return $this->render("Invoices\invoice-list.html.twig",[
            'invoices' => $this->invoiceRepository->findAll()
        ]);

    }

    /**
     * @return string
     * @Route("/add", name ="invoice_new")
     */
    public function add(Request $request){
            $invoice = new Invoice();

            $line1 = new InvoiceLine();
            $invoice->addLine($line1);
            $form   = $this->createForm(InvoiceType::class , $invoice);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->doctrine->getManager();
                $entityManager->persist($invoice);
                $entityManager->flush();
                return $this->redirect($this->redirectToRoute('invoice_list'));
            }

            return $this->render("Invoices\invoice-add.html.twig",[
                'form' => $form->createView()
            ]);

    }


}