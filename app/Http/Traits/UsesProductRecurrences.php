<?php

namespace App\Http\Traits;

use App\Models\ProductRecurrence;

trait UsesProductRecurrences
{
    // -----------------------------------------------------------------------------------------------------------------
    // @ Relations
    // -----------------------------------------------------------------------------------------------------------------

    public function productRecurrences()
    {
        return $this->belongsToMany(ProductRecurrence::class)->withPivot('quantity', 'type')->withTimestamps();
    }

    // -----------------------------------------------------------------------------------------------------------------
    // @ Accessors
    // -----------------------------------------------------------------------------------------------------------------

    public function getTotalsAttribute()
    {
        $totals = [0, 0, 0, 0, 0, 0, 0];
        foreach ($this->productRecurrences as $productRecurrence) {
            $totals[$productRecurrence->tipe_recurrences] += $productRecurrence->amount * $productRecurrence->pivot->quantity;
        }

        return $totals;
    }

    public function getTotalAttribute()
    {
        return collect($this->totals)->sum();
    }

    // -----------------------------------------------------------------------------------------------------------------
    // @ Public Functions
    // -----------------------------------------------------------------------------------------------------------------

    public function requiresShipping()
    {
        return $this->productRecurrences()->whereHas('product', fn ($query) => 
            $query->where('type_product', 1)
        )->count() > 0;
    }

    public function doesntRequireShipping()
    {
        return !$this->requiresShipping();
    }
}