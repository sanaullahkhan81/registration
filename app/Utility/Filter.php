<?php

namespace App\Utility;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{

    /**
     * Return filtered query for Grids
     * @param $filter
     * @param $result
     *
     * @return mixed
     */
    public static function filter($filter, $result)
    {
        if (is_null($filter->value)) {
            return $result;
        }
        switch ($filter->operator) {
            case "contains":
                    if (strpos($filter->field, '.') !== false) {
                        $fields = explode('.',$filter->field);
                        return $result->whereHas($fields[0], function($q) use ($filter) {
                            $q->where(explode('.',$filter->field)[1], 'like', '%' . $filter->value . '%');
                        });
                    }
                return $result->where($filter->field, 'like', '%' . $filter->value . '%');
                break;
            case "eq":
                if (strpos($filter->field, '.') !== false) {
                    $fields = explode('.',$filter->field);
                    return $result->whereHas($fields[0], function($q) use ($filter) {
                        $q->where(explode('.',$filter->field)[1], '=', $filter->value);
                    });
                }
                return $result->where($filter->field, '=', $filter->value);
                break;
            case "neq":
                if (strpos($filter->field, '.') !== false) {
                    $fields = explode('.',$filter->field);
                    return $result->whereHas($fields[0], function($q) use ($filter) {
                        $q->where(explode('.',$filter->field)[1], '<>', $filter->value);
                    });
                }
                return $result->where($filter->field, '<>', $filter->value);
                break;
            case "startswith":
                if (strpos($filter->field, '.') !== false) {
                    $fields = explode('.',$filter->field);
                    return $result->whereHas($fields[0], function($q) use ($filter) {
                        $q->where(explode('.',$filter->field)[1], 'like', $filter->value . '%');
                    });
                }
                return $result->where($filter->field, 'like', $filter->value . '%');
                break;
            case "endswith":
                if (strpos($filter->field, '.') !== false) {
                    $fields = explode('.',$filter->field);
                    return $result->whereHas($fields[0], function($q) use ($filter) {
                        $q->where(explode('.',$filter->field)[1], 'like', '%' . $filter->value);
                    });
                }
                return $result->where($filter->field, 'like', '%' . $filter->value);
                break;
            case "null":
                if (strpos($filter->field, '.') !== false) {
                    $fields = explode('.',$filter->field);
                    return $result->whereHas($fields[0], function($q) use ($filter) {
                        $q->whereNull(explode('.',$filter->field)[1]);
                    });
                }
                return $result->whereNull($filter->field);
                break;
            case "notnull":
                return $result->whereNotNull($filter->field);
                break;
            case "lt":
                return $result->where($filter->field, '<', $filter->value);
                break;
            case "gt":
                return $result->where($filter->field, '>', $filter->value);
                break;
            case "lgt":
                return $result->where($filter->field, '>', $filter->value);
                break;
            case "st":
                return $result->where($filter->field, '<', $filter->value);
                break;
            case "doesnotcontain":
                return $result->where($filter->field, 'not like', '%' . $filter->value . '%');
                break;
            default:
                return $result;
        }
    }
}
