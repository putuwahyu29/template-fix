@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Tracking')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- FOR BREADCRUMBS --}}
        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}
        <div class="card">
            <h2 class="card-header">Tabel Tracking</h2>
            <div class="col-12 col-sm-8 col-md-10">
                <form action="{{ route('trackings') }}" method="GET" class="d-flex align-items-center">
                    <div class="form-group me-2 my-1 mx-3">
                        <input type="text" name="survei" id="survei" class="form-control" placeholder="Nama Survei" value="{{ request('survei') }}">
                    </div>
                    <div class="form-group me-2 my-1">
                        <input type="text" name="surveyor" id="surveyor" class="form-control" placeholder="Username Petugas" value="{{ request('surveyor') }}">
                    </div>
                    <div class="form-group me-2 my-1">
                    <input type="text" id="date_range" name="date_range" class="form-control" placeholder="Pilih tanggal" value="{{ request('date_range') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
             </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Nama Survei</th>
                        <th>Username Petugas</th>
                        <th>Nama Responden</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0"></tbody>
                    @foreach ($trackings as $index => $tracking)
                    <tr>
                        <td>{{ $trackings->firstItem() + $index }}</td> <!-- Nomor urut berkelanjutan -->
                        <td><span class="badge bg-label-primary me-1">{{ \Carbon\Carbon::parse($tracking->Waktu_Unique)->format('Y-m-d') }}</span></td> <!-- Tanggal -->
                        <td><span class="badge bg-label-primary me-1">{{ \Carbon\Carbon::parse($tracking->Waktu_Unique)->format('H:i:s') }}</span></td> <!-- Waktu -->
                        <td>{{ $tracking->Nama_Survei }}</td>
                        <td>{{ $tracking->Username_Surveyor }}</td>
                        <td>{{ $tracking->Nama_Responden }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="my-4 mx-3">
                  {{$trackings -> withQueryString()-> links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>


    </div>

    <script>
        flatpickr("#date_range", {
            mode: "range",
            dateFormat: "Y-m-d",
            locale: "id" // Mengatur locale Indonesia
        });
    </script>

@endsection

@section('footer-code')

@endsection