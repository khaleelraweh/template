@extends('layouts.admin')

@section('content')
    <div class="card shadow mb-4">

        {{-- breadcrumb part --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-folder"></i>
                    {{ __('panel.manage_page_categories') }}
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
                        {{ __('panel.show_page_categories') }}
                    </li>
                </ul>
            </div>
            <div class="ml-auto">
                @ability('admin', 'create_page_categories')
                    <a href="{{ route('admin.page_categories.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50 d-none d-sm-inline-block">
                            <i class="fa fa-plus-square">

                            </i>
                        </span>
                        <span class="text">{{ __('panel.add_new_content') }}</span>
                    </a>
                @endability
            </div>
        </div>

        @include('backend.page_categories.filter.filter')

        <div class="card-body">

            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th class="wd-5p border-bottom-0">#</th>
                        <th class="wd-40p border-bottom-0">{{ __('panel.title') }}</th>
                        <th class="wd-15p border-bottom-0 d-none d-sm-table-cell ">{{ __('panel.author') }}</th>
                        <th class="wd-15p border-bottom-0 d-none d-sm-table-cell ">{{ __('panel.status') }}</th>
                        <th class="wd-15p border-bottom-0 d-none d-sm-table-cell ">{{ __('panel.created_at') }}</th>
                        <th class="text-center border-bottom-0" style="width:30px;">{{ __('panel.actions') }}</th>
                    </tr>
                </thead>


                <tbody>
                    @forelse ($page_categories as $page_category)
                        <tr>
                            <td class="text-center"><input type="checkbox" name="checkfilter"
                                    value="{{ $page_category->id }}">
                            </td>
                            <td>
                                {{ $page_category->title }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ $page_category->created_by }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="btn btn-round rounded-pill btn-success btn-xs ">
                                    {{ $page_category->status() }}
                                </span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ $page_category->created_at->format('Y/m/d') }}
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">


                                    @if ($page_category->pages->count() > 0)
                                        <div class="dropdown mb-2 ">
                                            <a type="button" class="d-flex" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg text-muted pb-3px" data-feather="more-vertical"></i>
                                                خيارات
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    viewBox="0 0 25 15" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-down link-arrow">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item d-flex align-items-center"
                                                    href="{{ route('admin.page_categories.edit', $page_category->id) }}"><i
                                                        data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                        class="">Edit</span></a>
                                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"
                                                    onclick="showPageCagegoryAlert()"><i data-feather="trash"
                                                        class="icon-sm me-2"></i> <span class="">Delete</span></a>

                                                <a href="javascript:void(0);"
                                                    class="dropdown-item d-flex align-items-center btn btn-success copyButton"
                                                    data-copy-text="https://ibbuniv.era-t.com/page_categories/{{ $page_category->slug }}"
                                                    title="Copy the link">
                                                    <i data-feather="copy" class="icon-sm me-2"></i>
                                                    <span class="">Copy</span>
                                                </a>
                                                <span class="copyMessage"
                                                    style="display:none;">{{ __('panel.copied') }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <a href="javascript:void(0);" onclick="confirmDelete({{ $page_category->id }})"
                                            class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form action="{{ route('admin.page_categories.destroy', $page_category->id) }}"
                                            method="post" class="d-none"
                                            id="delete-page-category-{{ $page_category->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">{{ __('panel.no_found_item') }}</td>
                        </tr>
                    @endforelse




                </tbody>
            </table>
        </div>

    </div>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function showPageCagegoryAlert() {
            Swal.fire({
                icon: 'warning',
                title: '{{ __('panel.page_category_can_not_be_deleted') }}',
                text: '{{ __('panel.page_category_have_pages_you_must_delete_pages_before') }}',
                confirmButtonText: '{{ __('panel.ok') }}',
            });
        }



        function confirmDelete($page_category_id) {
            Swal.fire({
                title: '{{ __('panel.confirm_delete_message') }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '{{ __('panel.yes_delete') }}',
                cancelButtonText: '{{ __('panel.cancel') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-page-category-' + $page_category_id).submit();
                }
            });
        }
    </script>

    <style>
        .copyButton {
            position: relative;
        }

        .copyMessage {
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            display: none;
            z-index: 1000;
            font-size: 12px;
            width: auto;
            /* Ensure width fits content */
            white-space: nowrap;
            /* Prevents line break to ensure width fits content */
        }
    </style>

    <script>
        document.querySelectorAll(".copyButton").forEach(function(button) {
            button.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent form submission
                var textToCopy = button.getAttribute("data-copy-text"); // Get the dynamic text
                var tempInput = document.createElement("input");
                tempInput.value = textToCopy;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand("copy");
                document.body.removeChild(tempInput);

                var copyMessage = button.nextElementSibling; // Get the copyMessage span
                copyMessage.style.display = "inline";
                setTimeout(function() {
                    copyMessage.style.display = "none";
                }, 2000); // Hide the message after 2 seconds
            });
        });
    </script>
@endsection
