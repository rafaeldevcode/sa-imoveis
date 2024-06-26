<?php

use Src\Models\User;

$method = empty(querys('method')) ? 'read' : querys('method');

if ($method == 'read') {
    $user = new User();
    $requests = requests();
    $users = !isset($requests->search) ? $user->paginate(20) : $user->where('name', 'LIKE', "%{$requests->search}%")->paginate(20);
    $background = 'bg-secondary';
    $text = __('View');
    $body = __DIR__ . '/body/read';

    $data = ['users' => $users, 'ids' => extractIdsLoggedUsers()];
} elseif ($method == 'edit') {
    $user = new User();
    $user = $user->find(querys('id'));
    $background = 'bg-success';
    $text = __('Edit');
    $body = __DIR__ . '/body/form';

    $data = ['user' => $user->data, 'action' => '/admin/users/update'];
} elseif ($method == 'create') {
    $background = 'bg-primary';
    $text = __('Add');
    $body = __DIR__ . '/body/form';

    $data = ['action' => '/admin/users/create'];
};

loadHtml(__DIR__ . '/../../resources/admin/layout', [
    'background' => $background,
    'type' => $text,
    'icon' => 'bi bi-people-fill',
    'title' => __('Users'),
    'routeDelete' => $method == 'read' ? '/admin/users/delete' : null,
    'routeAdd' => $method == 'create' ? null : '/admin/users?method=create',
    'routeSearch' => '/admin/users',
    'body' => $body,
    'data' => $data,
]);

function loadInFooter(): void
{
    loadHtml(__DIR__ . '/../../resources/admin/partials/modal-delete');
}
