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


        // PlayLists
        $managePlayLists  = Permission::create(['name' => 'manage_playlists', 'display_name' => ['ar'  =>  'إدارة قوائم التشغيل  ',    'en'    =>  'Manage Playlists'], 'route' => 'playlists', 'module' => 'playlists', 'as' => 'playlists.index', 'icon' => 'fas fa-video', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '70',]);
        $managePlayLists->parent_show = $managePlayLists->id;
        $managePlayLists->save();
        $showPlayLists   =  Permission::create(['name'  => 'show_playlists', 'display_name'       =>  ['ar'   =>  'قوائم التشغيل',   'en'    =>  'Playlists'], 'route' => 'playlists', 'module' => 'playlists', 'as' => 'playlists.index', 'icon' => 'fas fa-video', 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $createPlayLists =  Permission::create(['name'  => 'create_playlists', 'display_name'     =>  ['ar'   =>  'إنشاء قائمة تشغيل جديد',   'en'    =>  'Create Playlist'], 'route' => 'playlists', 'module' => 'playlists', 'as' => 'playlists.create', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $displayPlayLists =  Permission::create(['name' => 'display_playlists', 'display_name'    =>  ['ar'   =>  'عرض قائمة تشغيل ',   'en'    =>  'Display Playlist'], 'route' => 'playlists', 'module' => 'playlists', 'as' => 'playlists.show', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $updatePlayLists  =  Permission::create(['name' => 'update_playlists', 'display_name'     =>  ['ar'   =>  'تعديل قائمة تشغيل',   'en'    =>  'Edit Playlist'], 'route' => 'playlists', 'module' => 'playlists', 'as' => 'playlists.edit', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $deletePlayLists =  Permission::create(['name'  => 'delete_playlists', 'display_name'     =>  ['ar'   =>  'حذف قائمة تشغيل',   'en'    =>  'Delete Playlist'], 'route' => 'playlists', 'module' => 'playlists', 'as' => 'playlists.destroy', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
    }
}
