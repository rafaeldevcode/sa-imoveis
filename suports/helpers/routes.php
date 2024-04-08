<?php

if (!function_exists('routes')) {
    function routes(): array
    {
        $slug_one = slug(2);
        $slug_two = slug(3);
        
        return [
            "/",
            "/admin/dashboard",
            "/admin/users",
            "/admin/users/update",
            "/admin/users/create",
            "/admin/users/delete",
            "/admin/posts",
            "/admin/posts/create",
            "/admin/posts/update",
            "/admin/posts/delete",
            "/admin/gallery",
            "/admin/gallery/delete",
            "/admin/settings",
            "/admin/settings/update",
            "/admin/profile",
            "/admin/profile/update",
            "/admin/profile/update-avatar",
            "/sobre",
            "/contato",
            "/contato/create",
            "/imoveis/{$slug_one}",
            "/imoveis/categoria/{$slug_two}",
            "/policies",
            "/favoritos",
            "/login",
            "/login/create",
            "/login/logout",
            "/api/gallery",
            "/api/gallery/create",
        ];
    }
};

if (!function_exists('route')) {
    function route(string $path = '', bool $redirection = false)
    {
        $projectPath = env('PROJECT_PATH');
        $path = $projectPath . $path;

        if ($redirection) {
            return "Location: $path";
        };

        echo $path;
    }
};

if(!function_exists('slug')):
    function slug(int $indice): string
    {
        $path = path();
        $paths = explode('/', $path);
        
        if(isset($paths[$indice])):
            return $paths[$indice];
        endif;

        return '';
    }
endif;

if (!function_exists('getFileName')) {
    function getFileName(string $path): string 
    {
        $method_posts = ['update', 'delete', 'create', 'update-avatar', 'logout'];
        $array = explode('/', $path);
        $count = count($array);
        $file = $array[$count-1];
        $file = in_array($file, $method_posts) ? $file : 'index';

        if (in_array($file, $method_posts)) {
            $count--;
            unset($array[$count]);
        };

        $array = verifySlug($array, $count, $file);

        $path = implode('/', $array);

        return $path;
    }
};

if(!function_exists('verifySlug')):
    function verifySlug(array $array, int $count, string $file): array 
    {
        $last_path = $array[$count-1];

        unset($array[$count-1]);
        
        $path = implode('/', $array).'/show.php';

        if (is_file(__DIR__."/../..{$path}")) {
            array_push($array, 'show');

            return $array;
        };

        array_push($array, $last_path);
        array_push($array, $file);

        return $array;
    }
endif;
