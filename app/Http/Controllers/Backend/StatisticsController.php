<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StatisticRequest;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        if (!auth()->user()->ability('admin', 'manage_statistics , show_statistics')) {
            return redirect('admin/index');
        }

        $statistics = Statistic::query()
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->where('status', \request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'created_at', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);


        return view('backend.statistics.index', compact('statistics'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_statistics')) {
            return redirect('admin/index');
        }


        return view('backend.statistics.create');
    }

    public function store(StatisticRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_statistics')) {
            return redirect('admin/index');
        }

        $input['icon']                      =   $request->icon;
        $input['title']                     =   $request->title;
        $input['statistic_number']          =   $request->statistic_number;

        $input['metadata_title']        = $request->metadata_title;
        $input['metadata_description']  = $request->metadata_description;
        $input['metadata_keywords']     = $request->metadata_keywords;

        $input['status']                    =   $request->status;
        $input['created_by']                =   auth()->user()->full_name;

        $statistic = Statistic::create($input);

        if ($statistic) {
            return redirect()->route('admin.statistics.index')->with([
                'message' => __('panel.created_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.statistics.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }

    public function show($id)
    {
        if (!auth()->user()->ability('admin', 'display_statistics')) {
            return redirect('admin/index');
        }

        return view('backend.statistics.show');
    }

    public function edit($statistic)
    {
        if (!auth()->user()->ability('admin', 'update_statistics')) {
            return redirect('admin/index');
        }

        $statistic =  Statistic::where('id', $statistic)->first();
        return view('backend.statistics.edit', compact('statistic'));
    }

    public function update(StatisticRequest $request,  $statistic)
    {
        if (!auth()->user()->ability('admin', 'update_statistics')) {
            return redirect('admin/index');
        }

        $statistic = Statistic::where('id', $statistic)->first();

        $input['icon']                      =   $request->icon;
        $input['title']                     =   $request->title;
        $input['statistic_number']          =   $request->statistic_number;

        $input['metadata_title']        = $request->metadata_title;
        $input['metadata_description']  = $request->metadata_description;
        $input['metadata_keywords']     = $request->metadata_keywords;

        $input['status']                    =   $request->status;
        $input['created_by']                =   auth()->user()->full_name;

        $published_on = str_replace(['ص', 'م'], ['AM', 'PM'], $request->published_on);
        $published_on = Carbon::createFromFormat('Y/m/d h:i A', $published_on)->format('Y-m-d H:i:s');
        $input['published_on'] = $published_on;

        $statistic->update($input);




        if ($statistic) {
            return redirect()->route('admin.statistics.index')->with([
                'message' => __('panel.updated_successfully'),
                'alert-type' => 'success'
            ]);
        }
        return redirect()->route('admin.statistics.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }

    public function destroy($statistic)
    {
        if (!auth()->user()->ability('admin', 'delete_statistics')) {
            return redirect('admin/index');
        }

        $statistic = Statistic::where('id', $statistic)->first();

        $statistic->delete();

        if ($statistic) {
            return redirect()->route('admin.statistics.index')->with([
                'message' => __('panel.deleted_successfully'),
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('admin.statistics.index')->with([
            'message' => __('panel.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }
}
