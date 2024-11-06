@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Sampel 2024')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- FOR BREADCRUMBS --}}
        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}
        <div class="card">
            <h2 class="card-header">Tabel Sampel 2024</h2>
            <div class="col-12 col-sm-8 col-md-10">
                <form action="{{ route('sampel2024') }}" method="GET" class="d-flex align-items-center">
                    <div class="form-group me-2 my-1 mx-2">
                        <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" placeholder="Nama Petugas" value="{{ request('nama_petugas') }}">
                    </div>
                    <div class="form-group me-2 my-1">
                        <input type="text" name="survei" id="survei" class="form-control" placeholder="Survei" value="{{ request('survei') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
             </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>Nama Survei</th>
                        <th>Nama Responden</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0"></tbody>
                    @foreach ($sampel2024 as $index => $data)
                    <tr>
                        <td>{{ $sampel2024->firstItem() + $index }}</td>
                        <td>{{ $data->nama_petugas }}</td>
                        <td>{{ $data->nama_user }}</td>
                        <td>{{ $data->nama_survei }}</td>
                        <td>{{ $data->nama_responden }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="my-4 mx-3">
                  {{$sampel2024 -> withQueryString()-> links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>



    </div>

@endsection

@section('footer-code')



@endsection
