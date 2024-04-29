<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GreetController extends AbstractController
{
    #[Route('/greet/{first_name}', name: 'app_greet', methods: ['GET'])]
    public function index($first_name): Response
    {
        $capitalisedFirstName = ucfirst($first_name);
        return new Response('Hello ' . $capitalisedFirstName);
    }
}
