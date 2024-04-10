<?php

use Src\Models\Category;

$method = empty(querys('method')) ? 'read' : querys('method');

if ($method == 'read') {
    $category = new Category();
    $requests = requests();
    $categories = !isset($requests->search) ? $category->paginate(20) : $category->where('name', 'LIKE', "%{$requests->search}%")->paginate(20);
    $background = 'bg-secondary';
    $text = __('View');
    $body = __DIR__ . '/body/read';

    $data = ['categories' => $categories];
} elseif ($method == 'edit') {
    $category = new Category();
    $category = $category->find(querys('id'));
    $background = 'bg-success';
    $text = __('Edit');
    $body = __DIR__ . '/body/form';

    $data = ['category' => $category->data, 'action' => '/admin/categories/update'];
} elseif ($method == 'create') {
    $background = 'bg-primary';
    $text = __('Add');
    $body = __DIR__ . '/body/form';

    $data = ['action' => '/admin/categories/create'];
};

loadHtml(__DIR__ . '/../../../resources/admin/layout', [
    'background' => $background,
    'type' => $text,
    'icon' => 'bi bi-people-fill',
    'title' => __('Categories'),
    'routeDelete' => $method == 'read' ? '/admin/categories/delete' : null,
    'routeAdd' => $method == 'create' ? null : '/admin/categories?method=create',
    'routeSearch' => '/admin/categories',
    'body' => $body,
    'data' => $data,
]);

function loadInFooter(): void
{
    loadHtml(__DIR__ . '/../../../resources/admin/partials/modal-delete');
}
