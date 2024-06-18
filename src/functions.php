<?php

function dump($toDump): void
{
    echo '<pre><code>';
    var_dump($toDump);
    echo '</code></pre>';
}

function dd($toDump): void
{
    dump($toDump);
    die();
}