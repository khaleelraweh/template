<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Icon;
use App\Http\Requests\Backend\CollegeRequest;
use App\Http\Requests\Backend\WebMenuRequest;
use Illuminate\Http\Request;
use App\Models\WebMenu;
use illuminate\support\Str;
use Intervention\Image\Facades\Image;
use DateTimeImmutable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CollegeMenuController extends Controller
{

    public function index()
    {
        if (!auth()->user()->ability('admin', 'manage_college_menus , show_college_menus')) {
            return redirect('admin/index');
        }

        $college_menus = WebMenu::query()->where('section', 2)
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->where('status', \request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'published_on', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);

        return view('backend.college_menus.index', compact('college_menus'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_college_menus')) {
            return redirect('admin/index');
        }

        $main_menus = WebMenu::tree();

        return view('backend.college_menus.create', compact('main_menus'));
    }

    public function store(CollegeRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_college_menus')) {
            return redirect('admin/index');
        }

        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['link'] = $request->link;
        $input['icon'] = $request->icon;
        $input['parent_id'] = $request->parent_id;

        $input['section'] = 2;

        $input['status']            =   $request->status;
        $input['created_by'] = auth()->user()->full_name;

        $webMenu = WebMenu::create($input);


        if ($request->hasFile('images') && count($request->images) > 0) {

            $i = $webMenu->photos->count() + 1;

            $images = $request->file('images');

            foreach ($images as $image) {
                $manager = new ImageManager(new Driver());

                $file_name = $webMenu->slug . '_' . time() . $i . '.' . $image->getClientOriginalExtension();
                $file_size = $image->getSize();
                $file_type = $image->getMimeType();

                $img = $manager->read($image);
                $img->save(base_path('public/assets/web_menus/' . $file_name));

                $webMenu->photos()->create([
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_status' => 'true',
                    'file_sort' => $i,
                ]);
                $i++;
            }
        }

        if ($webMenu) {
            return redirect()->route('admin.college_menus.index')->with([
                'message' => __('panel.created_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.college_menus.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }



    public function show($id)
    {
        if (!auth()->user()->ability('admin', 'display_college_menus')) {
            return redirect('admin/index');
        }
        return view('backend.college_menus.show');
    }

    public function edit($webMenu)
    {
        if (!auth()->user()->ability('admin', 'update_college_menus')) {
            return redirect('admin/index');
        }


        $main_menus = WebMenu::tree();

        $webMenu = WebMenu::where('id', $webMenu)->first();

        return view('backend.college_menus.edit', compact('main_menus', 'webMenu'));
    }

    public function update(WebMenuRequest $request, $webMenu)
    {

        $webMenu = WebMenu::where('id', $webMenu)->first();

        $input['title'] = $request->title;
        $input['link'] = $request->link;
        $input['icon'] = $request->icon;
        $input['parent_id'] = $request->parent_id;
        $input['section'] = 2;

        $input['status']            =   $request->status;
        $input['created_by'] = auth()->user()->full_name;
        $published_on = $request->published_on . ' ' . $request->published_on_time;
        $published_on = new DateTimeImmutable($published_on);
        $input['published_on'] = $published_on;

        $webMenu->update($input);

        if ($webMenu) {
            return redirect()->route('admin.college_menus.index')->with([
                'message' => __('panel.updated_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.college_menus.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }




    public function destroy($webMenu)
    {
        if (!auth()->user()->ability('admin', 'delete_college_menus')) {
            return redirect('admin/index');
        }

        $webMenu = WebMenu::where('id', $webMenu)->first()->delete();

        if ($webMenu) {
            return redirect()->route('admin.college_menus.index')->with([
                'message' => __('panel.deleted_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.college_menus.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }
}
