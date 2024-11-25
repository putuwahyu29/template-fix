@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Tracking')

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- FOR BREADCRUMBS --}}
    @include('admin.components.breadcrumb.simple', $breadcrumbs)

    {{-- MAIN PARTS --}}
    <div class="col-12 col-sm-8 col-md-12">
        <div class="card h-100">
            <h2 class="card-header">Tracking Lokasi Petugas</h2>
        </div>

        {{-- Form Pencarian --}}
        <div class="card h-100 my-2">
            <div class="card-body">
                <h5 class="card-title mx-2">Cari</h5>
                <form action="{{ route('tracking') }}" method="GET" class="d-flex align-items-center">
                    <div class="form-group me-2 my-1 mx-2">
                    <select name="kode_kegiatan" id="kode_kegiatan" class="form-control">
                    <option value="">Pilih Kegiatan</option>
                            @foreach($masterkegiatan as $kegiatan)
                                <option value="{{ $kegiatan->kode_kegiatan }}" 
                                    {{ request('kode_kegiatan', $kode_kegiatan) == $kegiatan->kode_kegiatan ? 'selected' : '' }}>
                                    {{ $kegiatan->kegiatan_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group me-2 my-1 mx-2">
                        <select name="kode_kabkot" id="kode_kabkot" class="form-control">
                            <option value="">Pilih Kabupaten/Kota</option>
                            @foreach($datakabkot as $kabkot)
                                <option value="{{ $kabkot->kode_kabkot }}" 
                                    {{ old('kode_kabkot', $kode_kabkot) == $kabkot->kode_kabkot ? 'selected' : '' }}>
                                    {{ $kabkot->kabkot_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group me-2 my-1 mx-2">
                    <select name="kode_petugas" id="kode_petugas" class="form-control">
                            <option value="">Pilih Petugas</option>
                            @foreach($profilpetugas as $petugas)
                                <option value="{{ $petugas->kode_petugas }}" 
                                    {{ old('kode_petugas', $kode_petugas) == $petugas->kode_petugas ? 'selected' : '' }}>
                                    {{ $petugas->Nama_Petugas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <!-- Tambahkan Script AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#kode_kabkot').change(function() {
            var kode_kabkot = $(this).val();  // Ambil kode kabkot yang dipilih
            if(kode_kabkot) {
                // Lakukan request AJAX ke route untuk mengambil data petugas yang sesuai
                $.ajax({
                    url: "{{ route('tracking.filterPetugas') }}", // URL untuk AJAX
                    method: "GET",
                    data: { kode_kabkot: kode_kabkot },
                    success: function(response) {
                        // Kosongkan dropdown kode_petugas dan tambahkan option baru
                        $('#kode_petugas').empty();
                        $('#kode_petugas').append('<option value="">Pilih Petugas</option>');
                        
                        // Loop dan tambahkan setiap petugas ke dalam dropdown
                        $.each(response, function(key, petugas) {
                            $('#kode_petugas').append('<option value="'+ petugas.kode_petugas +'">'+ petugas.Nama_Petugas +'</option>');
                        });
                    }
                });
            } else {
                // Jika kode_kabkot tidak dipilih, reset dropdown kode_petugas
                $('#kode_petugas').empty();
                $('#kode_petugas').append('<option value="">Pilih Petugas</option>');
            }
        });
    });
</script>

        {{-- Map --}}
        <div class="card h-100 my-3">
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
                integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

            {{-- Map Container --}}
            <div id="map" class="col-md-6 col-lg-12 mb-3" style="height: 98vh;"></div>

            {{-- Map Script --}}
            <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi peta
    var map = L.map('map').setView([-7.2575, 112.7521], 12);

    // Menambahkan tile layer OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Data lokasi dari server
    var locations = @json($locations);

    locations.forEach(function(location) {
        var latStart = parseFloat(location.latitude_start);
        var lngStart = parseFloat(location.longitude_start);
        var latStop = parseFloat(location.latitude_stop);
        var lngStop = parseFloat(location.longitude_stop);

        // Menambahkan marker untuk titik awal
        L.marker([latStart, lngStart]).addTo(map)
            .bindPopup(`
                <b>Start Point</b><br>
                Nama Responden: ${location.Nama_Petugas || 'Tidak ditemukan'}<br>
                Status: ${location.status_pendataan || 'Tidak ditemukan'}<br>
                Latitude: ${latStart}<br>
                Longitude: ${lngStart}
            `);

        // Menambahkan marker untuk titik akhir
        L.marker([latStop, lngStop]).addTo(map)
            .bindPopup(`
                <b>Stop Point</b><br>
                Nama Responden: ${location.Nama_Petugas || 'Tidak ditemukan'}<br>
                Status: ${location.status_pendataan || 'Tidak ditemukan'}<br>
                Latitude: ${latStop}<br>
                Longitude: ${lngStop}
            `);

        // Menambahkan garis lintasan (polyline)
        var latlngs = [[latStart, lngStart], [latStop, lngStop]];
        var polyline = L.polyline(latlngs, { color: 'blue' }).addTo(map);

        // Menyesuaikan peta agar mencakup semua marker
        map.fitBounds(polyline.getBounds());
    });
});

            </script>
        </div>
    </div>
</div>
@endsection
