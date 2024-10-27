<?php

namespace App\Controller;

use App\Attribute\Route;

class MainController
{
    #[Route('/', method: 'get')]
    public function index(): void
    {
        dd('Index');
    }
}