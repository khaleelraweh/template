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
        // Statistics
        $manageStatistics = Permission::create(['name' => 'manage_Statistics', 'display_name' => ['ar'  =>  'إدارة إحصائيات الجامعة',    'en'    =>  'Manage Statistics'], 'route' => 'statistics', 'module' => 'statistics', 'as' => 'statistics.index', 'icon' => 'far fa-calendar-alt', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '70',]);
        $manageStatistics->parent_show = $manageStatistics->id;
        $manageStatistics->save();
        $showStatistics   =  Permission::create(['name'  => 'show_Statistics', 'display_name'       =>  ['ar'   =>  'إحصائيات الجامعة',   'en'    =>  'Statistics'], 'route' => 'statistics', 'module' => 'statistics', 'as' => 'statistics.index', 'icon' => 'far fa-calendar-alt', 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $createStatistics =  Permission::create(['name'  => 'create_Statistics', 'display_name'     =>  ['ar'   =>  'إنشاء إحصاء جديد',   'en'    =>  'Create Statistic'], 'route' => 'statistics', 'module' => 'statistics', 'as' => 'statistics.create', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $displayStatistics =  Permission::create(['name' => 'display_Statistics', 'display_name'    =>  ['ar'   =>  'عرض إحصاء',   'en'    =>  'Display Statistic'], 'route' => 'statistics', 'module' => 'statistics', 'as' => 'statistics.show', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $updateStatistics  =  Permission::create(['name' => 'update_Statistics', 'display_name'     =>  ['ar'   =>  'تعديل إحصاء',   'en'    =>  'Edit Statistic'], 'route' => 'statistics', 'module' => 'statistics', 'as' => 'statistics.edit', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $deleteStatistics =  Permission::create(['name'  => 'delete_Statistics', 'display_name'     =>  ['ar'   =>  'حذف إحصاء',   'en'    =>  'Delete Statistic'], 'route' => 'statistics', 'module' => 'statistics', 'as' => 'statistics.destroy', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
    }
}
