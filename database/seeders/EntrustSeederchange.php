<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelstatistics;
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
        //colleges and Institutes menu
        $manageCollegeMenus = Permission::create(['name' => 'manage_college_menus', 'display_name' => ['ar'    =>  'الكليات و المعاهد', 'en'   =>  'Colleges and Institutes'], 'route' => 'college_menus', 'module' => 'college_menus', 'as' => 'college_menus.index', 'icon' => 'fas fa-bars', 'parent' => $manageWebMenus->id, 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '90',]);
        $manageCollegeMenus->parent_show = $manageCollegeMenus->id;
        $manageCollegeMenus->save();
        $showCollegeMenus    =  Permission::create(['name' => 'show_college_menus',  'display_name' => ['ar'    =>  ' إدارة قوائم الكليات و المعاهد',   'en'    =>  'Manage Colleges and Institutes'], 'route' => 'college_menus', 'module' => 'college_menus', 'as' => 'college_menus.index', 'icon' => 'fas fa-bars', 'parent' => $manageCollegeMenus->id, 'parent_original' => $manageCollegeMenus->id, 'parent_show' => $manageCollegeMenus->id, 'sidebar_link' => '1', 'appear' => '1']);
        $createCollegeMenus  =  Permission::create(['name' => 'create_college_menus', 'display_name'  => ['ar'  =>  ' إضافة كلية او معهد',   'en'    =>  'Add Colleges or Institute'], 'route' => 'college_menus', 'module' => 'college_menus', 'as' => 'college_menus.create', 'icon' => null, 'parent' => $manageCollegeMenus->id, 'parent_original' => $manageCollegeMenus->id, 'parent_show' => $manageCollegeMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $displayCollegeMenus =  Permission::create(['name' => 'display_college_menus', 'display_name'  => ['ar'  =>  'عرض كلية او معهد',   'en'    =>  'Display Colleges or Institute'], 'route' => 'college_menus', 'module' => 'college_menus', 'as' => 'college_menus.show', 'icon' => null, 'parent' => $manageCollegeMenus->id, 'parent_original' => $manageCollegeMenus->id, 'parent_show' => $manageCollegeMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $updateCollegeMenus  =  Permission::create(['name' => 'update_college_menus', 'display_name'  => ['ar'  =>  'تعديل كلية او معهد',   'en'    =>  'Edit Colleges or Institute'], 'route' => 'college_menus', 'module' => 'college_menus', 'as' => 'college_menus.edit', 'icon' => null, 'parent' => $manageCollegeMenus->id, 'parent_original' => $manageCollegeMenus->id, 'parent_show' => $manageCollegeMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $deleteCollegeMenus  =  Permission::create(['name' => 'delete_college_menus', 'display_name'  => ['ar'  =>  'حذف كلية او معهد',   'en'    =>  'Delete Colleges or Institute'], 'route' => 'college_menus', 'module' => 'college_menus', 'as' => 'college_menus.destroy', 'icon' => null, 'parent' => $manageCollegeMenus->id, 'parent_original' => $manageCollegeMenus->id, 'parent_show' => $manageCollegeMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
    }
}
