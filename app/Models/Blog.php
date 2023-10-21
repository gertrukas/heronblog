<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'intro',
        'description',
        'author',
        'active',
        'image',
        'post_type',
        'category_id',
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



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // @ Static Functions
    // -----------------------------------------------------------------------------------------------------------------

    public function scopeSearch($query, $search)
    {
        if ($search)
            return $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%');
    }
}
