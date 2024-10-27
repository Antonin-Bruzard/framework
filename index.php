<?php

use Src\App;
use App\Controller\MainController;

require_once 'src/functions.php';
require 'vendor/autoload.php';

/*
 * Initialisation de l'application
*/
App::get()->router()->handle($_SERVER['REDIRECT_URL'], $_SERVER['argv']);



// TODO: Utiliser les annotation php pour faire le système de routing

// routing



// La en gros, on va chercher a démarrer notre app (UNE SEULE FOIS):
// - conf
// db
// conteneur d'injection d dépendance (DIC/DI).
// Router ...

//dp($_SERVER);

