<?php

    verifyMethod(405, 'GET');

    loadHtml(__DIR__.'/resources/client/layout', [
        'title' => 'Inicio',
        'body' => __DIR__ . '/body/read',
        'data' => []
    ]);
