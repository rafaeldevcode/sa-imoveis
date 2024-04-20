<?php

verifyMethod(405, 'POST');

use Src\Models\Property;

$property = new Property();
$requests = requests();

if ($requests->type === '1') {
    $properties = $property->where('code', '=', $requests->search)->orWhere('name', 'LIKE', "%{$requests->search}%")->paginate(15);
} else {

    if (! empty($requests->category_id)) {
        $property = $property->where('category_id', '=', $requests->category_id);
    }

    if (! empty($requests->bedrooms)) {
        $property = $property->where('details', 'LIKE', "%{$requests->bedrooms}%");
    }

    if (! empty($requests->andress)) {
        $property = $property->where('andress', 'LIKE', "%{$requests->andress}%");
    }

    $property->where('value', '<=', $requests->value);

    $properties = $property->paginate(15);
}

loadHtml(__DIR__.'/../resources/client/layout', [
    'title' => 'Contato',
    'body' => __DIR__."/body/read",
    'plugins' => ['slick'],
    'data' => [
        'properties' => $properties,
        'search' => isset($requests->search) ? $requests->search : null,
    ]
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