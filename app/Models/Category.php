<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'url_image',
    ];


    protected static function boot()
    {
        parent::boot();

        static::created(function ($category) {

            $category->slug = $category->createSlug($category->name);

            $category->save();
        });

        

    }


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

    /** 
     * Write code on Method
     *
     * @return response()
     */
    public function createSlug($name)
    {
        if ($this->whereSlug($slug = Str::slug($name))->exists()) {

            $max = $this->whereName($name)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
