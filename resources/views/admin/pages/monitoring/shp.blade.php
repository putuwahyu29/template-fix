@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'shp')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- FOR BREADCRUMBS --}}
        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}
        {{-- Canvas untuk Chart --}}
        <div class="col-12 col-sm-8 col-md-12">
            <div class="card h-100">
                <h2 class="card-header">Monitoring SHP</h2>
            </div>
        </div> 
        <div class="col-12 col-sm-8 col-md-12">
            <div class="my-3">
                <form action="{{ route('shp') }}" method="GET" class="d-flex align-items-center">
                    <div class="form-group me-2 my-1">
                        <input type="text" name="kode_kabkot" id="kode_kabkot" class="form-control" placeholder="Kabupaten/Kota" value="{{ request('kode_kabkot') }}">
                    </div>
                    <div class="form-group me-2 my-1">
                       <input type="text" name="status" id="status" class="form-control" placeholder="Status" value="{{ request('status') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div> 
        <div class="col-md-6">
                <div class="card mb-4 my-2">
                    <h6 class="card-header">Jumlah Berdasarkan Status Keberhasilan</h6>
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>
        </div>
@endsection

@section('footer-code')
{{-- Tambahkan Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
        // Data chart dari PHP ke JavaScript
        const chartData = @json($result);

        // Proses data untuk Chart.js
        const labels = chartData.map(item => item.status);
        const totals = chartData.map(item => item.total);

        // Inisialisasi chart
        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah',
                    data: totals,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection