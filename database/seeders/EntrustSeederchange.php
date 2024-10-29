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


        // Events
        $manageEvents = Permission::create(['name' => 'manage_events', 'display_name' => ['ar'  =>  'إدارة الاحداث القادمة',    'en'    =>  'Manage ُEvents'], 'route' => 'events', 'module' => 'events', 'as' => 'events.index', 'icon' => 'far fa-calendar-alt', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '70',]);
        $manageEvents->parent_show = $manageEvents->id;
        $manageEvents->save();
        $showEvents   =  Permission::create(['name'  => 'show_events', 'display_name'       =>  ['ar'   =>  'الاحداث القادمة',   'en'    =>  'ُEvents'], 'route' => 'events', 'module' => 'events', 'as' => 'events.index', 'icon' => 'far fa-calendar-alt', 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $createEvents =  Permission::create(['name'  => 'create_events', 'display_name'     =>  ['ar'   =>  'إنشاء حدث',   'en'    =>  'Create Event'], 'route' => 'events', 'module' => 'events', 'as' => 'events.create', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $displayEvents =  Permission::create(['name' => 'display_events', 'display_name'    =>  ['ar'   =>  'عرض حدث',   'en'    =>  'Display Event'], 'route' => 'events', 'module' => 'events', 'as' => 'events.show', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $updateEvents  =  Permission::create(['name' => 'update_events', 'display_name'     =>  ['ar'   =>  'تعديل حدث',   'en'    =>  'Edit Event'], 'route' => 'events', 'module' => 'events', 'as' => 'events.edit', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
        $deleteEvents =  Permission::create(['name'  => 'delete_events', 'display_name'     =>  ['ar'   =>  'حذف حدث',   'en'    =>  'Delete Event'], 'route' => 'events', 'module' => 'events', 'as' => 'events.destroy', 'icon' => null, 'parent' => '0', 'parent_original' => '0', 'parent_show' => '0', 'sidebar_link' => '0', 'appear' => '0']);
    }
}
