<?php

use Src\Models\Category;
use Src\Models\Property;
use Src\Models\Setting;

$method = empty(querys('method')) ? 'read' : querys('method');

if ($method == 'read') {
    $property = new Property();
    $requests = requests();
    $column = isset($requests->column) && !empty($requests->column) ? $requests->column : 'name';
    $properties = !isset($requests->search) ? $property->paginate(20, $column) : $property->where($column, 'LIKE', "%{$requests->search}%")->paginate(20, $column);
    $background = 'bg-secondary';
    $text = __('View');
    $body = __DIR__ . '/body/read';

    $data = ['properties' => $properties];
} elseif ($method == 'edit') {
    $settings = new Setting();
    $property = new Property();
    $category = new Category();

    $setting = $settings->first();
    $property = $property->find(querys('id'));
    $categories = getArraySelect($category->get(['id', 'name']), 'id', 'name');
    $sities = isset($setting->cities) ? json_decode($setting->cities, true) : [];
    $background = 'bg-success';
    $text = __('Edit');
    $body = __DIR__ . '/body/form';

    $data = [
        'action' => '/admin/properties/update',
        'property' => $property->data,
        'images' => $property->images()->data,
        'categories' => $categories,
        'cities' => array_combine($sities, $sities),
    ];
} elseif ($method == 'create') {
    $category = new Category();
    $settings = new Setting();

    $setting = $settings->first();
    $categories = getArraySelect($category->get(['id', 'name']), 'id', 'name');
    $sities = isset($setting->cities) ? json_decode($setting->cities, true) : [];
    $background = 'bg-primary';
    $text = __('Add');
    $body = __DIR__ . '/body/form';

    $data = [
        'action' => '/admin/properties/create', 
        'categories' => $categories,
        'cities' => array_combine($sities, $sities),
    ];
};

loadHtml(__DIR__ . '/../../resources/admin/layout', [
    'background' => $background,
    'type' => $text,
    'icon' => 'bi bi-house-fill',
    'title' => __('Properties'),
    'routeDelete' => $method == 'read' ? '/admin/properties/delete' : null,
    'routeAdd' => $method == 'create' ? null : '/admin/properties?method=create',
    'body' => $body,
    'data' => $data,
    'plugins' => ['tinymce', 'select2'],
]);

function loadInFooter(): void
{
    loadHtml(__DIR__ . '/../../resources/admin/partials/gallery');
    loadHtml(__DIR__ . '/../../resources/admin/partials/modal-delete') ?>

    <script type="text/javascript" src="<?php asset('libs/jquery/jquery.mask.min.js?')?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Gallery.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/CreateInput.js') ?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/ChangeLocationMaps.js?') ?>"></script>
    <script type="text/javascript">
        // Apply mask
        $('#value_promotion').mask('000.000.000.000.000,00', {reverse: true});
        $('#value').mask('000.000.000.000.000,00', {reverse: true});
        $('#condominium').mask('000.000.000.000.000,00', {reverse: true});
        $('#iptu').mask('000.000.000.000.000,00', {reverse: true});

        const gallery = new Gallery();
        gallery.openModalSelect($('[data-upload=collection]'), 'checkbox');
        gallery.openModalSelect($('[data-upload=ogimage]'), 'radio');

        $('[name="categories"]').select2({placeholder: '----Selecione----'});

        const videos = new CreateInput('videos', '<?php _e('Video') ?>');
        videos.init();

        const characteristics = new CreateInput('characteristics', '<?php _e('Características') ?>');
        characteristics.init();

        tinymce.init({
            selector: '#tinymce',
            language: 'pt_BR',
            height: 880,
            image_advtab: true,
            plugins: 'code anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat code',
            file_picker_callback: (callback, value, meta) => {
                if(meta.filetype == 'image') {
                    (async () => {
                        const images = await gallery.selectedFilesTinymce('radio');

                        if(images.length > 0) {
                            callback(images[0].url, { alt: images[0].alt, width: '100%', height: 'auto' }); 
                        }
                    })();
                }
            }
        });

        function changeColumn(event) {
            console.log($(event.target).parent().parent().parent().parent().submit())
        }
    </script>
<?php }
