@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'SHPB')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- FOR BREADCRUMBS --}}
        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}

    <!-- Tambahkan di file Blade (contoh: resources/views/charts/piechart.blade.php) -->
    <h1>Monitoring SHPB</h1>
    <div class="row mb-5">
            <div class="col-md-8 col-lg-6 mb-3">
                <div class="card h-100">
    <p>Total Responden: {{ $totalResponden }}</p>
    <p>Total Responden Per Status: {{ $totalRespondenPerStatus }}</p>

    <div>
        <h3>Pie Chart Berdasarkan Status Pendataan</h3>
        <div class="my-3">
                <form action="{{ route('shpb') }}" method="GET" class="d-flex align-items-center">
                    <div class="form-group me-2 my-1">
                        <input type="text" name="kode_kabkot" id="kode_kabkot" class="form-control" placeholder="Kode Kabupaten/Kota" value="{{ request('kode_kabkot') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        <canvas id="statusChart"></canvas>
    </div>
    </div></div></div>

    <div class="row mb-5">
            <div class="col-md-8 col-lg-6 mb-3">
                <div class="card h-100">
    <div>
        <h3>Pie Chart Berdasarkan Kategori SHPB</h3>
        <div class="my-3">
                <form action="{{ route('shpb') }}" method="GET" class="d-flex align-items-center">
                    <div class="form-group me-2 my-1">
                        <input type="text" name="kode_kabkot" id="kode_kabkot" class="form-control" placeholder="Kode Kabupaten/Kota" value="{{ request('kode_kabkot') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        <canvas id="kategoriChart"></canvas>
    </div>
    </div></div></div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Pie Chart Berdasarkan Status Pendataan
        var ctx1 = document.getElementById('statusChart').getContext('2d');
        var statusChart = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: {!! json_encode($chartData['labels']) !!},
                datasets: [{
                    data: {!! json_encode($chartData['data']) !!},
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#8DD6E0']
                }]
            }
        });

        // Pie Chart Berdasarkan Kategori SHPB
        var ctx2 = document.getElementById('kategoriChart').getContext('2d');
        var kategoriChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: {!! json_encode($chartData2['labels2']) !!},
                datasets: [{
                    data: {!! json_encode($chartData2['data2']) !!},
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#8DD6E0']
                }]
            }
        });
    </script>



@endsection

@section('footer-code')



@endsection
