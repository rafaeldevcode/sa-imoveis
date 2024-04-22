<?php

verifyMethod(405, 'POST');

use Src\Models\Gallery;

$gallery = new Gallery();

foreach (requests()->ids as $id) {
    $image = $gallery->find($id);

    isset($image->data) && deleteDir(__DIR__ . "/../../public/assets/images/{$image->data->file}");

    $image->properties()->detach($id);

    $image->delete();
};

session([
    'message' => __('Images removed successfully!'),
    'type' => 'success',
]);

return header(route('/admin/gallery', true), true, 302);
