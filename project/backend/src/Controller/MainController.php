<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController
{
    #[Route(path: '/', name: 'main_app')]
    public function main(Request $request): Response
    {
        $basePath = $request->getBasePath();

        return new JsonResponse(['name' => 'Ruwen']);
    }
}