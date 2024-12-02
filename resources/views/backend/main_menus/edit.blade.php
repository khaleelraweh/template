@extends('layouts.admin')

@section('content')
    {{-- main holder mainMenu  --}}
    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">

            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-edit"></i>
                    {{ __('panel.edit_existing_link') }}
                </h3>
                <ul class="breadcrumb pt-3">
                    <li>
                        <a href="{{ route('admin.index') }}">{{ __('panel.main') }}</a>
                        @if (config('locales.languages')[app()->getLocale()]['rtl_support'] == 'rtl')
                            /
                        @else
                            \
                        @endif
                    </li>
                    <li class="ms-1">
                        <a href="{{ route('admin.main_menus.index') }}">
                            {{ __('panel.show_main_menus') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        {{-- body part  --}}
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.main_menus.update', $mainMenu->id) }}" method="post">
                @csrf
                @method('PATCH')

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="content-tab" data-bs-toggle="tab" data-bs-target="#content"
                            type="button" role="tab" aria-controls="content"
                            aria-selected="true">{{ __('panel.content_tab') }}</button>
                    </li>


                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="published-tab" data-bs-toggle="tab" data-bs-target="#published"
                            type="button" role="tab" aria-controls="published"
                            aria-selected="false">{{ __('panel.published_tab') }}</button>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="content" role="tabpanel" aria-labelledby="content-tab">

                        <div class="row">
                            <div class="col-sm-12 col-md-3 pt-3">
                                <label for="parent_id" class="control-label">
                                    <span>{{ __('panel.category_menu') }}</span>
                                </label>
                            </div>

                            <div class="col-sm-12 col-md-9 pt-3">

                                <select name="parent_id" class="form-control">
                                    <option value="">{{ __('panel.main_category') }} __</option>

                                    @foreach ($main_menus->where('section', 1) as $main_menu)
                                        @if (count($main_menu->appearedChildren) == false)
                                            <option style="color: black;font-weight: bold;font-size:18px;"
                                                value="{{ $main_menu->id }}"
                                                {{ old('parent_id', $mainMenu->parent_id) == $main_menu->id ? 'selected' : null }}>
                                                {{ $main_menu->title }}
                                            </option>
                                        @else
                                            <option style="color: black;font-weight: bold;font-size:18px;"
                                                value="{{ $main_menu->id }}"
                                                {{ old('parent_id', $mainMenu->parent_id) == $main_menu->id ? 'selected' : null }}>
                                                {{ $main_menu->title }}
                                            </option>
                                            @if ($main_menu->appearedChildren !== null && count($main_menu->appearedChildren) > 0)
                                                @foreach ($main_menu->appearedChildren as $sub_menu)
                                                    @if (count($sub_menu->appearedChildren) == false)
                                                        <option style="color:blue;font-weight:bold;font-size:15px;"
                                                            value="{{ $sub_menu->id }}"
                                                            {{ old('parent_id', $mainMenu->parent_id) == $sub_menu->id ? 'selected' : null }}>
                                                            &nbsp; &nbsp; &nbsp;{{ $sub_menu->title }}
                                                        </option>
                                                    @else
                                                        <option style="color:blue;font-weight:bold;font-size:15px;"
                                                            value="{{ $sub_menu->id }}"
                                                            {{ old('parent_id', $mainMenu->parent_id) == $sub_menu->id ? 'selected' : null }}>
                                                            &nbsp; &nbsp; &nbsp;{{ $sub_menu->title }}
                                                        </option>
                                                        @if ($sub_menu->appearedChildren !== null && count($sub_menu->appearedChildren) > 0)
                                                            @foreach ($sub_menu->appearedChildren as $sub_menu_2)
                                                                <option style="font-size: 14px;"
                                                                    value="{{ $sub_menu_2->id }}"
                                                                    {{ old('parent_id', $mainMenu->parent_id) == $sub_menu_2->id ? 'selected' : null }}>
                                                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                    &nbsp;{{ $sub_menu_2->title }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                            </li>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        @foreach (config('locales.languages') as $key => $val)
                            <div class="row ">
                                <div class="col-sm-12 col-md-3 pt-3">
                                    <label for="title[{{ $key }}]">
                                        {{ __('panel.title') }}
                                        <span class="language-type">
                                            <i class="flag-icon flag-icon-{{ $key == 'ar' ? 'ye' : 'us' }} mt-1 "
                                                title="{{ app()->getLocale() == 'ar' ? 'ye' : 'us' }}"></i>
                                            {{ __('panel.' . $key) }}
                                        </span>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-9 pt-3">
                                    <input type="text" name="title[{{ $key }}]"
                                        id="title[{{ $key }}]"
                                        value="{{ old('title.' . $key, $mainMenu->getTranslation('title', $key)) }}"
                                        class="form-control">
                                    @error('title.' . $key)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        @endforeach


                        @foreach (config('locales.languages') as $key => $val)
                            <div class="row ">
                                <div class="col-sm-12 col-md-3 pt-3">
                                    <label for="description[{{ $key }}]">
                                        {{ __('panel.f_description') }}
                                        <span class="language-type">
                                            <i class="flag-icon flag-icon-{{ $key == 'ar' ? 'ye' : 'us' }} mt-1 "
                                                title="{{ app()->getLocale() == 'ar' ? 'ye' : 'us' }}"></i>
                                            {{ __('panel.' . $key) }}
                                        </span>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-9 pt-3">
                                    <textarea id="tinymceExample" name="description[{{ $key }}]" rows="10" class="form-control ">{!! old('description.' . $key, $mainMenu->getTranslation('description', $key)) !!}</textarea>
                                    @error('description.' . $key)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

                        @foreach (config('locales.languages') as $key => $val)
                            <div class="row ">
                                <div class="col-sm-12 col-md-3 pt-3">
                                    <label for="link[{{ $key }}]">
                                        {{ __('panel.link') }}
                                        <span class="language-type">
                                            <i class="flag-icon flag-icon-{{ $key == 'ar' ? 'ye' : 'us' }} mt-1 "
                                                title="{{ app()->getLocale() == 'ar' ? 'ye' : 'us' }}"></i>
                                            {{ __('panel.' . $key) }}
                                        </span>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-9 pt-3">
                                    <input type="text" name="link[{{ $key }}]" id="link[{{ $key }}]"
                                        value="{{ old('link.' . $key, $mainMenu->getTranslation('link', $key)) }}"
                                        class="form-control">
                                    @error('link.' . $key)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

                        <div class="row ">
                            <div class="col-sm-12 col-md-3 pt-3">
                                <label for="icon" class="control-label">
                                    <span>{{ __('panel.choose_icon') }}</span>
                                </label>
                            </div>
                            <div class="col-sm-12 col-md-9 pt-3">
                                <div class="input-group iconpicker-container ">
                                    <input data-placement="bottomRight"
                                        class="form-control icp icp-auto iconpicker-element iconpicker-input icon-picker form-control"
                                        value=" {{ old('icon', $mainMenu->icon) ?? 'fas fa-archive' }}" type="text"
                                        name="icon">
                                    <span class="input-group-addon btn btn-primary">
                                        <i class="{{ $mainMenu->icon ?? 'fas fa-archive' }}"></i>
                                    </span>
                                </div>
                                @error('icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>


                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-3 pt-3">
                                {{ __('panel.published_on') }}
                            </div>
                            <div class="col-sm-12 col-md-9 pt-3">
                                <div class="input-group flatpickr" id="flatpickr-datetime">
                                    <input type="text" name="published_on" class="form-control"
                                        placeholder="Select date" data-input
                                        value="{{ old('published_on', $mainMenu->published_on ? \Carbon\Carbon::parse($mainMenu->published_on)->format('Y/m/d h:i A') : '') }}">
                                    <span class="input-group-text input-group-addon" data-toggle>
                                        <i data-feather="calendar"></i>
                                    </span>
                                </div>
                                @error('published_on')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-3 pt-3">
                                <label for="status" class="control-label">
                                    <span>{{ __('panel.status') }}</span>
                                </label>
                            </div>
                            <div class="col-sm-12 col-md-9 pt-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="status" id="status_active"
                                        value="1" {{ old('status', $mainMenu->status) == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_active">
                                        {{ __('panel.status_active') }}
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="status" id="status_inactive"
                                        value="0" {{ old('status', $mainMenu->status) == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_inactive">
                                        {{ __('panel.status_inactive') }}
                                    </label>
                                </div>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        {{-- <div class="row ">
                            @foreach (config('locales.languages') as $key => $val)
                                <div class="col-sm-12 col-md-6 pt-3">
                                    <div class="form-group">
                                        <label for="link[{{ $key }}]">
                                            {{ __('panel.link') }}
                                            {{ __('panel.in') }}
                                            ({{ __('panel.' . $key) }})
                                        </label>
                                        <input type="text" id="link[{{ $key }}]"
                                            name="link[{{ $key }}]"
                                            value="{{ old('link.' . $key, $mainMenu->getTranslation('link', $key)) }}"
                                            class="form-control">
                                        @error('link.' . $key)
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}
                    </div>

                    <div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-3">
                                <div class="form-group">
                                    <label for="published_on"> {{ __('panel.published_date') }}</label>
                                    <input type="text" id="published_on" name="published_on"
                                        value="{{ old('published_on', now()->format('Y-m-d')) }}" class="form-control">
                                    @error('published_on')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-3">
                                <div class="form-group">
                                    <label for="published_on_time"> {{ __('panel.published_time') }}</label>
                                    <input type="text" id="published_on_time" name="published_on_time"
                                        value="{{ old('published_on_time', now()->format('h:m A')) }}"
                                        class="form-control">
                                    @error('published_on_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 pt-3">
                                <label for="status" class="control-label col-md-3 col-sm-12 ">
                                    <span>{{ __('panel.status') }}</span>
                                </label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : null }}>
                                        {{ __('panel.status_active') }}
                                    </option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : null }}>
                                        {{ __('panel.status_inactive') }}
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-sm-12 col-md-3 pt-3 d-none d-md-block">
                        </div>
                        <div class="col-sm-12 col-md-9 pt-3">
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="icon-lg  me-2" data-feather="corner-down-left"></i>
                                {{ __('panel.update_data') }}
                            </button>

                            <a href="{{ route('admin.main_menus.index') }}" name="submit"
                                class=" btn btn-outline-danger">
                                <i class="icon-lg  me-2" data-feather="x"></i>
                                {{ __('panel.cancel') }}
                            </a>

                        </div>
                    </div>

                </div>



            </form>
        </div>

    </div>
@endsection


@section('script')
    <script>
        $(function() {

            $('#published_on').pickadate({
                format: 'yyyy-mm-dd',
                min: new Date(),
                selectMonths: true, // Creates a dropdown to control month
                selectYears: true, // creates a dropdown to control years
                clear: 'Clear',
                close: 'OK',
                colseOnSelect: true // Close Upon Selecting a date
            });

            var publishedOn = $('#published_on').pickadate(
                'picker'); // set startdate in the picker to the start date in the #start_date elemet

            // when change date 
            $('#published_on').change(function() {
                selected_ci_date = "";
                selected_ci_date = now() // make selected start date in picker = start_date value  

            });

            $('#published_on_time').pickatime({
                clear: ''
            });

        });
    </script>
@endsection
