<?php

verifyMethod(405, 'POST');

use Src\Models\Category;

$requests = requests();

$category = new Category();
$slug = normalizeSlug($requests->slug);
$categorySlug = $category->where('slug', '=', $slug)->first();

if (is_null($categorySlug) || $categorySlug->id == $requests->id) {
    $category->find($requests->id)->update([
        'name' => $requests->name,
        'slug' => $slug,
    ]);

    session([
        'message' => __('Category edited successfully!'),
        'type' => 'success',
    ]);

    return header(route('/admin/properties/categories', true), true, 302);
} else {
    session([
        'message' => __('The slug is already being used, please try another one!'),
        'type' => 'danger',
    ]);

    return header(route("/admin/properties/categories?method=edit&id={$requests->id}", true), true, 302);
};
