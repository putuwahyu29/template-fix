@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Master SHPB')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

    
        {{-- FOR BREADCRUMBS --}}

        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}
        <div class="card">
            <h2 class="card-header">Master SHPB</h2>
            <div class="col-12 col-sm-8 col-md-10">
                <form action="{{ route('mastershpb') }}" method="GET" class="d-flex align-items-center">
                    <div class="form-group me-2 my-1 mx-2">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Cari" value="{{ request('search') }}">
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
                    <button type="submit" class="btn btn-primary">Search</button> &emsp;
                    <a class="btn btn-primary" href="{{route('admin.user.add')}}">
                        <span class="tf-icons bx bx-plus mx-30"></span>&nbsp;
                         Add
                    </a>&emsp;
                    <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        Export
    </button>
    <ul class="dropdown-menu" aria-labelledby="exportDropdown">
        <li><a class="dropdown-item" href="#">Excel</a></li>
        <li><a class="dropdown-item" href="#">CSV</a></li>
        <li><a class="dropdown-item" href="#">PDF</a></li>
        <li><button class="dropdown-item" onclick="window.print()">Print</button></li>
        <li><button class="dropdown-item" onclick="copyTable()">Copy</button></li>
    </ul>
</div>
                </form>
                <script>
    function copyTable() {
        const table = document.querySelector('table');
        let range = document.createRange();
        range.selectNode(table);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        document.execCommand('copy');
        alert('Table copied to clipboard');
    }
</script>
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
                        <th>Kategori Pedagang</th>
                        <th>Sumber Data</th>
                        <th>Status</th>
                        <th>Catatan</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0"></tbody>
                    @foreach ($mastershpb as $index => $data)
                    <tr>
                        <td>{{ $mastershpb->firstItem() + $index }}</td>
                        <td>{{ $data->nama_perusahaan ?? '-' }}</td>
                        <td>{{ $data->alamat_perusahaan ?? '-' }}</td>
                        <td>{{ $data->datakabkot->kabkot_name ?? '-' }}</td>
                        <td>{{ $data->datakecamatan->kecamatan_name ?? '-'}}</td>
                        <td>{{ $data->datakeldes->keldes_name ?? '-' }}</td>
                        <td>{{ $data->no_telepon ?? '-'}}</td>
                        <td>{{ $data->KategoriSHPB->kategori_name ?? '-' }}</td>
                        <td>@if($data->is_prelist == 1)
                                Prelist
                            @else
                                Tambahan
                            @endif</td>
                        <td>{{ $data->statuspendataan->status_pendataan ?? '-' }}</td>
                        <td>{{ $data->catatan ?? '-'}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="my-4 mx-3">
                  {{$mastershpb -> withQueryString()-> links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>


    </div>

@endsection

@section('footer-code')



@endsection
