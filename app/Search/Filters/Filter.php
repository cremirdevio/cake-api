<?php

namespace  App\Search\Filters;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface for maintaining strict convention for all stream_get_filters
 */
interface Filter
{
    /**
     * Apply a giver search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Collection $builder, $value);
}
