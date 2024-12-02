@extends('layouts.admin')
@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">

            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-edit"></i>
                    {{ __('panel.edit_existing_tag') }}
                </h3>
                <ul class="breadcrumb pt-3">
                    <li>
                        <a href="{{ route('admin.index') }}">{{ __('panel.main') }}</a>
                        @if (config('locales.languages')[app()->getLocale()]['rtl_support'] == 'rtl')
                            \
                        @else
                            /
                        @endif
                    </li>
                    <li class="ms-1">
                        <a href="{{ route('admin.tags.index') }}">
                            {{ __('panel.show_tags') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- body part  --}}
        <div class="card-body">

            {{-- erorrs show is exists --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.tags.update', $tag->id) }}" method="post">
                @csrf
                @method('PATCH')

                @foreach (config('locales.languages') as $key => $val)
                    <div class="row ">
                        <div class="col-sm-12 col-md-3 pt-3">
                            <label for="title[{{ $key }}]">
                                {{ __('panel.tag_name') }}
                                <span class="language-type">
                                    <i class="flag-icon flag-icon-{{ $key == 'ar' ? 'ye' : 'us' }} mt-1 "
                                        title="{{ app()->getLocale() == 'ar' ? 'ye' : 'us' }}"></i>
                                    {{ __('panel.' . $key) }}
                                </span>
                            </label>
                        </div>

                        <div class="col-sm-12 col-md-9 pt-3">
                            <input type="text" name="name[{{ $key }}]" id="name[{{ $key }}]"
                                value="{{ old('name.' . $key, $tag->getTranslation('name', $key)) }}" class="form-control">
                            @error('name.' . $key)
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                @endforeach

                <div class="row">
                    <div class="col-sm-12 pt-4">
                        <label for="section">{{ __('panel.tag_type') }}</label>
                        <select name="section" class="form-control">
                            <option value="1" {{ old('section', $tag->section) == '1' ? 'selected' : null }}>
                                {{ __('panel.course_tag') }}
                            </option>
                            <option value="2" {{ old('section', $tag->section) == '2' ? 'selected' : null }}>
                                {{ __('panel.event_tag') }}
                            </option>
                            <option value="3" {{ old('section', $tag->section) == '3' ? 'selected' : null }}>
                                {{ __('panel.post_tag') }}
                            </option>
                        </select>
                        @error('section')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group pt-3">
                            <button type="submit" name="submit" class="btn btn-primary">
                                {{ __('panel.update_data') }}
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection


@section('script')
    {{-- pickadate calling js --}}

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
