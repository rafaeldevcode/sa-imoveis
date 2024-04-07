<?php

verifyMethod(405, 'GET');

loadHtml(__DIR__.'/../resources/client/layout', [
    'title' => "Imóvel",
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

