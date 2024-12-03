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

        //importantlink menu
        $manageImportantLinkMenus = Permission::create(['name' => 'manage_important_link_menus', 'display_name' => ['ar'    =>  'إدارة قائمة روابط مهمة', 'en'   =>  'Important Link Menu'], 'route' => 'important_link_menus', 'module' => 'important_link_menus', 'as' => 'important_link_menus.index', 'icon' => 'fas fa-bars', 'parent' => $manageMainMenus->id, 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '105',]);
        $manageImportantLinkMenus->parent_show = $manageImportantLinkMenus->id;
        $manageImportantLinkMenus->save();
        $showImportantLinkMenus    =  Permission::create(['name' => 'show_important_link_menus',  'display_name' => ['ar'  =>  'إدارة قائمة روابط مهمة',   'en'    =>  'Important Link Menu'], 'route' => 'important_link_menus', 'module' => 'important_link_menus', 'as' => 'important_link_menus.index', 'icon' => 'fas fa-bars', 'parent' => $manageImportantLinkMenus->id, 'parent_original' => $manageImportantLinkMenus->id, 'parent_show' => $manageImportantLinkMenus->id, 'sidebar_link' => '1', 'appear' => '1']);
        $createImportantLinkMenus  =  Permission::create(['name' => 'create_important_link_menus', 'display_name'  => ['ar'  =>  'إضافة عنصر قائمة روابط مهمة ',   'en'    =>  'Add Important Link Menu Item'], 'route' => 'important_link_menus', 'module' => 'important_link_menus', 'as' => 'important_link_menus.create', 'icon' => null, 'parent' => $manageImportantLinkMenus->id, 'parent_original' => $manageImportantLinkMenus->id, 'parent_show' => $manageImportantLinkMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $displayImportantLinkMenus =  Permission::create(['name' => 'display_important_link_menus', 'display_name'  => ['ar'  =>  'عرض عنصر قائمة روابط مهمة ',   'en'    =>  'Display Important Link Menu Item'], 'route' => 'important_link_menus', 'module' => 'important_link_menus', 'as' => 'important_link_menus.show', 'icon' => null, 'parent' => $manageImportantLinkMenus->id, 'parent_original' => $manageImportantLinkMenus->id, 'parent_show' => $manageImportantLinkMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $updateImportantLinkMenus  =  Permission::create(['name' => 'update_important_link_menus', 'display_name'  => ['ar'  =>  'تعديل عنصر قائمة روابط مهمة ',   'en'    =>  'Edit Important Link Menu Item'], 'route' => 'important_link_menus', 'module' => 'important_link_menus', 'as' => 'important_link_menus.edit', 'icon' => null, 'parent' => $manageImportantLinkMenus->id, 'parent_original' => $manageImportantLinkMenus->id, 'parent_show' => $manageImportantLinkMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $deleteImportantLinkMenus  =  Permission::create(['name' => 'delete_important_link_menus', 'display_name'  => ['ar'  =>  'حذف عنصر قائمة روابط مهمة ',   'en'    =>  'Delete Important Link Menu Item'], 'route' => 'important_link_menus', 'module' => 'important_link_menus', 'as' => 'important_link_menus.destroy', 'icon' => null, 'parent' => $manageImportantLinkMenus->id, 'parent_original' => $manageImportantLinkMenus->id, 'parent_show' => $manageImportantLinkMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
    }
}
