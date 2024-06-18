<?php

namespace App\Controller;

use App\Attribute\Route;
use JetBrains\PhpStorm\Deprecated;

class MainController
{
    #[Route('/', method: 'get')]
    public function index(): void
    {
        dd('Index');
    }
}