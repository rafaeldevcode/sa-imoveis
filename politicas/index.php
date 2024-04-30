<?php


verifyMethod(405, 'GET');

loadHtml(__DIR__ . '/../resources/client/layout', [
    'title' => 'Políticas',
    'body' => __DIR__ . '/body/read',
]);
