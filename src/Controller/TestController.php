<?php

// src/controllers/TestController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class TestController extends AbstractController
{
//    /**
//    * @Route("/test")
//    */
    public function index(Request $request)
    {
        $greeting = 'hello!';
        
        
        
        $form = $this->createFormBuilder()
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();


            return $this->redirectToRoute('success');
        }
        
        return $this->render('test/greeting.html.twig', array(
            'form' => $form->createView(),
            'greeting' => $greeting,
        ));

    }
    
    public function success()
    {
        
        return new Response('<h1>Success</h1>');

    }
}