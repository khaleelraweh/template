@extends('layouts.admin')
@php
    use App\Models\SiteSetting;
@endphp

@section('content')
    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-folder"></i>
                    {{ __('panel.manage_site_settings') }}

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
                        {{ __('panel.show_site_information') }}
                    </li>
                </ul>
            </div>

            <div class="ml-auto d-none">
                @ability('admin', 'create_main_sliders')
                    <a href="{{ route('admin.main_sliders.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus-square"></i>
                        </span>
                        <span class="text">{{ __('panel.add_new_site_information') }}</span>
                    </a>
                @endability
            </div>

        </div>

        {{-- body part  --}}
        <div class="card-body">

            <form action="{{ route('admin.settings.site_main_infos.update', 1) }}" method="post"
                enctype="multipart/form-data">
                @csrf

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="content-tab" data-bs-toggle="tab" data-bs-target="#content"
                            type="button" role="tab" aria-controls="content"
                            aria-selected="true">{{ __('panel.content_tab') }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="logo-tab" data-bs-toggle="tab" data-bs-target="#logo" type="button"
                            role="tab" aria-controls="logo" aria-selected="false">{{ __('panel.logo_tab') }}
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">

                        @foreach (config('locales.languages') as $key => $val)
                            <div class="row">
                                <div class="col-sm-12 col-md-2 pt-3">

                                    <label for="site_name_{{ $key }}">
                                        {{ __('panel.site_name') }}
                                        <span class="language-type">
                                            <i class="flag-icon flag-icon-{{ $key == 'ar' ? 'ye' : 'us' }} mt-1 "
                                                title="{{ app()->getLocale() == 'ar' ? 'ye' : 'us' }}"></i>
                                            {{ __('panel.' . $key) }}
                                        </span>
                                    </label>
                                </div>

                                <div class="col-sm-12 col-md-10 pt-3">
                                    <input type="text" id="site_name_{{ $key }}"
                                        name=" site_name[{{ $key }}]"
                                        value="{{ old('site_name.' . $key, $siteSettings['site_name']->getTranslation('value', $key)) }}"
                                        class="form-control">
                                    @error('site_name.' . $key)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

                        @foreach (config('locales.languages') as $key => $val)
                            <div class="row">
                                <div class="col-sm-12 col-md-2 pt-3">
                                    <label for="site_short_name_{{ $key }}">
                                        {{ __('panel.site_short_name') }}
                                        <span class="language-type">
                                            <i class="flag-icon flag-icon-{{ $key == 'ar' ? 'ye' : 'us' }} mt-1 "
                                                title="{{ app()->getLocale() == 'ar' ? 'ye' : 'us' }}"></i>
                                            {{ __('panel.' . $key) }}
                                        </span>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-10 pt-3">
                                    <input type="text" id="site_short_name_{{ $key }}"
                                        name="site_short_name[{{ $key }}]"
                                        value="{{ old('site_short_name.' . $key, $siteSettings['site_short_name']->getTranslation('value', $key)) }}"
                                        class="form-control" placeholder="{{ $siteSettings['site_short_name']->key }}">
                                    @error('site_short_name.' . $key)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

                        @foreach (config('locales.languages') as $key => $val)
                            <div class="row ">
                                <div class="col-sm-12 col-md-2 pt-3">
                                    <label for="site_description_{{ $key }}">
                                        {{ __('panel.f_description') }}
                                        <span class="language-type">
                                            <i class="flag-icon flag-icon-{{ $key == 'ar' ? 'ye' : 'us' }} mt-1 "
                                                title="{{ app()->getLocale() == 'ar' ? 'ye' : 'us' }}"></i>
                                            {{ __('panel.' . $key) }}
                                        </span>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-10 pt-3">
                                    <textarea id="tinymceExample" name="site_description[{{ $key }}]" rows="10" class="form-control ">{!! old('site_description.' . $key, $siteSettings['site_description']->getTranslation('value', $key)) !!}</textarea>
                                    @error('site_description.' . $key)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach


                        @foreach (config('locales.languages') as $key => $val)
                            <div class="row">
                                <div class="col-sm-12 col-md-2 pt-3">
                                    <label for="site_link_{{ $key }}">
                                        {{ __('panel.site_link') }}
                                        <span class="language-type">
                                            <i class="flag-icon flag-icon-{{ $key == 'ar' ? 'ye' : 'us' }} mt-1 "
                                                title="{{ app()->getLocale() == 'ar' ? 'ye' : 'us' }}"></i>
                                            {{ __('panel.' . $key) }}
                                        </span>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-10 pt-3">
                                    <input type="text" id="site_link_{{ $key }}"
                                        name="site_link[{{ $key }}]"
                                        value="{{ old('site_link.' . $key, $siteSettings['site_link']->getTranslation('value', $key)) }}"
                                        class="form-control">
                                    @error('site_link.' . $key)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        @endforeach

                        <div class="row ">
                            <div class="col-sm-12 col-md-2 pt-3">
                                <label for="{{ $siteSettings['site_img']->key }}">
                                    {{ __('panel.site_img') }}
                                </label>
                            </div>
                            <div class="col-sm-12 col-md-10 pt-3">
                                <div class="file-loading">
                                    <input type="file" name="{{ $siteSettings['site_img']->key }}"
                                        id="customer_image" class="file-input-overview ">
                                    <span class="form-text text-muted">Image width should be 500px x 500px </span>
                                    @error($siteSettings['site_img']->key)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>





                    </div>

                    <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">

                        <div class="row ">
                            <div class="col-sm-12 col-md-2 pt-3">
                                <label for="{{ $siteSettings['site_img']->key }}">
                                    {{ __('panel.site_img') }}
                                </label>
                            </div>
                            <div class="col-sm-12 col-md-10 pt-3">
                                <div class="file-loading">
                                    <input type="file" name="{{ $siteSettings['site_img']->key }}"
                                        id="site_logo_large_light" class="file-input-overview ">
                                    <span class="form-text text-muted">Image width should be 500px x 500px </span>
                                    @error($siteSettings['site_img']->key)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>


                    </div>


                </div>

                @ability('admin', 'update_site_infos')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group pt-3 mx-3">
                                <button type="submit" name="submit" class="btn btn-primary"> {{ __('panel.update_data') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endability

            </form>

        </div>

    </div>
@endsection


@section('script')
    <script>
        $(function() {

            $("#customer_image").fileinput({
                theme: "fa5",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if ($siteSettings['site_img']->value != null)
                        "{{ asset('assets/site_settings/' . $siteSettings['site_img']->value) }}",
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @if ($siteSettings['site_img']->value != null)
                        {
                            caption: "{{ $siteSettings['site_img']->value }}",
                            size: '1111',
                            width: "120px",
                            url: "{{ route('admin.site_infos.remove_image', ['site_info_id' => $siteSettings['site_img']->id, '_token' => csrf_token()]) }}",
                            key: {{ $siteSettings['site_img']->id }}
                        }
                    @endif
                ]
            });

            // for logos large light 
            $("#site_logo_large_light").fileinput({
                theme: "fa5",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if ($siteSettings['site_logo_large_light']->value != null)
                        "{{ asset('assets/site_settings/' . $siteSettings['site_logo_large_light']->value) }}",
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @if ($siteSettings['site_logo_large_light']->value != null)
                        {
                            caption: "{{ $siteSettings['site_logo_large_light']->value }}",
                            size: '1111',
                            width: "120px",
                            url: "{{ route('admin.site_infos.remove_site_logo_large_light', ['site_info_id' => $siteSettings['site_logo_large_light']->id, '_token' => csrf_token()]) }}",
                            key: {{ $siteSettings['site_logo_large_light']->id }}
                        }
                    @endif
                ]
            });



        });
    </script>
@endsection
