@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Pengawasan')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

    
        {{-- FOR BREADCRUMBS --}}

        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}
        <div class="card">
            <h2 class="card-header">Pengawasan</h2>
            <div class="col-12 col-sm-8 col-md-10">
                <form action="{{ route('pengawasans') }}" method="GET" class="d-flex align-items-center">
                    <div class="form-group me-2 my-1 mx-2">
                        <input type="text" name="nama_pengawas" id="nama_pengawas" class="form-control" placeholder="Pengawas" value="{{ request('nama_pengawas') }}">
                    </div>
                    <div class="form-group me-2 my-1">
                        <input type="text" name="petugas" id="petugas" class="form-control" placeholder="Petugas" value="{{ request('petugas') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
             </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengawas</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Alamat</th>
                        <th>Petugas</th>
                        <th>Catatan</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0"></tbody>
                    @foreach ($pengawasan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->Nama_Pengawas }}</td>
                        <td>{{ $data->Tanggal }}</td>
                        <td><span class="badge bg-label-primary me-1">{{ $data->Jam_Mulai }}</span></td>
                        <td><span class="badge bg-label-primary me-1">{{ $data->Jam_Selesai }}</span></td>
                        <td>{{ $data->Alamat }}</td>
                        <td>{{ $data->Petugas }}</td>
                        <td>{{ $data->Catatan }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="my-4 mx-3">
                  {{$pengawasan -> withQueryString()-> links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>


    </div>
    
@endsection

@section('footer-code')



@endsection
