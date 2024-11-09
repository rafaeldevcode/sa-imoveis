<?php

use Src\Models\Category;
use Src\Models\Property;

$categoryModel = new Category();
$property = new Property();

$category = $categoryModel->where('slug', '=', slug(3))->first();
$requests = requests();
$type = isset($requests->type) ? $requests->type : null;

if (!isset($category)) {
    abort(404, 'Category Not Found', 'danger');
}

$query = $property->where('category_id', '=', $category->id)->where('status', '=', 'disponivel', 'disponivel')->orWhere('status', '=', 'reservado', 'reservado');

if (!is_null($type)) {
    $properties = $query->where('type', '=', $type)->paginate(15);
} else {
    $properties = $query->paginate(15);
}

loadHtml(__DIR__ . '/../../resources/client/layout', [
    'title' => "Categoria {$category->name}",
    'body' => __DIR__ . '/body/read',
    'data' => ['category' => $category, 'properties' => $properties],
    'plugins' => ['slick'],
]);

function loadInFooter()
{ ?>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Favorite.js') ?>"></script>
    <script type="text/javascript">
        Favorite.init();
        // $(document).ready(function(){
        //     $('[data-slick="images"]').slick({
        //         slidesToShow: 1,
        //         slidesToScroll: 1,
        //         infinite: true,
        //         arrows: true,
        //     });
        // });
    </script>
<?php }
