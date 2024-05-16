<div class="mx-0 heading d-flex flex-column min-vh-100" style="">
    <div class="col py-3 row m-0 p-0 justify-content-end">
        <div class="col-md-6 col-sm-6 ps-4 ms-5 mx-auto">
            <div class="main">
                @php
                    $advertise = App\Models\AdsControl::where('type', '1st_advertise')->first();
                    $advertise1 = App\Models\AdsControl::where('type', '2nd_advertise')->first();
                @endphp
                @if ($advertise != null && $advertise->image != null)
                    <img src="{{ asset('storage/image/advertise/' . $advertise->image) }}" alt="advertize"
                        class="img-fluid w-100" />
                @else
                    <img src="{{ asset('storage/advertizement/5884032187034623364.png') }}" alt="advertize"
                        class="img-fluid w-100" />
                @endif
            </div>
        </div>
        <div class="col-5 float-end sm:d-none d-md-flex align-items-center">
            <div class="main">
                <!-- Actual search box -->
                <div class="form-group has-search">
                    @if ($advertise1 != null && $advertise1->image != null)
                        <img src="{{ asset('storage/image/advertise/' . $advertise1->image) }}" alt="advertize"
                            class="img-fluid w-100" />
                    @else
                        <img src="{{ asset('storage/advertizement/5884032187034623364.png') }}" alt="advertize"
                            class="img-fluid w-100" />
                    @endif
                </div>
            </div>
        </div>
    </div>
