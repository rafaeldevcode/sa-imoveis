<?php

verifyMethod(405, 'POST');

use Src\Models\Economic;

$economic = new Economic();
$requests = requests();

foreach ($requests->ids as $ID) {
    $economic->find($ID)->delete();
};

session([
    'message' => __('Price indice(s) removed successfully!'),
    'type' => 'success',
]);

return header(route('/admin/economic', true), true, 302);
