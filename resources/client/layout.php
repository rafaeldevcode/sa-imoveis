<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php !empty(SETTINGS->google_analytics) ? loadHtml(__DIR__ . '/../partials/google-analytics', ['header' => true]) : ''; ?>
    <?php !empty(SETTINGS->facebook_pixel) ? loadHtml(__DIR__ . '/../partials/facebook-pixel', ['header' => true]) : ''; ?>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if (isset($plugins) && in_array('slick', $plugins)) { ?>
        <link rel='stylesheet' href='<?php asset('libs/slick/slick.css') ?>' />
        <link rel='stylesheet' href='<?php asset('libs/slick/slick-theme.css') ?>' />
    <?php } ?>

    <link rel='stylesheet' href='<?php asset('libs/bootstrap-icons/bootstrap-icons.min.css') ?>' />
    <link rel='stylesheet' href='<?php asset('libs/tailwind/client/style.css') ?>' />
    <link rel='stylesheet' href='<?php asset('assets/css/globals.css') ?>' />

    <link rel="shortcut icon" href="<?php asset('assets/images/' . SETTINGS->site_favicon) ?>" alt="Logo <?php echo SETTINGS->site_name ?>">

    <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />
    <meta name="description" content="<?php echo SETTINGS->site_description ?>">

    <title><?php echo SETTINGS->site_name ?> | <?php echo $title ?></title>
</head>
<body>
    <!-- Include Header -->
    <?php loadHtml(__DIR__ . '/partials/header.php') ?>

    <main>
        <?php loadHtml($body, $data)?>
    </main>

    <!-- Include Footer -->
    <?php loadHtml(__DIR__ . '/partials/footer.php') ?>

    <!-- Include flash message -->
    <?php loadHtml(__DIR__.'/../partials/message') ?>

    <!-- Include Preloader -->
    <?php SETTINGS->preloader == 'on' && loadHtml(__DIR__ . '/../partials/preloader', ['position' => 'fixed', 'type' => 'body']) ?>

    <!-- Cookies -->
    <?php SETTINGS->cookies == 'on' && loadHtml(__DIR__.'/../client/partials/alert-cookies') ?>

    <script type="text/javascript" src="<?php asset('libs/jquery/jquery.js')?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/main.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Modal.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Cookies.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/PageBack.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Preloader.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Message.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/ValidateForm.js') ?>"></script>

    <?php if (isset($plugins) && in_array('slick', $plugins)) { ?>
        <script type="text/javascript" src="<?php asset('libs/slick/slick.min.js')?>"></script>
    <?php } ?>
    
    <script type="text/javascript">
        Message.hide('[data-message]');

        if(!Cookies.get('accept_cookies')){
            $('#accept-cookies').removeClass('hidden');
            $('#accept-cookies').addClass('flex');

            $('#accept-cookies').attr('data-cookies-show', true);
        }

        $('#accept-cookies').find('button').click(() => {
            Cookies.set('accept_cookies', true, 3000, '/');

            $('#accept-cookies').attr('data-cookies-show', false);

            setInterval(() => {
                $('#accept-cookies').addClass('hidden');
                $('#accept-cookies').removeClass('flex');
            }, 400);
        });

        // Validate the form
        const validate = new ValidateForm();
        validate.init();

        document.addEventListener("DOMContentLoaded", () => {
            Preloader.hide('body');
        });

        Modal.init();

        // Open and closed menu client
        const button = $('#button-menu-client');
        button.on('click', (event) => {
            const menu = $('#menu-client');

            if(button.attr('data-menu') == 'close'){
                menu.removeClass('hidden');

                button.attr('data-menu', 'open');
            } else {
                menu.addClass('hidden');

                button.attr('data-menu', 'close');
            }
        });
    </script>

    <?php if(function_exists('loadInFooter')) loadInFooter(); ?>
</body>
</html>
