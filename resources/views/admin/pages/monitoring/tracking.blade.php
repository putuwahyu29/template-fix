@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Tracking')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- FOR BREADCRUMBS --}}
        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}

        <div class="col-12 col-sm-8 col-md-12">
        <div class="card h-100">
            <h2 class="card-header">Tracking Lokasi Petugas</h2>
        </div>        
        <div class="card h-100 my-3">
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
            crossorigin=""/>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    
    
        <div id="map" style="height: 98vh;"></div>
    
    <script>
        var map = L.map('map').setView([-7.27663366708389, 112.72469370950299], 12);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Pemetaan'
        }).addTo(map);

                    // Data dari database (contoh, pastikan data diambil dari controller)
                    var locations = @json($locations); // Ambil data dari controller

                    // Loop untuk menampilkan marker di setiap lokasi
                    locations.forEach(function(location) {
                        L.marker([location.latitude, location.longitude])
                            .addTo(map)
                            .bindPopup(
                                `<b>${location.Nama_Survei}</b><br>
                                <b>Username Petugas:</b> ${location.Username_Surveyor}<br>
                                <b>Responden:</b> ${location.Nama_Responden}<br>
                                <b>Timestamp:</b> ${location.Timestamp_Tracking}`
                            );
                    });

        //L.marker([-7.32876,112.72831]).addTo(map).bindPopup('BPS Sby');

    </script>
    </div>
                    <div class="card h-100 my-2">
                        <div class="card-body">
                            <h5 class="card-title mx-2">Cari</h5>
                            <form action="{{ route('tracking') }}" method="GET" class="d-flex align-items-center">
                                <div class="form-group me-2 my-1 mx-2">
                                    <input type="text" name="survei" id="survei" class="form-control" placeholder="Nama Survei" value="{{ request('survei') }}">
                                </div>
                                <div class="form-group me-2 my-1">
                                    <input type="text" name="surveyor" id="surveyor" class="form-control" placeholder="Username Petugas" value="{{ request('surveyor') }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>

    </div>

@endsection

@section('footer-code')



@endsection
