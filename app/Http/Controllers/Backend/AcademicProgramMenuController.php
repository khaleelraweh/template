<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AcademicProgramMenuRequest;
use App\Models\WebMenu;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;


class AcademicProgramMenuController extends Controller
{

    public function index()
    {
        if (!auth()->user()->ability('admin', 'manage_academic_program_menus , show_academic_program_menus')) {
            return redirect('admin/index');
        }

        $academic_program_menus = WebMenu::query()->where('section', 2)
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->where('status', \request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'created_at', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);

        return view('backend.academic_program_menus.index', compact('academic_program_menus'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_academic_program_menus')) {
            return redirect('admin/index');
        }

        $main_menus = WebMenu::tree();

        return view('backend.academic_program_menus.create', compact('main_menus'));
    }

    public function store(AcademicProgramMenuRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_academic_program_menus')) {
            return redirect('admin/index');
        }

        $input['title']         = $request->title;
        $input['description']   = $request->description;
        $input['link']          = $request->link;
        $input['icon']          = $request->icon;
        $input['parent_id']     = $request->parent_id;

        $input['section']       = 2;

        $input['metadata_title']        = $request->metadata_title;
        $input['metadata_description']  = $request->metadata_description;
        $input['metadata_keywords']     = $request->metadata_keywords;


        $input['status']        =   $request->status;
        $input['created_by']    = auth()->user()->full_name;

        $academic_program_menu = WebMenu::create($input);


        if ($request->hasFile('images') && count($request->images) > 0) {

            $i = $academic_program_menu->photos->count() + 1;
            $images = $request->file('images');
            foreach ($images as $image) {
                $manager = new ImageManager(new Driver());

                $file_name = $academic_program_menu->slug . '_' . time() . $i . '.' . $image->getClientOriginalExtension();
                $file_size = $image->getSize();
                $file_type = $image->getMimeType();

                $img = $manager->read($image);
                $img->save(base_path('public/assets/academic_program_menus/' . $file_name));

                $academic_program_menu->photos()->create([
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_status' => 'true',
                    'file_sort' => $i,
                ]);
                $i++;
            }
        }


        if ($academic_program_menu) {
            return redirect()->route('admin.academic_program_menus.index')->with([
                'message' => __('panel.created_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.academic_program_menus.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }



    public function show($id)
    {
        if (!auth()->user()->ability('admin', 'display_academic_program_menus')) {
            return redirect('admin/index');
        }
        return view('backend.academic_program_menus.show');
    }

    public function edit($academic_program_menu)
    {
        if (!auth()->user()->ability('admin', 'update_academic_program_menus')) {
            return redirect('admin/index');
        }

        $main_menus = WebMenu::tree();
        $academic_program_menu = WebMenu::where('id', $academic_program_menu)->first();

        return view('backend.academic_program_menus.edit', compact('main_menus', 'academic_program_menu'));
    }

    public function update(AcademicProgramMenuRequest $request, $academic_program_menu)
    {

        $academic_program_menu = WebMenu::where('id', $academic_program_menu)->first();

        $input['title']         = $request->title;
        $input['description']   = $request->description;
        $input['link']          = $request->link;
        $input['icon']          = $request->icon;
        $input['parent_id']     = $request->parent_id;

        $input['section']       = 2;

        $input['metadata_title']        = $request->metadata_title;
        $input['metadata_description']  = $request->metadata_description;
        $input['metadata_keywords']     = $request->metadata_keywords;


        $input['status']        =   $request->status;
        $input['created_by']    = auth()->user()->full_name;

        $academic_program_menu->update($input);

        if ($request->hasFile('images') && count($request->images) > 0) {
            $i = $academic_program_menu->photos->count() + 1;
            $images = $request->file('images');
            foreach ($images as $image) {
                $manager = new ImageManager(new Driver());

                $file_name = $academic_program_menu->slug . '_' . time() . $i . '.' . $image->getClientOriginalExtension();
                $file_size = $image->getSize();
                $file_type = $image->getMimeType();

                $img = $manager->read($image);
                $img->save(base_path('public/assets/academic_program_menus/' . $file_name));

                $academic_program_menu->photos()->create([
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_status' => 'true',
                    'file_sort' => $i,
                ]);
                $i++;
            }
        }

        if ($academic_program_menu) {
            return redirect()->route('admin.academic_program_menus.index')->with([
                'message' => __('panel.updated_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.academic_program_menus.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }


    public function destroy($academic_program_menu)
    {
        if (!auth()->user()->ability('admin', 'delete_academic_program_menus')) {
            return redirect('admin/index');
        }

        $academic_program_menu = WebMenu::where('id', $academic_program_menu)->first();
        if ($academic_program_menu->photos->count() > 0) {
            foreach ($academic_program_menu->photos as $photo) {
                if (File::exists('assets/academic_program_menus/' . $photo->file_name)) {
                    unlink('assets/academic_program_menus/' . $photo->file_name);
                }
                $photo->delete();
            }
        }
        $academic_program_menu->delete();

        if ($academic_program_menu) {
            return redirect()->route('admin.academic_program_menus.index')->with([
                'message' => __('panel.deleted_successfully'),
                'alert-type' => 'success'
            ]);
        }
        return redirect()->route('admin.academic_program_menus.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }

    public function remove_image(Request $request)
    {
        if (!auth()->user()->ability('admin', 'delete_academic_program_menus')) {
            return redirect('admin/index');
        }
        $academic_program_menu = WebMenu::findOrFail($request->academic_program_menu_id);
        $image = $academic_program_menu->photos()->where('id', $request->image_id)->first();
        if (File::exists('assets/academic_program_menus/' . $image->file_name)) {
            unlink('assets/academic_program_menus/' . $image->file_name);
        }
        $image->delete();
        return true;
    }

    public function updateAcademicProgramMenuStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            WebMenu::where('id', $data['academic_program_menu_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'academic_program_menu_id' => $data['academic_program_menu_id']]);
        }
    }
}
