<?php

if (!function_exists('menusAdmin')):
    /**
     * @since 1.0.0
     * 
     * @return array
     */
    function menusAdmin(): array
    {
        $menus = [
            'dashboard' => [
                'path'  => '/admin/dashboard',
                'title' => 'Dashboard' ,
                'icon'  => 'bi bi-speedometer',
                'count' => null      
            ],
            'users' => [
                'path'  => '/admin/users',
                'title' => 'Usuários' ,
                'icon'  => 'bi bi-people-fill',
                'count' => null
            ],
            'settings' => [
                'path'  => '/admin/settings',
                'title' => 'Configurações',
                'icon'  => 'bi bi-gear-fill',
                'count' => null
            ]
        ];

        return $menus;
    }
endif;
