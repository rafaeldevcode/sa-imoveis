<?php

use Src\Models\Announce;

$announce = new Announce();
$announce = $announce->first();

loadHtml(__DIR__ . '/../resources/client/layout', [
    'title' => 'Simular Financiamento',
    'body' => __DIR__ . '/body/read',
    'data' => ['announce' => $announce],
]);
