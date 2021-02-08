<?php

use Carbon\Carbon;

function getQueryParams($queryString)
{
    $parameters = [];
    $explodedQueryString = explode('&', $queryString);
    foreach ($explodedQueryString as $string) {
        $values = explode('=', $string);
        $key = $values[0];
        $val = $values[1];
        $parameters[$key] = $val;
    }

    return $parameters;
}