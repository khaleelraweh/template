<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\WebMenuRequest;
use App\Models\Menu;
use App\Models\WebMenu;
use DateTimeImmutable;
use Illuminate\Http\Request;

class MainMenuController extends Controller
{

    public function index()
    {
        if (!auth()->user()->ability('admin', 'manage_main_menus , show_main_menus')) {
            return redirect('admin/index');
        }

        $main_menus = Menu::query()->where('section', 1)
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->where('status', \request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'published_on', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);



        return view('backend.main_menus.index', compact('main_menus'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_main_menus')) {
            return redirect('admin/index');
        }

        $main_menus = WebMenu::tree();

        return view('backend.main_menus.create', compact('main_menus'));
    }

    public function store(WebMenuRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_main_menus')) {
            return redirect('admin/index');
        }

        $input['title'] = $request->title;
        $input['link'] = $request->link;
        $input['icon'] = $request->icon;
        $input['parent_id'] = $request->parent_id;

        $input['section'] = 1;

        $input['status']            =   $request->status;
        $input['created_by'] = auth()->user()->full_name;
        $published_on = $request->published_on . ' ' . $request->published_on_time;
        $published_on = new DateTimeImmutable($published_on);
        $input['published_on'] = $published_on;

        $webMenu = WebMenu::create($input);


        if ($webMenu) {
            return redirect()->route('admin.main_menus.index')->with([
                'message' => __('panel.created_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.main_menus.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }



    public function show($id)
    {
        if (!auth()->user()->ability('admin', 'display_main_menus')) {
            return redirect('admin/index');
        }
        return view('backend.main_menus.show');
    }

    public function edit($webMenu)
    {
        if (!auth()->user()->ability('admin', 'update_main_menus')) {
            return redirect('admin/index');
        }


        $main_menus = WebMenu::tree();

        $webMenu = WebMenu::where('id', $webMenu)->first();

        return view('backend.main_menus.edit', compact('main_menus', 'webMenu'));
    }

    public function update(WebMenuRequest $request, $webMenu)
    {

        $webMenu = WebMenu::where('id', $webMenu)->first();

        $input['title'] = $request->title;
        $input['link'] = $request->link;
        $input['icon'] = $request->icon;
        $input['parent_id'] = $request->parent_id;
        $input['section'] = 1;

        $input['status']            =   $request->status;
        $input['created_by'] = auth()->user()->full_name;
        $published_on = $request->published_on . ' ' . $request->published_on_time;
        $published_on = new DateTimeImmutable($published_on);
        $input['published_on'] = $published_on;

        $webMenu->update($input);

        if ($webMenu) {
            return redirect()->route('admin.main_menus.index')->with([
                'message' => __('panel.updated_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.main_menus.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }

    public function destroy($webMenu)
    {
        if (!auth()->user()->ability('admin', 'delete_main_menus')) {
            return redirect('admin/index');
        }

        $webMenu = WebMenu::where('id', $webMenu)->first()->delete();

        if ($webMenu) {
            return redirect()->route('admin.main_menus.index')->with([
                'message' => __('panel.deleted_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.main_menus.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }

    public function updateMainMenuStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Menu::where('id', $data['main_menu_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'main_menu_id' => $data['main_menu_id']]);
        }
    }
}
