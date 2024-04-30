<?php

verifyMethod(405, 'GET');

loadHtml(__DIR__.'/../resources/client/layout', [
    'title' => 'Anunciar imóvel',
    'body' => __DIR__."/body/form"
]);

function loadInFooter(): void
{ ?>
    <script type="text/javascript" src="<?php asset('libs/jquery/jquery.mask.min.js')?>"></script>
    <script type="text/javascript">
        $('#phone').mask('+55 (00) 0000-0000');
        $('#whatsapp').mask('+55 (00) 0 0000-0000');
    </script>
<?php }
