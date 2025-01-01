@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-folder"></i>
                    {{ __('panel.manage_blogs') }}
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
                        {{ __('panel.show_posts') }}
                    </li>
                </ul>
            </div>

            <div class="ml-auto">
                @ability('admin', 'create_posts')
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus-square"></i>
                        </span>
                        {{ __('panel.add_new_post') }}
                    </a>
                @endability
            </div>

        </div>

        <div class="card-body">
            {{-- filter form part  --}}
            @include('backend.posts.filter.filter')

            {{-- table part --}}
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th class="wd-5p border-bottom-0">#</th>
                            <th class="wd-40p border-bottom-0">{{ __('panel.title') }}</th>
                            <th class="wd-15p border-bottom-0 d-none d-sm-table-cell ">{{ __('panel.author') }}</th>
                            <th class="wd-15p border-bottom-0 d-none d-sm-table-cell ">{{ __('panel.status') }}</th>
                            <th class="wd-15p border-bottom-0 d-none d-sm-table-cell ">{{ __('panel.published_on') }}</th>
                            <th class="text-center border-bottom-0" style="width:30px;">{{ __('panel.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($posts as $post)
                            <tr>
                                <td class="text-center"><input type="checkbox" name="checkfilter"
                                        value="{{ $post->id }}">
                                </td>
                                <td>
                                    {{ Str::limit($post->title, 50) }}
                                </td>

                                <td class="d-none d-sm-table-cell">
                                    {{ $post->created_by }}
                                </td>

                                <td class="d-none d-sm-table-cell">
                                    @if ($post->status == 1)
                                        <a href="javascript:void(0);" class="updatePostStatus "
                                            id="post-{{ $post->id }}" post_id="{{ $post->id }}">
                                            <i class="fas fa-toggle-on fa-lg text-success" aria-hidden="true"
                                                status="Active" style="font-size: 1.6em"></i>
                                        </a>
                                    @else
                                        <a href="javascript:void(0);" class="updatePostStatus"
                                            id="post-{{ $post->id }}" post_id="{{ $post->id }}">
                                            <i class="fas fa-toggle-off fa-lg text-warning" aria-hidden="true"
                                                status="Inactive" style="font-size: 1.6em"></i>
                                        </a>
                                    @endif
                                </td>

                                <td class="d-none d-sm-table-cell">
                                    {{ \Carbon\Carbon::parse($post->published_on)->diffForHumans() }}

                                </td>

                                <td>
                                    {{-- <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="javascript:void(0);" class="btn btn-success copyButton"
                                            data-copy-text="https://ibbuniv.era-t.com/blog-single/{{ $post->slug }}"
                                            title="Copy the link">
                                            <i class="far fa-copy"></i>
                                        </a>
                                        <span class="copyMessage" style="display:none;">{{ __('panel.copied') }}</span>

                                        <a href="javascript:void(0);"
                                            onclick=" if( confirm('{{ __('panel.confirm_delete_message') }}') ){document.getElementById('delete-post-{{ $post->id }}').submit();}else{return false;}"
                                            class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post"
                                        class="d-none" id="delete-post-{{ $post->id }}">
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
                                                    href="{{ route('admin.posts.edit', $post->id) }}">
                                                    <i data-feather="edit-2" class="icon-sm me-2"></i>
                                                    <span class="">{{ __('panel.operation_edit') }}</span>
                                                </a>

                                                <a href="javascript:void(0);"
                                                    onclick="confirmDelete('delete-post-{{ $post->id }}', '{{ __('panel.confirm_delete_message') }}', '{{ __('panel.yes_delete') }}', '{{ __('panel.cancel') }}')"
                                                    class="dropdown-item d-flex align-items-center">
                                                    <i data-feather="trash" class="icon-sm me-2"></i>
                                                    <span class="">{{ __('panel.operation_delete') }}</span>
                                                </a>
                                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post"
                                                    class="d-none" id="delete-post-{{ $post->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <a href="javascript:void(0);"
                                                    class="dropdown-item d-flex align-items-center btn btn-success copyButton"
                                                    {{-- data-copy-text="https://ibbuniv.era-t.com/blog-single/{{ $post->slug }}" --}}
                                                    data-copy-text="{{ config('app.url') }}/blog-single/{{ $post->slug }}"
                                                    data-id="{{ $post->id }}" title="Copy the link">
                                                    <i data-feather="copy" class="icon-sm me-2"></i>
                                                    <span class="">{{ __('panel.operation_copy_link') }}</span>
                                                </a>

                                            </div>
                                            <span class="copyMessage" data-id="{{ $post->id }}" style="display:none;">
                                                {{ __('panel.copied') }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">{{ __('panel.no_found_item') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <div class="float-right">
                                    {!! $posts->appends(request()->all())->links() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('script')
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
