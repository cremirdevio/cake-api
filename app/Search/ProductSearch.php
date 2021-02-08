<?php

namespace App\Search;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class ProductSearch
{
    public static function apply(Request $filters, $builder)
    {
        // Passing the search parameters to a function: to build a query string using the parameters
        $query = static::applyDecoratorsFromRequest($filters, $builder);
        // Return the result of the final query
        return static::getResults($query);
    }

    public static function applyDecoratorsFromRequest(Request $request, Collection $query)
    {
        // Looping through all the request search parameters
        foreach ($request->all() as $filterName => $value) {
            // Linking each parameter to a Filter Class
            $decorator = static::createFilterDecorator($filterName);
            // Checking if Class (decorator) link created above is valid
            if (static::isValidDecorator($decorator)) {
              // Applying the filter class to the query string
              $query = $decorator::apply($query, $value);
            }
        }
        return $query;
    }

    private static function createFilterDecorator($name)
    {
        // Generating a class decorator(link to the respective filter class) from the name parameter
        return __NAMESPACE__ . '\\Filters\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));
    }

    private static function isValidDecorator($decorator)
    {
        // Check if the class exists
        return class_exists($decorator);
    }

    private static function getResults(Collection $query)
    {
        // Finally run the query to and return the result
        return $query;
        // return $query->get();
    }
}
