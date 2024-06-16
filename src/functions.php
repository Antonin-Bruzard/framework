<?php

function dp($toDump)
{
    echo '<pre><code>';
    var_dump($toDump);
    echo '</code></pre>';
}

function dd($toDump)
{
    dp($toDump);
    die();
}