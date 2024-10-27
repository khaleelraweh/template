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
        //pages 
        $managePageCategories = Permission::create(['name' => 'manage_page_categories', 'display_name' => ['ar' => 'إدارة تصنيف الصفحات', 'en' => 'Manage Page Categories'], 'route' => 'page_categories', 'module' => 'page_categories', 'as' => 'page_categories.index', 'icon' => 'far fa-file-alt', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '115',]);
        $managePageCategories->parent_show = $managePageCategories->id;
        $managePageCategories->save();
        $showPages    =  Permission::create(['name' => 'show_page_categories',  'display_name' => ['ar'     => 'إدارة تصنيف الصفحات ', 'en'  =>   'manage Page Categories'], 'route' => 'page_categories', 'module' => 'page_categories', 'as' => 'page_categories.index', 'icon' => 'far fa-file-alt', 'parent' => $managePageCategories->id, 'parent_original' => $managePageCategories->id, 'parent_show' => $managePageCategories->id, 'sidebar_link' => '1', 'appear' => '1']);
        $createPages  =  Permission::create(['name' => 'create_page_categories', 'display_name'  => ['ar'     => 'إضافة تصنيف صفحة', 'en'  =>  'Add Page Category'], 'route' => 'page_categories', 'module' => 'page_categories', 'as' => 'page_categories.create', 'icon' => null, 'parent' => $managePageCategories->id, 'parent_original' => $managePageCategories->id, 'parent_show' => $managePageCategories->id, 'sidebar_link' => '0', 'appear' => '0']);
        $displayPages =  Permission::create(['name' => 'display_page_categories', 'display_name'  => ['ar'     => 'عرض تصنيف صفحة', 'en'  =>  'Display Page Category'], 'route' => 'page_categories', 'module' => 'page_categories', 'as' => 'page_categories.show', 'icon' => null, 'parent' => $managePageCategories->id, 'parent_original' => $managePageCategories->id, 'parent_show' => $managePageCategories->id, 'sidebar_link' => '0', 'appear' => '0']);
        $updatePages  =  Permission::create(['name' => 'update_page_categories', 'display_name'  => ['ar'     => 'تعديل تصنيف صفحة', 'en'  =>  'Edit Page Category'], 'route' => 'page_categories', 'module' => 'page_categories', 'as' => 'page_categories.edit', 'icon' => null, 'parent' => $managePageCategories->id, 'parent_original' => $managePageCategories->id, 'parent_show' => $managePageCategories->id, 'sidebar_link' => '0', 'appear' => '0']);
        $deletePages  =  Permission::create(['name' => 'delete_page_categories', 'display_name'  => ['ar'     => 'حذف تصنيف صفحة', 'en'  =>  'Delete Page Category'], 'route' => 'page_categories', 'module' => 'page_categories', 'as' => 'page_categories.destroy', 'icon' => null, 'parent' => $managePageCategories->id, 'parent_original' => $managePageCategories->id, 'parent_show' => $managePageCategories->id, 'sidebar_link' => '0', 'appear' => '0']);
    }
}
