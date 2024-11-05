<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use illuminate\support\Str;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SiteSettingsController extends Controller
{

    // =============== start info site ===============//
    public function show_main_informations()
    {
        return view('backend.site_infos.index');
    }

    public function update_main_informations(Request $request, $id)
    {
        $data = $request->except('_token', 'submit');

        foreach ($data as $key => $value) {
            $site = SiteSetting::where('key', $key)
                ->where('section', $id)
                ->get()
                ->first()
                ->update([
                    'value' => $value
                ]);
        }

        //------------------- For Site Image Start --------------//
        $site_image = SiteSetting::where('key', 'site_img')
            ->where('section', $id)
            ->get()
            ->first();

        if ($image = $request->file('site_img')) {

            if ($site_image->value != null && File::exists('assets/site_settings/' . $site_image->value)) {
                unlink('assets/site_settings/' . $site_image->value);
            }

            $manager = new ImageManager(new Driver());
            $file_name = Str::slug($request->input('site_name.' . app()->getLocale())) . "." . $image->getClientOriginalExtension();

            $img = $manager->read($request->file('site_img'));

            $img->save(base_path('public/assets/site_settings/' . $file_name));

            $site_image->update([
                'value' => $file_name
            ]);
        }
        //------------------- For Site Image end --------------//

        //------------------- For site_logo_large_light Start  --------------//
        $site_logo_large_light = SiteSetting::where('key', 'site_logo_large_light')
            ->where('section', $id)
            ->get()
            ->first();
        if ($image = $request->file('site_logo_large_light')) {

            if ($site_logo_large_light->value != null && File::exists('assets/site_settings/' . $site_logo_large_light->value)) {
                unlink('assets/site_settings/' . $site_logo_large_light->value);
            }

            $manager = new ImageManager(new Driver());
            $file_name = "site_logo_large_light" . "." . $image->getClientOriginalExtension();

            $img = $manager->read($request->file('site_logo_large_light'));

            $img->save(base_path('public/assets/site_settings/' . $file_name));

            $site_logo_large_light->update([
                'value' => $file_name
            ]);
        }
        //------------------- For site_logo_large_light end  --------------//


        self::updateCache();

        return redirect()->route('admin.settings.site_main_infos.show')->with([
            'message' => __('panel.updated_successfully'),
            'alert-type' => 'success'
        ]);
    }

    public function remove_image(Request $request)
    {

        $site_image = SiteSetting::findOrFail($request->site_info_id);
        if (File::exists('assets/site_settings/' . $site_image->value)) {
            unlink('assets/site_settings/' . $site_image->value);
            $site_image->value = null;
            $site_image->save();
        }
        if ($site_image->value != null) {
            $site_image->value = null;
            $site_image->save();
        }

        self::updateCache();

        return true;
    }

    public function remove_site_logo_large_light(Request $request)
    {

        $site_image = SiteSetting::findOrFail($request->site_info_id);
        if (File::exists('assets/site_settings/' . $site_image->value)) {
            unlink('assets/site_settings/' . $site_image->value);
            $site_image->value = null;
            $site_image->save();
        }
        if ($site_image->value != null) {
            $site_image->value = null;
            $site_image->save();
        }

        self::updateCache();

        return true;
    }
    // =============== end info site ===============//


    // =============== start contact site ===============//
    public function show_contact_informations()
    {
        return view('backend.site_contacts.index');
    }

    public function update_contact_informations(Request $request, $id)
    {

        $data = $request->except('_token', 'submit');

        foreach ($data as $key => $value) {
            $site = SiteSetting::where('key', $key)
                ->where('section', $id)
                ->get()
                ->first()
                ->update([
                    'value' => $value
                ]);
        }

        self::updateCache();

        return redirect()->route('admin.settings.site_contacts.show')->with([
            'message' => __('panel.updated_successfully'),
            'alert-type' => 'success'
        ]);
    }
    // =============== end contact site ===============//


    // =============== start social site ===============//
    public function show_socail_informations()
    {
        return view('backend.site_socials.index');
    }

    public function update_social_informations(Request $request, $id)
    {

        $data = $request->except('_token', 'submit');

        foreach ($data as $key => $value) {
            $site = SiteSetting::where('key', $key)
                ->where('section', $id)
                ->get()
                ->first()
                ->update([
                    'value' => $value
                ]);
        }

        self::updateCache();

        return redirect()->route('admin.settings.site_socials.show')->with([
            'message' => __('panel.updated_successfully'),
            'alert-type' => 'success'
        ]);
    }

    // =============== end social site ===============//

    // =============== end meta site ===============//
    public function show_meta_informations()
    {
        return view('backend.site_metas.index');
    }

    public function update_meta_informations(Request $request, $id)
    {

        $data = $request->except('_token', 'submit');

        foreach ($data as $key => $value) {
            $site = SiteSetting::where('key', $key)
                ->where('section', $id)
                ->get()
                ->first()
                ->update([
                    'value' => $value
                ]);
        }

        self::updateCache();

        return redirect()->route('admin.settings.site_meta.show')->with([
            'message' => __('panel.updated_successfully'),
            'alert-type' => 'success'
        ]);
    }
    // =============== end meta site ===============//

    // =============== start payment method site ===============//
    public function show_payment_method_informations()
    {
        return view('backend.site_payment_methods.index');
    }

    public function update_payment_method_informations(Request $request, $id)
    {

        $data = $request->except('_token', 'submit');

        foreach ($data as $key => $value) {
            $site = SiteSetting::where('key', $key)
                ->where('section', $id)
                ->get()
                ->first()
                ->update([
                    'value' => $value
                ]);
        }

        self::updateCache();

        return redirect()->route('admin.settings.site_payment_methods.show')->with([
            'message' => __('panel.updated_successfully'),
            'alert-type' => 'success'
        ]);
    }
    // =============== end payment method site ===============//


    // =============== start payment method site ===============//
    public function show_site_counter_informations()
    {
        return view('backend.site_counters.index');
    }

    public function update_site_counter_informations(Request $request, $id)
    {
        $data = $request->except('_token', 'submit');

        foreach ($data as $key => $value) {
            $site = SiteSetting::where('key', $key)
                ->where('section', $id)
                ->get()
                ->first()
                ->update([
                    'value' => $value
                ]);
        }

        self::updateCache();

        return redirect()->route('admin.settings.site_counters.show')->with([
            'message' => __('panel.updated_successfully'),
            'alert-type' => 'success'
        ]);
    }
    // =============== end payment method site ===============//


    // To update cache with new data when updating fields to database because cache will take a day to updated automatacly 
    private function updateCache()
    {
        Cache::forget('siteSettings');
        $siteSettings = Cache()->remember(
            'siteSettings',
            3600,
            fn() => SiteSetting::all()->keyBy('key')
        );

        View::share('siteSettings', $siteSettings);
    }
}
