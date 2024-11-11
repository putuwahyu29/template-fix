@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Master SHP')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- FOR BREADCRUMBS --}}
        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}
        <div class="card">
            <h2 class="card-header">Master SHP</h2>
            <div class="p-2">
                    <a class="btn btn-primary" href="{{route('admin.user.add')}}">
                        <span class="tf-icons bx bx-plus mx-30"></span>&nbsp;
                         Add
                    </a>
                </div>
            <div class="col-12 col-sm-8 col-md-10">
                <form action="{{ route('mastershp') }}" method="GET" class="d-flex align-items-center">
                    <div class="form-group me-2 my-1 mx-2">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Cari" value="{{ request('search') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
             </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>Kabupaten/Kota</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan/Desa</th>
                        <th>Telepon</th>
                        <th>Kategori Usaha</th>
                        <th>Kode KBLI</th>
                        <th>Komoditas Utama</th>
                        <th>Status</th>
                        <th>Catatan</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0"></tbody>
                    @foreach ($mastershp as $index => $data)
                    <tr>
                        <td>{{ $mastershp->firstItem() + $index }}</td>
                        <td>{{ $data->nama_perusahaan }}</td>
                        <td>{{ $data->alamat_perusahaan }}</td>
                        <td>{{ $data->datakabkot->kabkot_name ?? '-' }}</td>
                        <td>{{ $data->datakecamatan->kecamatan_name ?? '-'}}</td>
                        <td>{{ $data->datakeldes->keldes_name ?? '-' }}</td>
                        <td>{{ $data->no_telepon }}</td>
                        <td>{{ $data->KategoriLapanganUsaha->lapanganusaha_name ?? '-' }}</td>
                        <td>{{ $data->kategoriKBLI->kelompok_kbli ?? '-' }}</td>
                        <td>{{ $data->komoditas_utama }}</td>
                        <td>{{ $data->statuspendataan->status_pendataan ?? '-' }}</td>
                        <td>{{ $data->catatan }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="my-4 mx-3">
                  {{$mastershp -> withQueryString()-> links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>

       

    </div>

@endsection

@section('footer-code')



@endsection
