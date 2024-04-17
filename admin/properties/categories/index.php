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

    $data = ['category' => $category->data, 'action' => '/admin/properties/categories/update'];
} elseif ($method == 'create') {
    $background = 'bg-primary';
    $text = __('Add');
    $body = __DIR__ . '/body/form';

    $data = ['action' => '/admin/properties/categories/create'];
};

loadHtml(__DIR__ . '/../../../resources/admin/layout', [
    'background' => $background,
    'type' => $text,
    'icon' => 'bi bi-bookmarks-fill',
    'title' => __('Categories'),
    'routeDelete' => $method == 'read' ? '/admin/porperties/categories/delete' : null,
    'routeAdd' => $method == 'create' ? null : '/admin/properties/categories?method=create',
    'routeSearch' => '/admin/properties/categories',
    'body' => $body,
    'data' => $data,
]);

function loadInFooter(): void
{
    loadHtml(__DIR__ . '/../../../resources/admin/partials/modal-delete');
}
