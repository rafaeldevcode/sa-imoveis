<?php

verifyMethod(405, 'POST');

use Src\Models\Broker;

$broker = new Broker();
$requests = requests();

foreach ($requests->ids as $ID) {
    $broker->find($ID)->delete();
};

session([
    'message' => __('Broker(s) removed successfully!'),
    'type' => 'success',
]);

return header(route('/admin/brokers', true), true, 302);
