<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AlbumRequest;
use App\Http\Requests\Backend\PageCategoryRequest;
use App\Models\Album;
use App\Models\PageCategory;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;

class AlbumsController extends Controller
{

    public function index()
    {
        if (!auth()->user()->ability('admin', 'manage_albums , show_albums')) {
            return redirect('admin/index');
        }

        $albums = Album::query()
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->where('status', \request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'created_at', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 100);

        return view('backend.albums.index', compact('albums'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_albums')) {
            return redirect('admin/index');
        }

        return view('backend.albums.create');
    }

    public function store(AlbumRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_albums')) {
            return redirect('admin/index');
        }


        $input['title'] = $request->title;
        $input['description'] = $request->description;

        $input['metadata_title'] = $request->metadata_title;
        $input['metadata_description'] = $request->metadata_description;
        $input['metadata_keywords'] = $request->metadata_keywords;

        $input['status']            =   $request->status;
        $input['created_by'] = auth()->user()->full_name;

        $album = Album::create($input);

        if ($request->hasFile('images') && count($request->images) > 0) {

            $i = $album->photos->count() + 1;

            $images = $request->file('images');

            foreach ($images as $image) {
                $manager = new ImageManager(new Driver());

                $file_name = $album->slug . '_' . time() . $i . '.' . $image->getClientOriginalExtension();
                $file_size = $image->getSize();
                $file_type = $image->getMimeType();

                $img = $manager->read($image);
                $img->save(base_path('public/assets/albums/' . $file_name));

                $album->photos()->create([
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_status' => 'true',
                    'file_sort' => $i,
                ]);
                $i++;
            }
        }

        if ($album) {
            return redirect()->route('admin.albums.index')->with([
                'message' => __('panel.created_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.albums.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }



    public function show($id)
    {
        if (!auth()->user()->ability('admin', 'display_albums')) {
            return redirect('admin/index');
        }
        return view('backend.albums.show');
    }

    public function edit($album)
    {
        if (!auth()->user()->ability('admin', 'update_albums')) {
            return redirect('admin/index');
        }

        $album = Album::where('id', $album)->first();

        return view('backend.albums.edit', compact('album'));
    }

    public function update(PageCategoryRequest $request, $page_category)
    {
        if (!auth()->user()->ability('admin', 'update_albums')) {
            return redirect('admin/index');
        }

        $page_category = PageCategory::where('id', $page_category)->first();

        $input['title'] = $request->title;
        $input['content'] = $request->content;

        $input['metadata_title'] = $request->metadata_title;
        $input['metadata_description'] = $request->metadata_description;
        $input['metadata_keywords'] = $request->metadata_keywords;

        $input['status']            =   $request->status;
        $input['created_by'] = auth()->user()->full_name;

        $page_category->update($input);

        if ($request->hasFile('images') && count($request->images) > 0) {

            $i = $page_category->photos->count() + 1;

            $images = $request->file('images');

            foreach ($images as $image) {
                $manager = new ImageManager(new Driver());

                $file_name = $page_category->slug . '_' . time() . $i . '.' . $image->getClientOriginalExtension();
                $file_size = $image->getSize();
                $file_type = $image->getMimeType();

                $img = $manager->read($image);
                $img->save(base_path('public/assets/albums/' . $file_name));

                $page_category->photos()->create([
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_status' => 'true',
                    'file_sort' => $i,
                ]);
                $i++;
            }
        }

        if ($page_category) {
            return redirect()->route('admin.albums.index')->with([
                'message' => __('panel.updated_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.albums.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }

    public function destroy($page_category)
    {
        if (!auth()->user()->ability('admin', 'delete_albums')) {
            return redirect('admin/index');
        }

        // Find the page category
        $page_category = PageCategory::findOrFail($page_category);

        // Get all related images
        $images = $page_category->photos;

        // Loop through each image and delete the file from the storage
        foreach ($images as $image) {
            if (File::exists(public_path('assets/albums/' . $image->file_name))) {
                File::delete(public_path('assets/albums/' . $image->file_name));
            }
            // Delete the image record from the database
            $image->delete();
        }

        // Now delete the page category record
        $page_category->delete();


        if ($page_category) {
            return redirect()->route('admin.albums.index')->with([
                'message' => __('panel.deleted_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.albums.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }

    public function remove_image(Request $request)
    {
        if (!auth()->user()->ability('admin', 'delete_albums')) {
            return redirect('admin/index');
        }
        $page_category = PageCategory::findOrFail($request->page_category_id);
        $image = $page_category->photos()->where('id', $request->image_id)->first();
        if (File::exists('assets/albums/' . $image->file_name)) {
            unlink('assets/albums/' . $image->file_name);
        }
        $image->delete();
        return true;
    }
}
