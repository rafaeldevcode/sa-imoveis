<?php

verifyMethod(405, 'GET');

use Src\Models\Category;
use Src\Models\Property;
use Src\Models\Setting;

$settings = new Setting();
$category = new Category();

$setting = $settings->first();
$property = new Property();
$lancamentos = $property->where('category_id', '=', 3)->paginate(6);
$vendas = $property->where('category_id', '=', 5)->paginate(6);
$alugueis = $property->where('category_id', '=', 2)->paginate(6);

loadHtml(__DIR__.'/resources/client/layout', [
    'title' => 'Inicio',
    'body' => __DIR__ . '/body/read',
    'data' => [
        'about' => $setting->about_company,
        'lancamentos' => $lancamentos->data,
        'vendas' => $vendas->data,
        'alugueis' => $alugueis->data,
    ],
    'plugins' => ['slick'],
]);

function loadInFooter() 
{ ?>
    <script type="text/javascript">

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
