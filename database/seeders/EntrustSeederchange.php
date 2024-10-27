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

        // About Instatutes
        $manageAboutInstatutes = Permission::create(['name' => 'manage_about_instatutes', 'display_name' => ['ar'  =>  'عن المعهد',    'en'    =>  'About Instatutes'], 'route' => 'about_instatutes', 'module' => 'about_instatutes', 'as' => 'about_instatutes.index', 'icon' => 'fas fas fa-newspaper', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '70',]);
        $manageAboutInstatutes->parent_show = $manageAboutInstatutes->id;
        $manageAboutInstatutes->save();
        $showAboutInstatutes   =  Permission::create(['name'  => 'show_about_instatutes', 'display_name'       =>  ['ar'   =>  'عن المعهد',   'en'    =>  'About Instatutes'], 'route' => 'about_instatutes', 'module' => 'about_instatutes', 'as' => 'about_instatutes.index', 'icon' => 'fas fas fa-newspaper', 'parent' => $manageAboutInstatutes->id, 'parent_original' => $manageAboutInstatutes->id, 'parent_show' => $manageAboutInstatutes->id, 'sidebar_link' => '1', 'appear' => '1']);
        $createAboutInstatutes =  Permission::create(['name'  => 'create_about_instatutes', 'display_name'     =>  ['ar'   =>  'إنشاء بيانات عن المعهد',   'en'    =>  'Create About Instatute Info'], 'route' => 'about_instatutes', 'module' => 'about_instatutes', 'as' => 'about_instatutes.create', 'icon' => null, 'parent' => $manageAboutInstatutes->id, 'parent_original' => $manageAboutInstatutes->id, 'parent_show' => $manageAboutInstatutes->id, 'sidebar_link' => '1', 'appear' => '0']);
        $displayAboutInstatutes =  Permission::create(['name' => 'display_about_instatutes', 'display_name'    =>  ['ar'   =>  'عرض بيانات المعهد',   'en'    =>  'Display About Instatute Info'], 'route' => 'about_instatutes', 'module' => 'about_instatutes', 'as' => 'about_instatutes.show', 'icon' => null, 'parent' => $manageAboutInstatutes->id, 'parent_original' => $manageAboutInstatutes->id, 'parent_show' => $manageAboutInstatutes->id, 'sidebar_link' => '0', 'appear' => '0']);
        $updateAboutInstatutes  =  Permission::create(['name' => 'update_about_instatutes', 'display_name'     =>  ['ar'   =>  'تعديل بيانات المعهد',   'en'    =>  'Edit About Instatute Info'], 'route' => 'about_instatutes', 'module' => 'about_instatutes', 'as' => 'about_instatutes.edit', 'icon' => null, 'parent' => $manageAboutInstatutes->id, 'parent_original' => $manageAboutInstatutes->id, 'parent_show' => $manageAboutInstatutes->id, 'sidebar_link' => '0', 'appear' => '0']);
        $deleteAboutInstatutes =  Permission::create(['name'  => 'delete_about_instatutes', 'display_name'     =>  ['ar'   =>  'حذف بيانات المعهد',   'en'    =>  'Delete About Instatute Info'], 'route' => 'about_instatutes', 'module' => 'about_instatutes', 'as' => 'about_instatutes.destroy', 'icon' => null, 'parent' => $manageAboutInstatutes->id, 'parent_original' => $manageAboutInstatutes->id, 'parent_show' => $manageAboutInstatutes->id, 'sidebar_link' => '0', 'appear' => '0']);
    }
}
