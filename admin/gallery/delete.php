<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\Gallery;

verifyMethod(500, 'POST');

$gallery = new Gallery();

foreach(requests()->ids as $id):
    $image = $gallery->find($id);

    deleteDir(__DIR__."/../../public/assets/images/{$image->data->file}");

    $image->delete();
endforeach;

session([
    'message' => 'Image(s) removida(s) com sucesso!',
    'type' => 'cm-success'
]);

return header('Location: /admin/gallery', true, 302);
