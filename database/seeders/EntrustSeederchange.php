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


        // Advs
        $manageAdvs = Permission::create(['name' => 'manage_advs', 'display_name' => ['ar'  =>  'إدارة الإعلانات',    'en'    =>  'Manage Advertisements'], 'route' => 'advs', 'module' => 'advs', 'as' => 'advs.index', 'icon' => 'fas fas fa-newspaper', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '70',]);
        $manageAdvs->parent_show = $manageAdvs->id;
        $manageAdvs->save();
        $showAdvs   =  Permission::create(['name'  => 'show_advs', 'display_name'       =>  ['ar'   =>  'الإعلانات',   'en'    =>  'Advertisements'], 'route' => 'advs', 'module' => 'advs', 'as' => 'advs.index', 'icon' => 'fas fas fa-newspaper', 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $createAdvs =  Permission::create(['name'  => 'create_advs', 'display_name'     =>  ['ar'   =>  'إنشاء اعلان',   'en'    =>  'Create Advertisement'], 'route' => 'advs', 'module' => 'advs', 'as' => 'advs.create', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $displayAdvs =  Permission::create(['name' => 'display_advs', 'display_name'    =>  ['ar'   =>  'عرض اعلان',   'en'    =>  'Display Advertisement'], 'route' => 'advs', 'module' => 'advs', 'as' => 'advs.show', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $updateAdvs  =  Permission::create(['name' => 'update_advs', 'display_name'     =>  ['ar'   =>  'تعديل اعلان',   'en'    =>  'Edit Advertisement'], 'route' => 'advs', 'module' => 'advs', 'as' => 'advs.edit', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $deleteAdvs =  Permission::create(['name'  => 'delete_advs', 'display_name'     =>  ['ar'   =>  'حذف اعلان',   'en'    =>  'Delete Advertisement'], 'route' => 'advs', 'module' => 'advs', 'as' => 'advs.destroy', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
    }
}
