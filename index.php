<?php

use App\Controller\MainController;
use Src\App;

require_once 'src/functions.php';
require 'vendor/autoload.php';

App::get();

$test = new MainController();


// autoload des class -> intégrer en récursif les namespace
// REP: Pas besoin, c'était un problème de nommage de dossiers controller -> Controller (comme le namespace)

// TODO: Utiliser les annotation php pour faire le système de routing

// routing



// La en gros, on va chercher a démarrer notre app (UNE SEULE FOIS):
// - conf
// db
// conteneur d'injection d dépendance (DIC/DI).
// Router ...

//dp($_SERVER);

