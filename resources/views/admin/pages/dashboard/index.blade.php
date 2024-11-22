@extends('admin.template-base')

@section('page-title', 'Dashboard')

@section('main-content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-2 order-0">
            <div class="card">
                <h3 class = "my-3 text-center">Survei Harga Produsen (SHP)</h3>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-12 col-lg-4 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                        <form action="{{ route('dashboard') }}" method="GET" class="d-flex align-items-center">
                            <div class="form-group mx-3 my-3">
                                <select name="kode_kabkot" id="kode_kabkot" class="form-control">
                                    <option value="">Semua Kabupaten/Kota</option>
                                    @foreach($datakabkot as $kabkot)
                                        <option value="{{ $kabkot->kode_kabkot }}" 
                                            {{ $req_kabkot && $req_kabkot->kode_kabkot == $kabkot->kode_kabkot ? 'selected' : '' }}>
                                            {{ $kabkot->kabkot_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
            </div>
            <div class="card my-2">
                <h5 class="mt-3 mx-3 text-center">Persentase Responden Berdasarkan Status Pendataan</h5>
                <canvas id="statusChart" width="100" height="20" class="mx-4 me-4 my-2"></canvas>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2 text-center">Progress Pendataan</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">8,258</h2>
                            <span>Total Orders</span>
                        </div>
                        <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bx-mobile-alt"></i></span>
                            </div>
                            <div
                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Electronic</h6>
                                    <small class="text-muted">Mobile, Earbuds, TV</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">82.5k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i
                                        class="bx bx-closet"></i></span>
                            </div>
                            <div
                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Fashion</h6>
                                    <small class="text-muted">T-shirt, Jeans, Shoes</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">23.8k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-info"><i
                                        class="bx bx-home-alt"></i></span>
                            </div>
                            <div
                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Decor</h6>
                                    <small class="text-muted">Fine Art, Dining</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">849k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-secondary"><i
                                        class="bx bx-football"></i></span>
                            </div>
                            <div
                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Sports</h6>
                                    <small class="text-muted">Football, Cricket Kit</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">99</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-8 order-3 order-md-2">
            <div class="row">
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body" style="height: 170px">
                            <span class="d-block mb-1 text-center">Jumlah Petugas {{ $req_kabkot ? $req_kabkot->kabkot_name : 'Semua Kabupaten/Kota' }}</span>
                            <h1 class="card-title text-nowrap mb-2 my-3 text-center">{{ $totalPetugasSHP }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body" style="height: 170px">
                            <span class="d-block mb-1 text-center">Jumlah Responden {{ $req_kabkot ? $req_kabkot->kabkot_name : 'Semua Kabupaten/Kota' }}</span>
                            <h1 class="card-title mb-2 my-3 text-center">{{ $totalRespondenPerStatus }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body" style="height: 170px">
                            <span class="d-block mb-1 text-center">Jumlah Selesai {{ $req_kabkot ? $req_kabkot->kabkot_name : 'Semua Kabupaten/Kota' }}</span>
                            <h1 class="card-title mb-2 my-3 text-center">{{$totalRespondenStatus12}}</h1>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="progress-container">
                                <p>Progress Pendataan</p>
                                <div class="progress-bar-wrapper">
                                    <div class="progress-bar" style="width: {{ $progress }}%;">
                                        <span class="progress-label">{{ $progress }}%</span>
                                    </div>
                                </div>
                                <div class="progress-indicators">
                                    <span>0%</span>
                                    <span>100%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="card h-100 text-center">
                        <h4 class="mt-3">Rasio Jumlah Responden dengan Jumlah Petugas</h4>
                        <canvas id="rasioChart" width="100" height="70" class="mx-4 me-4"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Order Statistics -->
        <div class="col-lg-4 ">
        </div>
        <!--/ Order Statistics -->
    </div>
</div>

<!--/ JS Charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        // Pie Chart Berdasarkan Status Pendataan
        var ctx1 = document.getElementById('statusChart').getContext('2d');
        var statusChart = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: {!! json_encode($chartData['labels']) !!},
                datasets: [{
                    data: {!! json_encode($chartData['data']) !!},
                    backgroundColor: ['#AED59D','#FF7676', '#F7C98F', '#E2DAD6']
                }]
            },
            options: {
            plugins: {
                legend: {
                    display: false // Menghilangkan legenda di luar
                },
                datalabels: {
                    color: ['#576B80','#576B80', '#576B80', '#576B80'],
                    formatter: (value, context) => {
                        // Menghitung total data
                        let total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                        // Menghitung persentase
                        let percentage = ((value / total) * 100).toFixed(0);
                        return `${percentage}% ${context.chart.data.labels[context.dataIndex]}`; // Menampilkan label dan persentase
                    },
                    font: {
                        weight: 'bold',
                        size: 12
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });
    
    // Data dari server
    const chartData2 = @json($chartData2);

    // Pisahkan nama kabupaten/kota dan rasio
    const labels = chartData2.map(item => item.kabkot_name);
    const data = chartData2.map(item => item.rasio);

    // Data untuk Chart.js
    const chartConfig = {
        type: 'bar',
        data: {
            labels: labels, // Nama kabupaten/kota
            datasets: [{
                label: 'Rasio Responden terhadap Petugas',
                data: data, // Data rasio
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
            }],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                },
                tooltip: {
                    enabled: true,
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    };

    // Render chart
    const ctx = document.getElementById('ratioChart').getContext('2d');
    new Chart(ctx, chartConfig);

    </script>
@endsection
