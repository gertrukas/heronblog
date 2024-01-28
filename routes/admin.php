<?php

use Illuminate\Support\Facades\Route;

Route::get('dashboards', App\Http\Livewire\Admin\Dashboard\DashboardIndex::class)->name('admin.dashboards');

Route::get('categories', App\Http\Livewire\Admin\Category\CategoryIndex::class)->name('admin.categories');

Route::get('sliders', App\Http\Livewire\Admin\Slider\SliderIndex::class)->name('admin.sliders');

Route::get('tags', App\Http\Livewire\Admin\Tag\TagIndex::class)->name('admin.tags');


Route::get('post', App\Http\Livewire\Admin\Blog\BlogIndex::class)->name('admin.blogs');
Route::get('post/create/{id?}', App\Http\Livewire\Admin\Blog\BlogCreate::class)->name('admin.blogs.create');
