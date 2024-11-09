<?php

use Src\Models\Category;
use Src\Models\Property;
use Src\Models\Setting;

$property = new Property();
$category = new Category();
$settings = new Setting();
$requests = requests();

$property = $property->where('status', '=', 'disponivel', 'disponivel')->orWhere('status', '=', 'reservado', 'reservado');
$categoriesArray = getArraySelect($category->get(), 'id', 'name');
$setting = $settings->first();

if (isset($requests->search_type) && $requests->search_type === '1') {
    $property->where('code', 'LIKE', "%{$requests->search}%")->orWhere('name', 'LIKE', "%{$requests->search}%");
} else {
    if (isset($requests->type) && !empty($requests->type)) {
        $property = $property->where('type', '=', $requests->type);
    }

    if (isset($requests->category_id) && !empty($requests->category_id)) {
        $property = $property->where('category_id', '=', $requests->category_id);
    }

    if (isset($requests->bedrooms) && !empty($requests->bedrooms)) {
        $property = $property->where('details', 'LIKE', "%{$requests->bedrooms}%");
    }

    if (isset($requests->andress) && !empty($requests->andress)) {
        $property = $property->where('city', 'LIKE', "%{$requests->andress}%");
    }

    if (isset($requests->value) && !empty($requests->value)) {
        $property->where('value', '<=', $requests->value);
    }

    if (isset($requests->type) && !empty($requests->type)) {
        $property->where('type', '=', $requests->type);
    }
}

$property->where('status', '=', 'disponivel', 'disponivel')->orWhere('status', '=', 'reservado', 'reservado');

$properties = $property->paginate(15);

loadHtml(__DIR__ . '/../resources/client/layout', [
    'title' => 'Pesquisar',
    'body' => __DIR__ . '/body/read',
    'plugins' => ['slick'],
    'data' => [
        'properties' => $properties,
        'search' => isset($requests->search) ? $requests->search : null,
        'categories' => $categoriesArray,
        'requests' => $requests,
        'cities' => isset($setting->cities) ? json_decode($setting->cities, true) : [],
    ],
]);

function loadInFooter()
{ ?>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/InputRange.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Favorite.js') ?>"></script>
    <script type="text/javascript">
        Favorite.init();
        InputRange.init();

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
