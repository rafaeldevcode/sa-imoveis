<?php

verifyMethod(405, 'GET');

use Src\Models\Broker;
use Src\Models\Category;
use Src\Models\Economic;
use Src\Models\Property;
use Src\Models\Setting;

$settings = new Setting();
$category = new Category();
$broker = new Broker();

$economic = [];
$year = date('Y');
$month = date('m');

// $igpm = (new Economic)->where('type', '=', 'IGPM')->where('year', '=', $year)->where('month', '=', $month)->first();
// $incc = (new Economic)->where('type', '=', 'INCC')->where('year', '=', $year)->where('month', '=', $month)->first();
// $cub = (new Economic)->where('type', '=', 'CUB')->where('year', '=', $year)->where('month', '=', $month)->first();

$igpm = (new Economic)->where('type', '=', 'IGPM')->first();
$incc = (new Economic)->where('type', '=', 'INCC')->first();
$cub = (new Economic)->where('type', '=', 'CUB')->first();

if (!is_null($igpm)) {
    $economic['igpm'] = $igpm;
}

if (!is_null($incc)) {
    $economic['incc'] = $incc;
}

if (!is_null($cub)) {
    $economic['cub'] = $cub;
}

$setting = $settings->first();
$brokers = $broker->where('show_in_home', '=', 'on')->get();
$releases = (new Property())->where('is_launch', '=', 'on')->where('is_highlighted', '=', 'on')->where('status', '=', 'disponivel', 'disponivel')->orWhere('status', '=', 'reservado', 'reservado')->paginate(6);
$sell = (new Property())->where('type', '=', 'Vender')->where('is_highlighted', '=', 'on')->where('status', '=', 'disponivel', 'disponivel')->orWhere('status', '=', 'reservado', 'reservado')->paginate(6);
$toHire = (new Property())->where('type', '=', 'Alugar')->where('is_highlighted', '=', 'on')->where('status', '=', 'disponivel', 'disponivel')->orWhere('status', '=', 'reservado', 'reservado')->paginate(6);
$categoriesArray = getArraySelect($category->get(), 'id', 'name');

loadHtml(__DIR__ . '/resources/client/layout', [
    'title' => 'Inicio',
    'body' => __DIR__ . '/body/read',
    'data' => [
        'about' => $setting->about_company,
        'cities' => isset($setting->cities) ? json_decode($setting->cities, true) : [],
        'releases' => $releases->data,
        'sell' => $sell->data,
        'toHire' => $toHire->data,
        'categories' => $categoriesArray,
        'brokers' => $brokers,
        'economic' => $economic,
    ],
    'plugins' => ['slick'],
]);

function loadInFooter()
{ ?>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/InputRange.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Favorite.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/MegaMenu.js') ?>"></script>
    <script type="text/javascript">
        MegaMenu.init();
        Favorite.init();
        InputRange.init();

        $(document).ready(function(){
            const viewportWidth = window.innerWidth;

            if (viewportWidth >= 700) {
                $('[data-banner="mobile"]').remove();
            } else {
                $('[data-banner="desktop"]').remove();
            }

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
