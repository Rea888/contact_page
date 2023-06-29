<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\CustomerType;
use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{

    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }


    #[Route('/customer/index', name: 'app_customer')]
    public function saveDataToDb(Request $request): Response
    {

        $customer = new Customer();

        $form = $this->createForm(CustomerType::class, $customer);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $customer = $form->getData();

            $this->customerRepository->save($customer, true);
            return $this->redirectToRoute('customer_success');
        }

        return $this->render('customer/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/customer/succeed', name: 'customer_success')]
    public function succeed()
    {
        return $this->render('customer/success.html.twig');
    }
}
