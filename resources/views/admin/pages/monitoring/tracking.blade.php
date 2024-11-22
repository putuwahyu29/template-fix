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

            {{-- Map Container --}}
            <div id="map" style="height: 98vh;"></div>

            {{-- Map Script --}}
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Inisialisasi peta
                    var map = L.map('map').setView([-7.2756, 112.6426], 10); // Default lokasi (Surabaya)

                    // Tambahkan tile layer OpenStreetMap
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    // Data track diambil dari Laravel
                    var locations = @json($locations);

                    // Iterasi semua data lokasi dan tampilkan di peta
                    locations.forEach(function(location) {
                        // Koordinat latitude dan longitude
                        var lat = parseFloat(location.latitude);
                        var lng = parseFloat(location.longitude);

                    // Tambahkan marker di lokasi
                    L.marker([lat, lng]).addTo(map)
                        .bindPopup(`
                            <b>Track</b><br>
                            Nama Survei: ${location.Nama_Survei}<br>
                            Username Surveyor: ${location.Username_Surveyor}<br>
                            Latitude: ${lat}<br>
                            Longitude: ${lng}
                        `);
                    });

                    // // Iterasi data track dan gambar setiap lintasan
                    // locations.forEach(function(location) {
                    //     if (location.latitude_start && location.longitude_start && location.latitude_stop && location.longitude_stop) {
                    //         var pathCoordinates = [
                    //             [parseFloat(location.latitude_start), parseFloat(location.longitude_start)], // Titik awal
                    //             [parseFloat(location.latitude_stop), parseFloat(location.longitude_stop)]   // Titik akhir
                    //         ];

                    //         // Gambar polyline (garis lintasan)
                    //         var polyline = L.polyline(pathCoordinates, {
                    //             color: 'red', // Warna lintasan
                    //             weight: 2,    // Ketebalan garis
                    //             opacity: 1.0  // Transparansi
                    //         }).addTo(map);

                    //         // Tambahkan marker di titik awal
                    //         L.marker(pathCoordinates[0]).addTo(map)
                    //             .bindPopup(`
                    //                 <b>Surveyor:</b> ${location.Username_Surveyor}<br>
                    //                 <b>Nama Survei:</b> ${location.Nama_Survei}<br>
                    //                 <b>Start Point</b>
                    //             `)
                    //             .openPopup();

                    //         // Tambahkan marker di titik akhir
                    //         L.marker(pathCoordinates[1]).addTo(map)
                    //             .bindPopup(`
                    //                 <b>Surveyor:</b> ${location.Username_Surveyor}<br>
                    //                 <b>Nama Survei:</b> ${location.Nama_Survei}<br>
                    //                 <b>End Point</b>
                    //             `);
                    //     }
                    // });

                    // // Fit map agar mencakup semua lintasan
                    // if (locations.length > 0) {
                    //     var bounds = locations.flatMap(function(location) {
                    //         return [
                    //             [parseFloat(location.latitude_start), parseFloat(location.longitude_start)],
                    //             [parseFloat(location.latitude_stop), parseFloat(location.longitude_stop)]
                    //         ];
                    //     });
                    //     map.fitBounds(bounds);
                    // }
                });
            </script>
        </div>

        {{-- Form Pencarian --}}
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
</div>
@endsection

