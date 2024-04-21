<?php

verifyMethod(405, 'GET');

use Src\Models\Category;
use Src\Models\Property;
use Src\Models\Setting;

$settings = new Setting();
$category = new Category();
$property = new Property();

$setting = $settings->first();
$categoriesArray = getArraySelect($category->get(), 'id', 'name');
$properties = [];

foreach ($category->where('home', '=', 'on')->get() as $category) {
    $categories = $property->where('category_id', '=', $category->id)->where('status', '!=', 'unavailable')->paginate(6);
    $properties[$category->slug]['properties'] = $categories->data;
    $properties[$category->slug]['category_name'] = $category->name;
    $properties[$category->slug]['category_slug'] = $category->slug;
}

$properties = array_replace(array_flip(['lancamentos', 'vendas', 'alugar']), $properties);

loadHtml(__DIR__.'/resources/client/layout', [
    'title' => 'Inicio',
    'body' => __DIR__ . '/body/read',
    'data' => [
        'about' => $setting->about_company,
        'properties' => $properties,
        'categories' => $categoriesArray,
    ],
    'plugins' => ['slick'],
]);

function loadInFooter() 
{ ?>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/InputRange.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Favorite.js') ?>"></script>
    <script type="text/javascript">
        Favorite.init();
        InputRange.init();

        $(document).ready(function(){
            $('[data-slick="images"]').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
            });

            $('[data-slick="cards"]').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                responsive: [{
                    breakpoint: 960,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 720,
                    settings: {
                        slidesToShow: 1
                    }
                }]
            });
        });
    </script>
<?php }
