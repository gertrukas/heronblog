<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'home' => [
                'icon' => 'home',
                'title' => 'Inicio',
                'route_name' => 'admin.dashboards',
                'route_name_two' => '',
                'can' => 'Seccion Dashboard',
                'params' => [
                    'layout' => 'side-menu'
                ],
            ],
        

   
            'categories' => [
                'icon' => 'box',
                'title' => 'Categorias',
                'route_name' => 'admin.categories',
                'route_name_two' => 'admin.categories.create',
                'can' => 'Seccion Dashboard',
                'params' => [
                    'layout' => 'side-menu'
                ],
            ],
        
            'tags' => [
                'icon' => 'tag',
                'title' => 'Tags',
                'route_name' => 'admin.tags',
                'route_name_two' => 'admin.tags.create',
                'can' => 'Seccion Dashboard',
                'params' => [
                    'layout' => 'side-menu'
                ],
            ],
        
      
            'blogs' => [
                'icon' => 'newspaper',
                'title' => 'Blogs',
                'route_name' => 'admin.blogs',
                'route_name_two' => 'admin.blogs.create',
                'can' => 'Seccion Dashboard',
                'params' => [
                    'layout' => 'side-menu'
                ],
            ],
        
          

        ];
    }
}
