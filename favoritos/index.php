<?php

use Src\Models\Property;

verifyMethod(405, 'GET');

$property = new Property();
$properties = empty(favorites()) ? [] : $property->whereIn('id', favorites());

loadHtml(__DIR__.'/../resources/client/layout', [
    'title' => "Favoritos",
    'body' => __DIR__."/body/read",
    'data' => ['properties' => $properties],
    'plugins' => ['slick'],
]);

function loadInFooter() 
{ ?>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Favorite.js') ?>"></script>
    <script type="text/javascript">
        Favorite.init();

        $(document).ready(function(){
            $('[data-slick="images"]').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
            });
        });
    </script>
<?php }
