<?php
use Src\Models\Setting;

$settings = new Setting();
$settings = $settings->first();

loadHtml(__DIR__ . '/../../resources/admin/layout', [
    'background' => 'bg-success',
    'type' => __('Edit'),
    'icon' => 'bi bi-gear-fill',
    'title' => __('Settings'),
    'body' => __DIR__ . '/body/form',
    'data' => ['settings' => $settings],
    'plugins' => ['tinymce'],
]);

function loadInFooter(): void
{
    loadHtml(__DIR__.'/../../resources/admin/partials/gallery') ?>

    <script type="text/javascript" src="<?php asset('libs/jquery/jquery.mask.min.js?ver='.APP_VERSION)?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Gallery.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/ChangeLocationMaps.js?ver='.APP_VERSION) ?>"></script>
    <script type="text/javascript">
        $('#phone').mask('+00 (00) 0 0000-0000');
        $('#whatsapp').mask('+00 (00) 0 0000-0000');

        const gallery = new Gallery();

        gallery.openModalSelect($('[data-upload=site_logo_main]'), 'radio');
        gallery.openModalSelect($('[data-upload=site_logo_secondary]'), 'radio');
        gallery.openModalSelect($('[data-upload=site_favicon]'), 'radio');
        gallery.openModalSelect($('[data-upload=site_bg_login]'), 'radio');

        tinymce.init({
            selector: '#tinymce',
            language: 'pt_BR',
            height: 500,
            image_advtab: true,
            plugins: 'code anchor autolink charmap codesample emoticons link lists searchreplace visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat code',
        });
    </script>
<?php }
