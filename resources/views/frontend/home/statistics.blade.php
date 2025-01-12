<div class=" main-home event-bg rs-statistics pt-80 pb-80 md-pt-70 md-pb-70 bg12">
    <div class="overlay"></div>
    {{-- <div class=" main-home event-bg rs-statistics pt-100 pb-100 md-pt-70 md-pb-70 bg2"> --}}
    <div class="rs-counter style2-about">
        <div class="container">
            <div class="row couter-area">
                @foreach ($statistics as $statistic)
                <div
                    class="col-lg-3 col-md-6 {{ $loop->last ? '' : 'md-mb-30' }}  {{ !$loop->last && count($statistics) > 4 ? 'lg-mb-70' : ' ' }} ">
                    <div class="counter-item text-center">
                        <div class="statistic-image">
                            {{-- <img class="image" src="{{ asset('frontend/images/icons/Vector.png') }}" alt=""> --}}
                            @php
                            if ($statistic->statistic_image != null) {
                            $statistic_img = asset('assets/statistics/' . $statistic->statistic_image);
                            if (
                            !file_exists(
                            public_path('assets/statistics/' . $statistic->statistic_image),
                            )
                            ) {
                            $statistic_img = asset('frontend/images/icons/Vector.png');
                            }
                            } else {
                            $statistic_img = asset('frontend/images/icons/Vector.png');
                            }
                            @endphp
                            <img src="{{ $statistic_img }}" alt="" class="image">
                        </div>
                        <div class="statistic-content text-center">
                            <h2 class="rs-count">{{ $statistic->statistic_number }}</h2>
                            <h4 class="title mb-0 ">{{ $statistic->title }}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>