<?php

use Src\Models\PropertyView;

$method = empty(querys('method')) ? 'read' : querys('method');

$requests = requests();

if (!isset($requests->property) || empty($requests->property)) {
    abort(404, 'Property Not Found', 'danger');   
}

$date = isset($requests->date) ? $requests->date : date('Y-m-d');
$views = (new PropertyView())->where('date', 'LIKE', "{$date}%")->where('property_id', '=', $requests->property)->paginate(20);
$total = (new PropertyView())->where('date', 'LIKE', "{$date}%")->where('property_id', '=', $requests->property)->count();

$data = [
    'views' => $views,
    'total' => $total,
    'date' => $date,
];

loadHtml(__DIR__ . '/../../../resources/admin/layout', [
    'background' => 'bg-secondary',
    'type' => __('View'),
    'icon' => 'bi bi-eye-fill',
    'title' => __('Views'),
    'body' => __DIR__ . '/body/read',
    'data' => $data,
]);

function loadInFooter(): void
{ ?>
    <script type="text/javascript">
        $('#date').on('change', (event) => {
            $('[data-views="submit"]').submit();
        });
    </script>
<?php }
