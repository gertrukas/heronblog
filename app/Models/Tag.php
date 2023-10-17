<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
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
                        ->orWhere('name', 'LIKE', "%$search%")

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


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
