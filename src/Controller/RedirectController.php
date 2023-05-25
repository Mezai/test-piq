<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RedirectController extends AbstractController
{

	#[Route('/success', name: 'app_sucess')]
	public function success(): Response
    {
        
         return $this->render('pages/success.html.twig');

    }

}



