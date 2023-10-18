<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OdataQueryBuilder extends Model
{
    public static function handle($parsedQuery, $query)
    {
        if (isset($parsedQuery['select'])){
            $columns = $parsedQuery['select'];
            $builder = $query -> select($columns);
        } elseif (isset($parsedQuery['filter'])) {
            foreach ($parsedQuery['filter'] as $arr) {
                $builder = $query -> where($arr['left'], $arr['operator'], $arr['right']);
            }
        }
        else {
            $builder = $query;
        }
        return $builder;
    }
}