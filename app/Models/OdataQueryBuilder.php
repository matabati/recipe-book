<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OdataQueryBuilder extends Model
{
    public static function handle($parsedQuery, $query)
    {
        if (isset($parsedQuery['select'])) {
            $columns = $parsedQuery['select'];
            $builder = $query->select($columns);
        } elseif (isset($parsedQuery['filter'])) {
            foreach ($parsedQuery['filter'] as $item) {
                $builder = $query->where($item['left'], $item['operator'], $item['right']);
            }
        } elseif (isset($parsedQuery['orderBy'])) {
            foreach ($parsedQuery['orderBy'] as $item) {
                $property = $item['property'];
                if (preg_match('/length\((\w+)\)/', $item['property'])) {
                    preg_match_all('/length\((\w+)\)/', $property, $regex);
                    if (isset($regex[1][0])) {
                        $relationName = $regex[1][0];
                        $builder = $query->withCount($relationName)
                            ->orderBy("{$relationName}_count", $item['direction']);
                    }
                } elseif (preg_match('/\w+\([a-zA-Z0-9_ "\.,\'پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژؤإأءًٌٍَُِّ]*+\)/', $item['property'])) {
                    $builder = $query->orderByRaw($property . ' ' . $item['direction'] . ' NULLS LAST');
                } else {
                    $builder = $query->orderByRaw($property . ' ' . $item['direction'] . ' NULLS LAST');
                }
            }
        } elseif (isset($parsedQuery['count'])) {
            $builder = $query->count();
            return $builder;
        } elseif (isset($parsedQuery['skip'])) {
            $builder = $query->skip($parsedQuery['skip']);
        } elseif (isset($parsedQuery['top'])) {
            $builder = $query->take($parsedQuery['top']);
        } else {
            $builder = $query;
        }
        $result = $builder->get();
        return $result;
    }
}
