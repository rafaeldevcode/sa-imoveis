<?php

verifyMethod(405, 'GET');

use Src\Models\Property;
use Src\Models\PropertyView;

$property = (new Property())->find(slug(2));
$propertyView = new PropertyView();

if (!isset($property->data) || ($property->data->status === 'unavailable' && !autenticate())) {
    abort(404, 'Property Not Found', 'danger');
}

$properties = (new Property())->where('category_id', '=', $property->data->category_id)->paginate(4);
$propertyView->create([
    'property_id' => $property->data->id,
    'date' => date('Y-m-d H:i:s'),
]);

loadHtml(__DIR__ . '/../resources/client/layout', [
    'title' => 'Imóvel',
    'body' => __DIR__ . '/body/read',
    'data' => [
        'category' => $property->category()->data[0],
        'property' => $property->data,
        'videos' => isset($property->data->videos) ? json_decode($property->data->videos, true) : [],
        'characteristics' => isset($property->data->characteristics) ? json_decode($property->data->characteristics) : [],
        'details' => json_decode($property->data->details, true),
        'properties' => $properties->data,
    ],
    'plugins' => ['slick'],
]);

function loadInFooter()
{ ?>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Videos.js') ?>"></script>    
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Images.js') ?>"></script>    
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Favorite.js') ?>"></script>
    <script type="text/javascript">
        Favorite.init();
        
        const images =  new Images;
        images.init();

        const videos =  new Videos;
        videos.init();

        $('[data-iframe="location"]').on('click', (event) => {
            const iframe = $(`#${$(event.target).attr('data-iframe')}`);
            
            iframe.attr('src', iframe.attr('data-src'));

            $(event.target).parent().remove();
        });

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
