<?php

require __DIR__ . '/../bootstrap/bootstrap.php';

verifyMethod(405, 'POST');

use Src\Models\User;

$requests = requests();

$user = new User();
$login = $user->login($requests->email, $requests->password);

if ($login['status']) {
    session([
        'message' => $login['message'],
        'type' => 'success',
    ]);

    setcookie('token', $login['user']->token, time() + 14400, "/");
    setcookie('user_name', $login['user']->name, time() + 14400, "/");
    setcookie('user_id', $login['user']->id, time() + 14400, "/");
    setcookie('user_avatar', $login['user']->avatar, time() + 14400, "/");

    return header(route('/admin/dashboard', true), true, 302);
} else {
    session([
        'message' => $login['message'],
        'type' => 'danger',
    ]);

    return header(route('/login', true), true, 302);
};
