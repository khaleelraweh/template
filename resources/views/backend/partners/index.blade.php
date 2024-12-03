@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-folder"></i>
                    {{ __('panel.manage_partners') }}
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
                        {{ __('panel.show_partners') }}
                    </li>
                </ul>
            </div>

            <div class="ml-auto">
                @ability('admin', 'create_partners')
                    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus-square"></i>
                        </span>
                        <span class="text">{{ __('panel.add_new_partner') }}</< /span>
                    </a>
                @endability
            </div>

        </div>

        <div class="card-body">
            {{-- filter form part  --}}
            @include('backend.partners.filter.filter')

            {{-- table part --}}
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>{{ __('panel.image') }}</th>
                            <th>{{ __('panel.name') }}</th>
                            <th class="d-none d-sm-table-cell">{{ __('panel.author') }}</th>
                            <th class="d-none d-sm-table-cell"> {{ __('panel.created_at') }} </th>
                            <th class="d-none d-sm-table-cell"> {{ __('panel.send_for_review') }} </th>
                            <th class="d-none d-sm-table-cell">{{ __('panel.status') }}</th>
                            <th class="text-center" style="width:30px;">{{ __('panel.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($partners as $partner)
                            <tr>

                                <td>
                                    @if ($partner->partner_image && file_exists(public_path('assets/partners/' . $partner->partner_image)))
                                        <img src="{{ asset('assets/partners/' . $partner->partner_image) }}" width="60"
                                            height="60" alt="{{ $partner->title }}">
                                    @else
                                        <img src="{{ asset('image/not_found/item_image_not_found.webp') }}" width="60"
                                            height="60" alt="{{ $partner->title }}">
                                    @endif
                                </td>
                                <td>{{ $partner->name }}</td>
                                <td class="d-none d-sm-table-cell">{{ $partner->created_by }}</td>
                                <td class="d-none d-sm-table-cell">{{ $partner->created_at }}</td>
                                <td class="d-none d-sm-table-cell">{{ $partner->send_for_review }}</td>
                                <td class="d-none d-sm-table-cell">{{ $partner->status() }}</td>
                                <td>
                                    {{-- <div class="btn-group btn-group-sm">
                                      

                                        <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>



                                        <a href="javascript:void(0);"
                                            onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-product-{{ $partner->id }}').submit();}else{return false;}"
                                            class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="post"
                                        class="d-none" id="delete-product-{{ $partner->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form> --}}

                                    <div class="btn-group btn-group-sm">
                                        <div class="dropdown mb-2 ">
                                            <a type="button" class="d-flex" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg text-muted pb-3px" data-feather="more-vertical"></i>
                                                {{ __('panel.operation_options') }}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    viewBox="0 0 25 15" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-down link-arrow">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ route('admin.partners.edit', $partner->id) }}">
                                                    <i data-feather="edit-2" class="icon-sm me-2"></i>
                                                    <span class="">{{ __('panel.operation_edit') }}</span>
                                                </a>

                                                <a href="javascript:void(0);"
                                                    onclick="confirmDelete('delete-partner-{{ $partner->id }}', '{{ __('panel.confirm_delete_message') }}', '{{ __('panel.yes_delete') }}', '{{ __('panel.cancel') }}')"
                                                    class="dropdown-item d-flex align-items-center">
                                                    <i data-feather="trash" class="icon-sm me-2"></i>
                                                    <span class="">{{ __('panel.operation_delete') }}</span>
                                                </a>
                                                <form action="{{ route('admin.partners.destroy', $partner->id) }}"
                                                    method="post" class="d-none" id="delete-partner-{{ $partner->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <a href="javascript:void(0);"
                                                    class="dropdown-item d-flex align-items-center btn btn-success copyButton"
                                                    data-copy-text="https://ibbuniv.era-t.com/partners/{{ $partner->slug }}"
                                                    data-id="{{ $partner->id }}" title="Copy the link">
                                                    <i data-feather="copy" class="icon-sm me-2"></i>
                                                    <span class="">{{ __('panel.operation_copy_link') }}</span>
                                                </a>

                                            </div>
                                            <span class="copyMessage" data-id="{{ $partner->id }}" style="display:none;">
                                                {{ __('panel.copied') }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No partner found</td>
                            </tr>
                        @endforelse
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="float-right">
                                    {!! $partners->appends(request()->all())->links() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
@endsection
