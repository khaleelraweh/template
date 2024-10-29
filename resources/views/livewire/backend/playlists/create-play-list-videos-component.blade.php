<div>
    {{-- Intended Learnerss --}}
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-start">
            <div>
                <h6>{{ __('panel.playlist_video_tip') }}</h6>

                <!-- Display validation errors -->
                @if ($errors->has('intendeds'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->get('intendeds') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div>
                @if ($intendedsValid || ($formSubmitted && !$errors->any()))
                    <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                @endif
            </div>
        </div>

        <div class="card-body">

            <table class="table" id="products_table">
                <tbody>
                    @foreach ($intendeds as $index => $intended)
                        <tr>
                            <td>
                                <div class="input-group">
                                    <input type="text" name="intendeds[{{ $index }}][title]"
                                        class="form-control" wire:model="intendeds.{{ $index }}.title"
                                        placeholder="{{ __('panel.playlist_video_add_your_video_link_here') }}" />
                                    <span class="input-group-text">{{ 160 - strlen($intendeds[$index]['title']) }}
                                    </span>
                                </div>


                                <!-- Display validation error for current intended -->
                                @error('intendeds.' . $index . '.title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </td>
                            <td>
                                <a href="#"
                                    wire:click.prevent="removeVideoLink({{ $index }})">{{ __('panel.delete') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-secondary" wire:click.prevent="addVideoLink">
                        + {{ __('panel.playlist_video_add_new_video_link') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
