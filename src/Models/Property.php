<?php

namespace Src\Models;

use PDO;
use stdClass;

class Property extends Model
{
    public $table = 'properties';

    public function images(): Gallery
    {
        return $this->belongsToMany(Gallery::class, 'property_images', 'property_id', 'image_id');
    }

    public function category(): User
    {
        return $this->belongsTo(User::class, 'categories', 'category_id');
    }

    public function user(): User
    {
        return $this->belongsTo(User::class, 'users', 'user_id');
    }

    public function views(): PropertyView
    {
        return $this->hasMany(PropertyView::class, 'properties', 'property_id');
    }

    public function paginateWithOrder(int $limit): stdClass
    {
        $count = ceil(($this->count() / $limit));
        $page = ($count == 0 ? 0 : 1);
        $requests = requests();

        if (isset($requests->page)) {
            $page = filter_var($requests->page, FILTER_VALIDATE_INT);
            $page = !$page ? 1 : $page;
        }

        $start = (($page == 0 ? 1 : $page) * $limit) - $limit;

        $whereClause = $this->whereClausure();

        $query = "SELECT * FROM {$this->table}{$whereClause->clausure} 
                  ORDER BY 
                      CASE WHEN `is_launch` = 'on' THEN 1 ELSE 4 END,
                      CASE 
                          WHEN `is_highlighted` = 'on' AND `type` = 'alugar' THEN 2
                          WHEN `is_highlighted` = 'on' AND `type` = 'comprar' THEN 3
                          ELSE 4 
                      END 
                  LIMIT $start, $limit";

        $statement = $this->connection->prepare($query);

        foreach ($whereClause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        $statement->execute();

        $this->data = json_decode(json_encode($statement->fetchAll(PDO::FETCH_ASSOC)));

        return json_decode(json_encode([
            'count' => $count,
            'page' => ($count == 0 ? 0 : $page),
            'next' => ($page == $count ? null : $page + 1),
            'prev' => (($page == 1 || $page == 0) ? null : $page - 1),
            'data' => $this->data,
            'search' => isset($requests->search) ? $requests->search : null,
            'total' => $this->count(),
        ]));
    }
}
