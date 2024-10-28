<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Dictionary : 
     *              01- Roles 
     *              02- Users
     *              03- AttachRoles To  Users
     *              04- Create random customer and  AttachRole to customerRole
     * 
     * 
     * @return void
     */
    public function run()
    {


        // news
        $manageNews = Permission::create(['name' => 'manage_news', 'display_name' => ['ar'  =>  'إدارة الاخبار',    'en'    =>  'Manage News'], 'route' => 'news', 'module' => 'news', 'as' => 'news.index', 'icon' => 'fas fas fa-newspaper', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '70',]);
        $manageNews->parent_show = $manageNews->id;
        $manageNews->save();
        $showNews   =  Permission::create(['name'  => 'show_news', 'display_name'       =>  ['ar'   =>  'الاخبار',   'en'    =>  'News'], 'route' => 'news', 'module' => 'news', 'as' => 'news.index', 'icon' => 'fas fas fa-newspaper', 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $createNews =  Permission::create(['name'  => 'create_news', 'display_name'     =>  ['ar'   =>  'إنشاء خبر',   'en'    =>  'Create News'], 'route' => 'news', 'module' => 'news', 'as' => 'news.create', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $displayNews =  Permission::create(['name' => 'display_news', 'display_name'    =>  ['ar'   =>  'عرض خبر',   'en'    =>  'Display News'], 'route' => 'news', 'module' => 'news', 'as' => 'news.show', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $updateNews  =  Permission::create(['name' => 'update_news', 'display_name'     =>  ['ar'   =>  'تعديل خبر',   'en'    =>  'Edit News'], 'route' => 'news', 'module' => 'news', 'as' => 'news.edit', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $deleteNews =  Permission::create(['name'  => 'delete_news', 'display_name'     =>  ['ar'   =>  'حذف خبر',   'en'    =>  'Delete News'], 'route' => 'news', 'module' => 'news', 'as' => 'news.destroy', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
    }
}
