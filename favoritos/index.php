<?php

verifyMethod(405, 'GET');

$categoria = slug(3);

loadHtml(__DIR__.'/../resources/client/layout', [
    'title' => "Favoritos",
    'body' => __DIR__."/body/read",
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
        });
    </script>
<?php }
