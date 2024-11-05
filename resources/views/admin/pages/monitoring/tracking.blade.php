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
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
            crossorigin=""/>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    
    
        <div id="map" style="height: 98vh;"></div>
    
    <script>
        var map = L.map('map').setView([-1.5, 123], 5);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Pemetaan'
        }).addTo(map);

        L.marker([-2, 120])
            .bindPopup('Testing Marker 1')
            .addTo(map);

        L.marker([-3, 125])
            .bindPopup('Testing Marker 2')
            .addTo(map);

        L.marker([-2, 125])
            .bindPopup('Testing Marker 3')
            .addTo(map);
    </script>
                    <div class="card-body">
                        <h5 class="card-title">Cari Petugas</h5>
                        <form action="{{ route('trackings') }}" method="GET" class="d-flex align-items-center">
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

@section('footer-code')



@endsection
