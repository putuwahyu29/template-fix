@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'shp')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- FOR BREADCRUMBS --}}
        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}
        {{-- Canvas untuk Chart --}}
        <div class="row mb-5">
            <div class="col-md-8 col-lg-6 mb-3">
                <div class="card h-100">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

                
    <h6 class="card-header">Jumlah Berdasarkan Status Keberhasilan</h6>         
          
    <div class="row">
            <div class="col-md-6 mx-3">
                <h3>Total Responden: {{ $totalResponden }}</h3></div>
        </div>

        <div class="row">
            <div class="col-md-6 mx-3">
                <h3>Total Responden: {{ $totalRespondenPerStatus }}</h3></div>
        </div>

    <div class="col-12 col-sm-8 col-md-12">
            <div class="my-3">
                <form action="{{ route('shp') }}" method="GET" class="d-flex align-items-center">
                    <div class="form-group me-2 my-1">
                        <input type="text" name="kode_kabkot" id="kode_kabkot" class="form-control" placeholder="Kode Kabupaten/Kota" value="{{ request('kode_kabkot') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div> 

    <div style="width: 50%; margin: auto;">
        <canvas id="pieChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($chartData['labels']) !!},
                datasets: [{
                    data: {!! json_encode($chartData['data']) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>
    <br>
</body>
</html>

</div></div></div>
    </div>

@endsection

@section('footer-code')

@endsection