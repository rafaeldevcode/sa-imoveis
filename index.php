<?php

verifyMethod(405, 'GET');

use Src\Models\Setting;

$settings = new Setting();
$setting = $settings->first();

loadHtml(__DIR__.'/resources/client/layout', [
    'title' => 'Inicio',
    'body' => __DIR__ . '/body/read',
    'data' => ['about' => $setting->about_company],
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
