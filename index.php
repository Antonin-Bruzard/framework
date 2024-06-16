<?php

use App\Controller\MainController;
use Src\App;

require_once 'src/functions.php';
require 'vendor/autoload.php';

App::get();

$test = new MainController();


// autoload des class -> intégrer en récursif les namespace

// TODO: Utiliser les annotation php pour faire le système de routing

// routing



// La en gros, on va chercher a démarrer notre app (UNE SEULE FOIS):
// - conf
// db
// conteneur d'injection d déoendance (DIC/DI).
// Router ...

//dp($_SERVER);

