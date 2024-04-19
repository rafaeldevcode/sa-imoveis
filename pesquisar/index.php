<?php

verifyMethod(405, 'POST');

use Src\Models\Property;

$property = new Property();
$requests = requests();

if ($requests->type === '1') {
    $properties = $property->where('code', '=', $requests->search)->orWhere('name', 'LIKE', "%{$requests->search}%")->paginate(15);
} else {
    $property->paginate(15);
}

loadHtml(__DIR__.'/../resources/client/layout', [
    'title' => 'Contato',
    'body' => __DIR__."/body/read",
    'plugins' => ['slick'],
    'data' => [
        'properties' => $properties,
        'search' => $requests->search,
    ]
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
        });
    </script>
<?php }
