<?php

verifyMethod(405, 'GET');

use Src\Models\Property;
use Src\Models\PropertyView;

$property = (new Property())->find(slug(2));
$propertyView = new PropertyView();

if (!isset($property->data) || (($property->data->status === 'indisponivel' || $property->data->status === 'vendido') && !autenticate())) {
    abort(404, 'Property Not Found', 'danger');
}

$properties = (new Property())->where('category_id', '=', $property->data->category_id)->where('status', '=', 'disponivel', 'disponivel')->orWhere('status', '=', 'reservado', 'reservado')->paginate(3);
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

function loadInHead()
{
    $uri = $_SERVER['REQUEST_URI'];
    $matches = [];

    if (preg_match('#^/imoveis/(\d+)#', $uri, $matches)) {
        $propertyId = $matches[1];

        $property = (new Property())->find($propertyId)->data ?? null;

        if ($property && $property->ogimage) {
            $image = getOgImage($property->ogimage);

            $title = htmlspecialchars($property->name ?? 'Imóvel');
            $description = "A Santo Antônio Imóveis, localizada em Serafina Corrêa, ao lado da Praça Central, está à disposição para ajudar você a encontrar as melhores opções de imóveis. 👉Confira abaixo uma ótima oportunidade:";
            $image = isset($image) ? asset("assets/images/{$image->file}", true) : asset('assets/images/'.SETTINGS->site_logo_main, true);
            ?>
            <meta property="og:title" content="<?php echo $title ?>" />
            <meta property="og:description" content="<?php echo htmlspecialchars($description) ?>" />
            <meta property="og:image" content="<?php echo $image ?>" />
            <meta property="og:url" content="<?php echo getCurrentUrl() ?>" />
            <meta property="og:site_name" content="Santo Antônio Imóveis" />
            <meta property="og:locale" content="pt_BR" />
            <meta property="og:type" content="website" />
            <?php
        }
    }
}

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

        // $(document).ready(function(){
        //     $('[data-slick="images"]').slick({
        //         slidesToShow: 1,
        //         slidesToScroll: 1,
        //         infinite: true,
        //         arrows: true,
        //     });
        // });
    </script>
<?php }
