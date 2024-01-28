<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url_img',
        'link',
        'status',
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
        $query = static::query();

        if ($searchFilters) {
            $search = $searchFilters['search'];
            if (!empty($search)) {

                $query->where(
                    fn ($querySearch) =>
                    $querySearch->where('id', 'LIKE', "%$search%")
                        ->orWhere('title', 'LIKE', "%$search%")

                );
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
}
