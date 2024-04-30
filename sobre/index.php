<?php

verifyMethod(405, 'GET');

use Src\Models\Broker;
use Src\Models\Setting;

$settings = new Setting();
$broker = new Broker();

$brokers = $broker->get();
$setting = $settings->first();

loadHtml(__DIR__ . '/../resources/client/layout', [
    'title' => 'Sobre nós',
    'body' => __DIR__ . '/body/read',
    'data' => ['about' => $setting->about_company, 'brokers' => $brokers],
]);
