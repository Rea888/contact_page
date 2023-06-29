<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\CustomerType;
use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CustomerController extends AbstractController
{

    private CustomerRepository $customerRepository;
    private ValidatorInterface $validator;

    public function __construct(CustomerRepository $customerRepository, ValidatorInterface $validator)
    {
        $this->customerRepository = $customerRepository;
        $this->validator = $validator;
    }


    #[Route('/customer/index', name: 'app_customer')]
    public function saveDataToDb(Request $request): Response
    {
        $customer = new Customer();

        $form = $this->createForm(CustomerType::class, $customer);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $customer = $form->getData();

                $this->customerRepository->save($customer, true);
                $this->addFlash('success', 'Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen.');
                return $this->redirectToRoute('app_customer');
            } else {
                $this->addFlash('form_submitted', true);
            }
        }

        $errors = $this->validator->validate($customer);

        $errorArray = [];
        foreach ($errors as $violation) {
            $errorArray[] = $violation->getMessage();
        }

        $errorArray = array_unique($errorArray);

        return $this->render('customer/index.html.twig', [
            'form' => $form->createView(),
            'errorArray' => $errorArray,
        ]);
    }
}

