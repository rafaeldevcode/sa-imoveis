<?php

verifyMethod(405, 'GET');

use Src\Models\Property;

$property = new Property();
$property = $property->find(slug(2));

if (! isset($property)) {
    abort(404, 'Property Not Found', 'danger');
}

loadHtml(__DIR__.'/../resources/client/layout', [
    'title' => "Imóvel",
    'body' => __DIR__."/body/read",
    'data' => [
        'category' => $property->category()->data[0], 
        'property' => $property->data, 
        'videos' => json_decode($property->data->videos, true),
        'characteristics' => json_decode($property->data->characteristics),
        'details' => json_decode($property->data->details, true),
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

