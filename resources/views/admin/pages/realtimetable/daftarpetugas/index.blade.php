@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Daftar Petugas')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- FOR BREADCRUMBS --}}
        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}
        <div class="card">
            <h2 class="card-header">Daftar Petugas</h2>
            
            <div class="col-12 col-sm-8 col-md-10">
                <form action="{{ route('daftarpetugas') }}" method="GET" class="d-flex align-items-center">
                    <div class="form-group me-2 my-1 mx-2">
                    <input type="text" name="petugas" id="petugas" class="form-control" placeholder="Nama Petugas" value="{{ request('petugas') }}">
                    </div>
                    <div class="form-group me-2 my-1">
                        <input type="text" name="pengawas" id="pengawas" class="form-control" placeholder="Pengawas" value="{{ request('pengawas') }}">
                    </div>
                    <div class="form-group me-2 my-1 mx-2">
                    <select name="kode_kabkot" id="kode_kabkot" class="form-control">
                                    <option value="">Pilih Kabupaten/Kota</option>
                                    @foreach($datakabkot as $kabkot)
                                        <option value="{{ $kabkot->kode_kabkot }}" 
                                            {{ $req_kabkot && $req_kabkot->kode_kabkot == $kabkot->kode_kabkot ? 'selected' : '' }}>
                                            {{ $kabkot->kabkot_name }}
                                        </option>
                                    @endforeach
                                </select>
                                </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                <div class="p-2">
                    <a class="btn btn-primary" href="{{route('daftarpetugas.add')}}">
                        <span class="tf-icons bx bx-plus"></span>
                         Tambah Petugas
                    </a>
                </div>
                </form>
             </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>Domisili</th>
                        <!-- <th>Kode Petugas</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Pengawas</th>
                        <th>E-mail</th>
                        <th>Alamat</th>
                        <th>Telepon</th>-->
                        <th>Action</th> 
                        
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0"></tbody>
                    @foreach ($daftarpetugas as $index => $data)
                    <tr>
                        <td>{{ $daftarpetugas->firstItem() + $index }}</td> <!-- Nomor urut berkelanjutan -->
                        <td>{{ $data->Nama_Petugas ?? '-' }}</td>
                        <td>{{ $data->datakabkot->kabkot_name ?? '-' }}</td>
                        <!-- <td>{{ $data->kode_petugas ?? '-'}}</td>
                        <td>{{ $data->loginpetugas->username ?? '-' }}</td>
                        <td>{{ $data->loginpetugas->password ?? '-' }}</td>
                        <td>{{ $data->Pengawas ?? '-' }}</td>
                        <td>{{ $data->email_petugas ?? '-' }}</td>
                        <td>{{ $data->alamat_petugas ?? '-' }}</td>
                        <td>{{ $data->no_petugas ?? '-'}}</td> -->
                        <td>
                                    <a class="action-icon" href="{{ route('daftarpetugas.detail', ['id' => $data->id]) }}"
                                        title="detail">
                                        <i class='bx bx-search'></i>
                                    </a>
                                &nbsp;
                                    <a class="action-icon" href="{{ route('daftarpetugas.edit', ['id' => $data->id]) }}"
                                        title="edit">
                                        <i class='bx bx-pencil'></i>
                                    </a>
                                &nbsp;
                                    <a class="action-icon" href="{{ route('daftarpetugas.delete', ['id' => $data->id]) }}"
                                        title="delete">
                                        <i class='bx bx-trash'></i>
                                    </a>
                                </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="my-4 mx-3">
                  {{$daftarpetugas -> withQueryString()-> links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
       

    </div>

@endsection

@section('footer-code')



@endsection
