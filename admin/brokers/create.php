<?php

verifyMethod(405, 'POST');

use Src\Models\Broker;

$requests = requests();

$showInHome = isset($requests->show_in_home) ? $requests->show_in_home : 'off';

$broker = new Broker();

$broker->create([
    'name' => $requests->name,
    'thumbnail' => $requests->thumbnail,
    'show_in_home' => $showInHome,
]);

session([
    'message' => __('Broker added successfully!'),
    'type' => 'success',
]);

return header(route('/admin/brokers', true), true, 302);
