@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Tracking')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- FOR BREADCRUMBS --}}
        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}

        <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Website Pemetaan data Geografis</title>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
            crossorigin=""/>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    </head>
    <body>
        <div id="map" style="height: 98vh;"></div>
    </body>
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
    </html>

    </div>

@endsection

@section('footer-code')



@endsection
