<?php

if (!function_exists('menusAdmin')) {
    function menusAdmin(): array
    {
        $menus = [
            'dashboard' => [
                'path' => '/admin/dashboard',
                'title' => __('Dashboard'),
                'icon' => 'bi bi-speedometer',
                'count' => null,
            ],
            'users' => [
                'path' => '/admin/users',
                'title' => __('Users'),
                'icon' => 'bi bi-people-fill',
                'count' => null,
            ],
            'properties' => [
                'path' => null,
                'title' => __('Properties'),
                'icon' => 'bi bi-houses-fill',
                'count' => null,
                'submenus' => [
                    'properties' => [
                        'path' => '/admin/properties',
                        'title' => __('Properties'),
                        'count' => null,
                    ],
                    'categories' => [
                        'path' => '/admin/properties/categories',
                        'title' => __('Categories'),
                        'count' => null,
                    ],
                ]
            ],
            'gallery' => [
                'path' => '/admin/gallery',
                'title' => __('Gallery'),
                'icon' => 'bi bi-images',
                'count' => null,
            ],
            'settings' => [
                'path' => '/admin/settings',
                'title' => __('Settings'),
                'icon' => 'bi bi-gear-fill',
                'count' => null,
            ],
        ];

        return $menus;
    }
};
