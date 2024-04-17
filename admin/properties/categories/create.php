<?php

verifyMethod(500, 'POST');

use Src\Models\Category;

$requests = requests();

$category = new Category();

$slug = normalizeSlug($requests->slug);

if (is_null($category->where('slug', '=', $slug)->first())) {
    $category->create([
        'name' => $requests->name,
        'slug' => $slug,
    ]);

    session([
        'message' => __('Category added successfully!'),
        'type' => 'success',
    ]);

    return header(route('/admin/properties/categories', true), true, 302);
} else {
    session([
        'message' => __('The slug is already being used, please try another one!'),
        'type' => 'danger',
    ]);

    return header(route('/admin/properties/categories?method=create', true), true, 302);
};
