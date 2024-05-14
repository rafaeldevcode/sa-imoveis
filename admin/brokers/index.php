<?php

use Src\Models\Broker;

$method = empty(querys('method')) ? 'read' : querys('method');

if ($method == 'read') {
    $user = new Broker();
    $requests = requests();
    $brokers = !isset($requests->search) ? $user->paginate(20) : $user->where('name', 'LIKE', "%{$requests->search}%")->paginate(20);
    $background = 'bg-secondary';
    $text = __('View');
    $body = __DIR__ . '/body/read';

    $data = ['brokers' => $brokers];
} elseif ($method == 'edit') {
    $broker = new Broker();
    $broker = $broker->find(querys('id'));
    $background = 'bg-success';
    $text = __('Edit');
    $body = __DIR__ . '/body/form';

    $data = ['broker' => $broker->data, 'action' => '/admin/brokers/update'];
} elseif ($method == 'create') {
    $background = 'bg-primary';
    $text = __('Add');
    $body = __DIR__ . '/body/form';

    $data = ['action' => '/admin/brokers/create'];
};

loadHtml(__DIR__ . '/../../resources/admin/layout', [
    'background' => $background,
    'type' => $text,
    'icon' => 'bi bi-people-fill',
    'title' => __('Brokers'),
    'routeDelete' => $method == 'read' ? '/admin/brokers/delete' : null,
    'routeAdd' => $method == 'create' ? null : '/admin/brokers?method=create',
    'routeSearch' => '/admin/brokers',
    'body' => $body,
    'data' => $data,
]);

function loadInFooter(): void
{
    loadHtml(__DIR__ . '/../../resources/admin/partials/modal-delete');
    loadHtml(__DIR__ . '/../../resources/admin/partials/gallery') ?>

    <script type="text/javascript" src="<?php asset('libs/jquery/jquery.mask.min.js?')?>"></script>
    <script type="text/javascript" src="<?php asset('assets/scripts/class/Gallery.js?') ?>"></script>
    <script type="text/javascript">
        $('#whatsapp').mask('+00 (00) 0 0000-0000');

        const gallery = new Gallery();
        gallery.openModalSelect($('[data-upload=thumbnail]'), 'radio');
    </script>
<?php }
