@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'UI Sample Blank')

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
                    <div class="form-group me-2 my-1 mx-2">
                        <input type="text" name="survei" id="survei" class="form-control" placeholder="Nama Survei" value="{{ request('survei') }}">
                    </div>
                    <div class="form-group me-2 my-1">
                        <input type="text" name="surveyor" id="surveyor" class="form-control" placeholder="Username Petugas" value="{{ request('surveyor') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
             </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>Nama Survei</th>
                        <th>Username Petugas</th>
                        <th>Nama Responden</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0"></tbody>
                    @foreach ($trackings as $tracking)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><span class="badge bg-label-primary me-1">{{ $tracking->Waktu_Unique }}</span></td>
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

@endsection

@section('footer-code')



@endsection
