<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'facebook',
        'instagram',
        'twitter',
    ];
}
