<?php

use Src\Models\Category;
use Src\Models\Property;

require __DIR__ . '/helpers/trans.php';
require __DIR__ . '/helpers/env.php';
require __DIR__ . '/helpers/settings.php';
require __DIR__ . '/helpers/requests.php';
require __DIR__ . '/helpers/menus-admin.php';
require __DIR__ . '/helpers/routes.php';

!defined('APP_VERSION') && define('APP_VERSION', '1.7.0');

if (!function_exists('server')) {
    function server(?string $option = null): stdClass|string
    {
        $server = $_SERVER;

        if (isset($option)) {
            return isset($server[$option]) ? $server[$option] : null;
        }

        return json_decode(json_encode($server));
    }
};

if (!function_exists('asset')) {
    function asset(string $path, bool $return = false): ?string
    {
        $server = server();

        $protocol = ((isset($server->HTTPS)) && ($server->HTTPS == 'on') ? 'https' : 'http');
        $host = $server->HTTP_HOST;
        $projectPath = env('PROJECT_PATH');
        $assetsPath = env('ASSETS_PATH');

        $url = "{$protocol}://{$host}{$projectPath}{$assetsPath}/{$path}?ver=" . APP_VERSION;

        if ($return) {
            return $url;
        } else {
            echo $url;

            return null;
        };
    }
};

if (!function_exists('dd')) {
    function dd(): void
    {
        echo '<pre>';
        array_map(function ($x) {var_dump($x);}, func_get_args());
        die;
    }
};

if (!function_exists('loadHtml')) {
    function loadHtml(string $path, array $data = []): void
    {
        extract($data);

        $path = substr($path, -4) == '.php' ? $path : "{$path}.php";

        require $path;
    }
};

if (!function_exists('path')) {
    function path(): string
    {
        $projectPath = env('PROJECT_PATH');
        $server = server();

        if (($server->SERVER_NAME === 'localhost') ||
            ($server->SERVER_NAME === '127.0.0.1') ||
            ($server->SERVER_NAME === '0.0.0.0') ||
            ($server->SERVER_NAME === env('IP_ROOT'))
        ) {
            $path = $server->REQUEST_URI;
        } else {
            $path = $server->REQUEST_URI;
        };

        $path = str_replace($projectPath, '', $path);

        $path = explode('?', $path)[0];

        return rtrim($path, '/');
    }
};

if (!function_exists('getIconMessage')) {
    function getIconMessage(?string $type): string
    {
        $icon = 'bi bi-question-circle-fill';

        switch ($type) {
            case 'danger':
                $icon = 'bi bi-dash-circle-fill';

                break;
            case 'success':
                $icon = 'by bi-check-circle-fill';

                break;
            case 'warning':
                $icon = 'bi bi-exclamation-circle-fill';

                break;
            case 'secondary':
                $icon = 'bi bi-question-circle-fill';

                break;
            case 'info':
                $icon = 'bi bi-info-circle-fill';

                break;
        };

        return $icon;
    }
};

if (!function_exists('redirectIfTotalEqualsZero')) {
    function redirectIfTotalEqualsZero(string $class, string $route, string $message): bool
    {
        $class = new $class();

        if ($class->count() == 0) {
            session([
                'message' => $message,
                'type' => 'info',
            ]);

            header(route($route, true), true, 302);

            return true;
        };

        return false;
    }
};

if (!function_exists('getArraySelect')) {
    function getArraySelect(array $object, string $key, ?string $value = null): array
    {
        $data = [];

        foreach ($object as $object) {
            if (is_null($value)) {
                array_push($data, $object->{$key});
            } else {
                $data = $data + [$object->{$key} => $object->{$value}];
            }
        };

        return $data;
    }
};

if (!function_exists('getDetails')) {
    function getDetails(stdClass $data): array
    {
        $data = [
            'bedrooms' => $data->bedrooms,
            'garage' => $data->garage,
            'total_area' => $data->total_area,
            'private_area' => $data->private_area,
            'bathrooms' => $data->bathrooms,
            'furnished' => isset($data->furnished) ? $data->furnished : false,
        ];

        return $data;
    }
};

if (!function_exists('getImages')) {
    function getImages(int $id): stdClass|array
    {
        $property = new Property();
        $property = $property->find($id);

        return isset($property) ? $property->images()->data : [];
    }
};

if (!function_exists('favorites')) {
    function favorites(): array
    {
        static $favorites = [];

        if (isset($_COOKIE['properties::favorites'])) {
            $favorites = $_COOKIE['properties::favorites'];

            return json_decode($favorites, true);
        } else {
            return $favorites;
        }
    }
};

if (!function_exists('propertyStatus')) {
    function propertyStatus(string $value, string $type): string
    {
        $status = [
            'colors' => [
                'available' => 'success',
                'unavailable' => 'danger',
                'reserved' => 'info',
                'sold' => 'primary',
            ],
            'texts' => [
                'available' => __('Available'),
                'unavailable' => __('Unavailable'),
                'reserved' => __('Reserved'),
                'sold' => __('Sold'),
            ],
        ];

        return $status[$type][$value];
    }
};

if (!function_exists('defaultCategories')) {
    function defaultCategories(): array
    {
        $categories = [
            'Apartamentos',
            'Casas',
            'Sala Comercial',
            'Terrenos',
            'Pavilhão',
            'Terrenos Comerciais',
            'Terrenos Residenciais',
            'Sítio',
            'Área Rural',
        ];

        return $categories;
    }
};

if (!function_exists('getStates')) {
    function getStates(): array
    {
        return [
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'ES' => 'Espírito Santo',
            'GO' => 'Goiás',
            'MA' => 'Maranhão',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do Sul',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins',
            'DF' => 'Distrito Federal',
        ];
    }
}

if (!function_exists('getMonths')) {
    function getMonths(?string $month = null): array|string
    {
        $months = [
            '01' => 'Janeiro',
            '02' => 'Fevereiro',
            '03' => 'Março',
            '04' => 'Abril',
            '05' => 'Maio',
            '06' => 'Junho',
            '07' => 'Julho',
            '08' => 'Agosto',
            '09' => 'Setembro',
            '10' => 'Outubro',
            '11' => 'Novembro',
            '12' => 'Dezembro',
        ];

        return isset($month) ? $months[$month] : $months;
    }
}

if (!function_exists('generatePropertyCode')) {
    function generatePropertyCode(): int
    {
        $property = (new Property())->last('id', ['code']);
        $lastCode = $property->code;
        $year = date('y');

        if ((int) substr($lastCode, 0, 2) !== (int) $year) {
            return (int) "{$year}0001";
        } else {
            return $lastCode + 1;
        }
    }
}

if (!function_exists('thereIsProperty')) {
    function thereIsProperty(string $type): bool
    {
        $property = (new Property())->where('type', '=', $type)->where('status', '!=', 'unavailable')->count();

        return $property > 0 ? true : false;
    }
}

if (!function_exists('enableOrDisableLink')) {
    function enableOrDisableLink(string $search_type, array $data): void
    {
        $property = new Property();
        $property = $property->where('status', '!=', 'unavailable');

        if (isset($search_type) && $search_type === '1') {
            $category = new Category();
            $category = $category->where('slug', '=', $data['category_slug'])->first();

            $property = $property->where('category_id', '=', $category->id);

            if (isset($data['type'])) {
                $property = $property->where('type', '=', $data['type']);
            }

            echo $property->count() > 0 ? "href=\"{$data['href']}\"" : 'disabled href="javascript:void(0)"';
        } else {
            if (isset($data['category_id'])) {
                $property = $property->where('category_id', '=', $data['category_id']);
            }

            if (isset($data['bedrooms'])) {
                $property = $property->where('details', 'LIKE', "%{$data['bedrooms']}%");
            }

            if (isset($data['type'])) {
                $property = $property->where('type', '=', $data['type']);
            }

            echo $property->count() > 0 ? '' : 'disabled';
        }
    }
}

!defined('SETTINGS') && define('SETTINGS', getSiteSettings());
