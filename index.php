<?php

verifyMethod(405, 'GET');

use Src\Models\Category;
use Src\Models\Property;
use Src\Models\Setting;

$settings = new Setting();
$category = new Category();

$setting = $settings->first();
$releases = (new Property)->where('is_launch', '=', 'on')->where('status', '!=', 'unavailable')->paginate(6);
$sell = (new Property)->where('type', '=', 'Vender')->where('status', '!=', 'unavailable')->paginate(6);
$toHire = (new Property)->where('type', '=', 'Alugar')->where('status', '!=', 'unavailable')->paginate(6);
$categoriesArray = getArraySelect($category->get(), 'id', 'name');

loadHtml(__DIR__.'/resources/client/layout', [
    'title' => 'Inicio',
    'body' => __DIR__ . '/body/read',
    'data' => [
        'about' => $setting->about_company,
        'releases' => $releases->data,
        'sell' => $sell->data,
        'toHire' => $toHire->data,
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
