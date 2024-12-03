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

        //contactUs menu
        $manageContactUsMenus = Permission::create(['name' => 'manage_contact_us_menus', 'display_name' => ['ar'    =>  'إدارة قائمة تواصل معنا', 'en'   =>  'Contact Us Menu'], 'route' => 'contact_us_menus', 'module' => 'contact_us_menus', 'as' => 'contact_us_menus.index', 'icon' => 'fas fa-bars', 'parent' => $manageMainMenus->id, 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '105',]);
        $manageContactUsMenus->parent_show = $manageContactUsMenus->id;
        $manageContactUsMenus->save();
        $showContactUsMenus    =  Permission::create(['name' => 'show_contact_us_menus',  'display_name' => ['ar'  =>  'إدارة قائمة تواصل معنا',   'en'    =>  'Contact Us Menu'], 'route' => 'contact_us_menus', 'module' => 'contact_us_menus', 'as' => 'contact_us_menus.index', 'icon' => 'fas fa-bars', 'parent' => $manageContactUsMenus->id, 'parent_original' => $manageContactUsMenus->id, 'parent_show' => $manageContactUsMenus->id, 'sidebar_link' => '1', 'appear' => '1']);
        $createContactUsMenus  =  Permission::create(['name' => 'create_contact_us_menus', 'display_name'  => ['ar'  =>  'إضافة عنصر قائمة تواصل معنا ',   'en'    =>  'Add Contact Us Menu Item'], 'route' => 'contact_us_menus', 'module' => 'contact_us_menus', 'as' => 'contact_us_menus.create', 'icon' => null, 'parent' => $manageContactUsMenus->id, 'parent_original' => $manageContactUsMenus->id, 'parent_show' => $manageContactUsMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $displayContactUsMenus =  Permission::create(['name' => 'display_contact_us_menus', 'display_name'  => ['ar'  =>  'عرض عنصر قائمة تواصل معنا ',   'en'    =>  'Display Contact Us Menu Item'], 'route' => 'contact_us_menus', 'module' => 'contact_us_menus', 'as' => 'contact_us_menus.show', 'icon' => null, 'parent' => $manageContactUsMenus->id, 'parent_original' => $manageContactUsMenus->id, 'parent_show' => $manageContactUsMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $updateContactUsMenus  =  Permission::create(['name' => 'update_contact_us_menus', 'display_name'  => ['ar'  =>  'تعديل عنصر قائمة تواصل معنا ',   'en'    =>  'Edit Contact Us Menu Item'], 'route' => 'contact_us_menus', 'module' => 'contact_us_menus', 'as' => 'contact_us_menus.edit', 'icon' => null, 'parent' => $manageContactUsMenus->id, 'parent_original' => $manageContactUsMenus->id, 'parent_show' => $manageContactUsMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
        $deleteContactUsMenus  =  Permission::create(['name' => 'delete_contact_us_menus', 'display_name'  => ['ar'  =>  'حذف عنصر قائمة تواصل معنا ',   'en'    =>  'Delete Contact Us Menu Item'], 'route' => 'contact_us_menus', 'module' => 'contact_us_menus', 'as' => 'contact_us_menus.destroy', 'icon' => null, 'parent' => $manageContactUsMenus->id, 'parent_original' => $manageContactUsMenus->id, 'parent_show' => $manageContactUsMenus->id, 'sidebar_link' => '0', 'appear' => '0']);
    }
}
