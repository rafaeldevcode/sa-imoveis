<?php

verifyMethod(405, 'POST');

use Src\Models\Announce;

$announce = new Announce();
$requests = requests();
$currentAnnounce = $announce->first();

$data = [
    'title' => $requests->title,
    'button_text' => $requests->button_text,
    'button_link' => $requests->button_link,
    'content' => $requests->content,
    'thumbnail' => $requests->thumbnail,
];

if (!isset($currentAnnounce)) {
    $announce->create($data);
} else {
    $announce->find($currentAnnounce->id)->update($data);
};

session([
    'message' => __('Announce updated successfully!'),
    'type' => 'success',
]);

return header(route('/admin/announce', true), true, 302);
