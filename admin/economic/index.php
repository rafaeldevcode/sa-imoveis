<?php

use Src\Models\Economic;

$method = empty(querys('method')) ? 'read' : querys('method');

if ($method == 'read') {
    $economic = new Economic();
    $requests = requests();
    $economic = !isset($requests->search) ? $economic->paginate(20) : $economic->where('type', 'LIKE', "%{$requests->search}%")->paginate(20);
    $background = 'bg-secondary';
    $text = __('View');
    $body = __DIR__ . '/body/read';

    $data = ['economic' => $economic];
} elseif ($method == 'edit') {
    $economic = new Economic();
    $economic = $economic->find(querys('id'));
    $background = 'bg-success';
    $text = __('Edit');
    $body = __DIR__ . '/body/form';

    $data = ['economic' => $economic->data, 'action' => '/admin/economic/update'];
} elseif ($method == 'create') {
    $background = 'bg-primary';
    $text = __('Add');
    $body = __DIR__ . '/body/form';

    $data = ['action' => '/admin/economic/create'];
};

loadHtml(__DIR__ . '/../../resources/admin/layout', [
    'background' => $background,
    'type' => $text,
    'icon' => 'bi-bar-chart-line-fill',
    'title' => __('Price Index'),
    // 'routeDelete' => $method == 'read' ? '/admin/economic/delete' : null,
    // 'routeAdd' => $method == 'create' ? null : '/admin/economic?method=create',
    // 'routeSearch' => '/admin/economic',
    'body' => $body,
    'data' => $data,
]);

function loadInFooter(): void
{
    loadHtml(__DIR__ . '/../../resources/admin/partials/modal-delete') ?>

    <script type="text/javascript" src="<?php asset('libs/jquery/jquery.mask.min.js?')?>"></script>
    <script type="text/javascript">
        $('#year').mask('0000', {reverse: true});
    </script>
<?php }
