<?php

verifyMethod(405, 'POST');

use Src\Models\Economic;

$requests = requests();

$economic = new Economic();

$economic->find($requests->id)->update([
    'type' => $requests->type,
    'month' => $requests->month,
    'year' => $requests->year,
    'percentage_year' => $requests->percentage_year,
    'percentage_month' => $requests->percentage_month,
]);

session([
    'message' => __('Price index updated successfully!'),
    'type' => 'success',
]);

return header(route('/admin/economic', true), true, 302);
