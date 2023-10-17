<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Viewer extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'count',
        'country',
    ];


    // -----------------------------------------------------------------------------------------------------------------
    // @ Static Functions
    // -----------------------------------------------------------------------------------------------------------------
    public static function search(
        $searchFilters,
        $sortByAttribute,
        $sortDirection,
        $implementation = null,
    ) {
        $query = static::report();

        if ($searchFilters) {
            $search = $searchFilters['search'];
            if (!empty($search)) {

                $query->report($search);
            }
        }
        #sorting
        switch ($sortByAttribute) {

            default:
                $query->orderBy($sortByAttribute, $sortDirection); // Columns of the table
                break;
        }
        return $query;
    }

    // -----------------------------------------------------------------------------------------------------------------
    // @ Scopes Functions
    // -----------------------------------------------------------------------------------------------------------------

    public function scopeReport($query, $search = null)
    {

        return   $query->select(
            'country',
            DB::raw('sum(count) as interactions'),
            DB::raw('count(id) as count'),
        )->groupBy('country')->filterCountry($search);
    }
    public function scopeReportTwo($query)
    {

        return   $query->select(
            'country',
            DB::raw('sum(count) as interactions'),
            DB::raw('count(id) as count'),
        )->groupBy('country');
    }

    public function scopeFilterCountry($query, $search = null)
    {
        if ($search) {
            return  $query->where('country', 'like', '%' . $search . '%');
        }
    }
}
