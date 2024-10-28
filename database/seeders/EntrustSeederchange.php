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


        // Albums
        $manageAlbums  = Permission::create(['name' => 'manage_albums', 'display_name' => ['ar'  =>  'إدارة البومات الصور',    'en'    =>  'Manage Albums'], 'route' => 'albums', 'module' => 'albums', 'as' => 'albums.index', 'icon' => 'fas fas fa-albumspaper', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '70',]);
        $manageAlbums->parent_show = $manageAlbums->id;
        $manageAlbums->save();
        $showAlbums   =  Permission::create(['name'  => 'show_albums', 'display_name'       =>  ['ar'   =>  'البومات الصور',   'en'    =>  'Albums'], 'route' => 'albums', 'module' => 'albums', 'as' => 'albums.index', 'icon' => 'fas fas fa-albumspaper', 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $createAlbums =  Permission::create(['name'  => 'create_albums', 'display_name'     =>  ['ar'   =>  'إنشاء البوم جديد',   'en'    =>  'Create Album'], 'route' => 'albums', 'module' => 'albums', 'as' => 'albums.create', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $displayAlbums =  Permission::create(['name' => 'display_albums', 'display_name'    =>  ['ar'   =>  'عرض البوم ',   'en'    =>  'Display Album'], 'route' => 'albums', 'module' => 'albums', 'as' => 'albums.show', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $updateAlbums  =  Permission::create(['name' => 'update_albums', 'display_name'     =>  ['ar'   =>  'تعديل البوم',   'en'    =>  'Edit Album'], 'route' => 'albums', 'module' => 'albums', 'as' => 'albums.edit', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $deleteAlbums =  Permission::create(['name'  => 'delete_albums', 'display_name'     =>  ['ar'   =>  'حذف البوم',   'en'    =>  'Delete Album'], 'route' => 'albums', 'module' => 'albums', 'as' => 'albums.destroy', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
    }
}
