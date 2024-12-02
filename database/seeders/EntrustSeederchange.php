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

        // 
        $manageMainMenus = Permission::create(['name' => 'manage_main_menus', 'display_name' => ['ar' => 'إدارة القوائم', 'en' => 'Manage Menus'], 'route' => 'main_menus', 'module' => 'main_menus', 'as' => 'main_menus.index', 'icon' => 'fa fa-list-ul', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '85',]);
        $manageMainMenus->parent_show = $manageMainMenus->id;
        $manageMainMenus->save();
        $showMainMenus    =  Permission::create(['name' => 'show_main_menus',  'display_name' => ['ar'     => 'إدارة القائمة الرئيسية', 'en'  =>   'Main Menu'], 'route' => 'main_menus', 'module' => 'main_menus', 'as' => 'main_menus.index', 'icon' => 'fas fa-bars', 'parent' => $manageMainMenus->id, 'parent_original' => $manageMainMenus->id, 'parent_show' => $manageMainMenus->id, 'sidebar_link' => '1', 'appear' => '1']);
        $createMainMenus  =  Permission::create(['name' => 'create_main_menus', 'display_name'  => ['ar'     => 'إضافة عنصر قائمة رئيسية', 'en'  =>  'Add Main Menu Item'], 'route' => 'main_menus', 'module' => 'main_menus', 'as' => 'main_menus.create', 'icon' => null, 'parent' => $manageMainMenus->id, 'parent_original' => $manageMainMenus->id, 'parent_show' => $manageMainMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $displayMainMenus =  Permission::create(['name' => 'display_main_menus', 'display_name'  => ['ar'     => 'عرض عنصر قائمة رئيسية', 'en'  =>  'Display Main Menu Item'], 'route' => 'main_menus', 'module' => 'main_menus', 'as' => 'main_menus.show', 'icon' => null, 'parent' => $manageMainMenus->id, 'parent_original' => $manageMainMenus->id, 'parent_show' => $manageMainMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $updateMainMenus  =  Permission::create(['name' => 'update_main_menus', 'display_name'  => ['ar'     => 'تعديل عنصر قائمة رئيسية', 'en'  =>  'Edit Main Menu Item'], 'route' => 'main_menus', 'module' => 'main_menus', 'as' => 'main_menus.edit', 'icon' => null, 'parent' => $manageMainMenus->id, 'parent_original' => $manageMainMenus->id, 'parent_show' => $manageMainMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $deleteMainMenus  =  Permission::create(['name' => 'delete_main_menus', 'display_name'  => ['ar'     => 'حذف عنصر قائمة رئيسية', 'en'  =>  'Delete Main Menu Item'], 'route' => 'main_menus', 'module' => 'main_menus', 'as' => 'main_menus.destroy', 'icon' => null, 'parent' => $manageMainMenus->id, 'parent_original' => $manageMainMenus->id, 'parent_show' => $manageMainMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
    }
}
