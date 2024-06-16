<?php

require_once('src/app.php');
require_once('src/kernel.php');

// La en gros, on va chercher a démarrer notre app (UNE SEULE FOIS):
// - conf
// db
// conteneur d'injection d déoendance (DIC/DI).
// Router ...

dp($_SERVER);

