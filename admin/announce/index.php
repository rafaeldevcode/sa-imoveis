<?php
use Src\Models\Announce;

$announce = new Announce();
$announce = $announce->first();

loadHtml(__DIR__ . '/../../resources/admin/layout', [
    'background' => 'bg-success',
    'type' => __('Edit'),
    'icon' => 'bi bi-megaphone-fill',
    'title' => __('Announce'),
    'body' => __DIR__ . '/body/form',
    'data' => ['announce' => $announce],
    'plugins' => ['tinymce'],
]);

function loadInFooter(): void
{
    loadHtml(__DIR__ . '/../../resources/admin/partials/gallery') ?>

    <script type="text/javascript" src="<?php asset('assets/scripts/class/Gallery.js?') ?>"></script>
    <script type="text/javascript">
        const gallery = new Gallery();

        gallery.openModalSelect($('[data-upload=thumbnail]'), 'radio');

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
