<?php

verifyMethod(500, 'POST');

use Src\Models\Category;

$category = new Category();
$requests = requests();

foreach ($requests->ids as $ID) {
    $category->find($ID)->delete();
};

session([
    'message' => __('Category(ies) removed successfully!'),
    'type' => 'success',
]);

return header(route('/admin/properties/categories', true), true, 302);
