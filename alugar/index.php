<?php

use Src\Models\Property;

$property = new Property();
$properties = $property->where('type', '=', 'Alugar')->where('status', '=', 'available', 'available')->orWhere('status', '=', 'reserved', 'reserved')->paginate(15);

loadHtml(__DIR__ . '/../resources/client/layout', [
    'title' => 'Alugar',
    'body' => __DIR__ . '/body/read',
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
