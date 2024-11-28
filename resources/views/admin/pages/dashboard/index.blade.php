@extends('admin.template-base')

@section('page-title', 'Dashboard')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@section('main-content')

<div class="container-xxl flex-grow-1 container-p-y">
                        <form action="{{ route('dashboard') }}" method="GET" class="d-flex align-items-center">
                            <div class="form-group mx-2 my-3">
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
    <div class="row">
        <div class="col-lg-12 mb-2 order-0">
            <div class="card">
                <h3 class = "my-3 text-center">Survei Harga Produsen (SHP)</h3>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-12 col-lg-4 order-2 order-md-3 order-lg-2">
            <div class="card">
                <h5 class="mt-3 mx-3 text-center">Persentase Responden Berdasarkan Status Pendataan</h5>
                <canvas id="statusChart" width="100" height="25" class="mx-4 me-4 my-3"></canvas>
            </div>
            <div class="card my-4">
                        <div class="card-body"style="height: 180px">
                            <span class="d-block mb-1 text-center">Rasio Jumlah Responden dengan Jumlah Petugas {{ $req_kabkot ? $req_kabkot->kabkot_name : 'Semua Kabupaten/Kota di Jawa Timur' }}</span>
                            <h1 class="card-title mt-2 mb-2 text-center">{{ number_format($totalRespondenPerStatus / $totalPetugasSHP, 2) }}</h1>
                        </div>
            </div>
        </div>
        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-8 order-3 order-md-2">
            <div class="row">
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body" style="height: 170px">
                            <span class="d-block mb-1 text-center">Jumlah Petugas {{ $req_kabkot ? $req_kabkot->kabkot_name : 'Semua Kabupaten/Kota di Jawa Timur' }}</span>
                            <h1 class="card-title text-nowrap mb-2 my-2 text-center">{{ $totalPetugasSHP }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body" style="height: 170px">
                            <span class="d-block mb-1 text-center">Jumlah Responden {{ $req_kabkot ? $req_kabkot->kabkot_name : 'Semua Kabupaten/Kota di Jawa Timur' }}</span>
                            <h1 class="card-title mb-2 my-3 text-center">{{ $totalRespondenPerStatus }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body" style="height: 170px">
                            <span class="d-block mb-1 text-center">Jumlah Selesai {{ $req_kabkot ? $req_kabkot->kabkot_name : 'Semua Kabupaten/Kota di Jawa Timur' }}</span>
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
                    <div class="row g-1">
                        <h4 class="mt-3">Pencapaian Target Pendataan</h4>
                        <div class="col-8">
                            <canvas id="targetChart" width="100" height="50" class="mx-2"></canvas>
                        </div>
                        <div class="col-4">
                            <form action="{{ route('dashboard') }}" method="GET" class="d-flex align-items-center my-5">
                                <div class="form-group mx-2 my-1">
                                    <input type="text" id="date_range" name="date_range" class="form-control" placeholder="Rentang Pendataan" value="{{ request('date_range') }}" style="background-color: rgba(0, 0, 0, 0);">
                                </div>
                                <button type="submit" class="btn btn-primary me-3">Search</button>
                            </form>
                        </div>
                    </div>
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation"></script>

    <script>
        // Pie Chart Berdasarkan Status Pendataan SHP
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


    // Bar Chart Berdasarkan Kategori SHPB
    const ctx2 = document.getElementById('targetChart').getContext('2d');
    const progress = @json($progress); // Pastikan variabel progress dari PHP tersedia di JavaScript
    const target = @json($target); // Target progress berdasarkan tanggal

    const chart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Progress'], // Label untuk bar
            datasets: [{
                label: 'Persentase Progress',
                data: [progress], // Data dari controller
                backgroundColor: 'rgba(75, 192, 192, 0.6)', // Warna bar
                borderColor: 'rgba(75, 192, 192, 1)', // Warna border
                borderWidth: 1,
            }]
        },
        options: {
            plugins: {
                annotation: {
                    annotations: {
                        horizontalLine: {
                            type: 'line',
                            yMin: 30, // Garis di y=50
                            yMax: 30, // Tetap di y=50
                            borderColor: 'blue', // Warna garis
                            borderWidth: 2, // Ketebalan garis
                            label: {
                                enabled: true,
                                content: 'Target 50%', // Label garis
                                position: 'center', // Posisi label di tengah
                                backgroundColor: 'rgba(0, 255, 0, 0.2)', // Warna latar label
                                color: 'red', // Warna teks label
                            }
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100 // Skala maksimal tetap 100
                }
            }
        }
    });
    
    flatpickr("#date_range", {
            mode: "range",
            dateFormat: "Y-m-d",
            locale: "id" // Mengatur locale Indonesia
        });

    </script>
@endsection
