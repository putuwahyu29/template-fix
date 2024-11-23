@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Ringkasan Petugas')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- FOR BREADCRUMBS --}}
        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}

        <div class="card">

            {{-- FIRST ROW,  FOR TITLE AND ADD BUTTON --}}
            <div class="d-flex justify-content-between">

                <div class="bd-highlight">
                    <h3 class="card-header">Detail Petugas id : {{ $petugas->id }}</h3>
                </div>

            </div>

            <div class="row m-2">

                <div class="col-md-4 col-lg-4 bg-dark text-light p-4">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th scope="col" class="bg-dark text-white">Nama Petugas</th>
                                    <td>{{ $petugas->Nama_Petugas }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-dark text-white">Asal Petugas</th>
                                    <td>{{ $petugas->datakabkot->kabkot_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-dark text-white">Kode Petugas</th>
                                    <td>{{ $petugas->kode_petugas }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-dark text-white">Username</th>
                                    <td>{{ $petugas->loginpetugas->username }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-dark text-white" type="password">Password</th>
                                    <td>********</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-dark text-white">Pengawas</th>
                                    <td>{{ $petugas->Pengawas }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-dark text-white">Email</th>
                                    <td>{{ $petugas->email_petugas }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-dark text-white">Alamat</th>
                                    <td>{{ $petugas->alamat_petugas }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-dark text-white">Nomor Telepon</th>
                                    <td>{{ $petugas->no_petugas }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-dark text-white">Created At</th>
                                    <td>{{ $petugas->created_at }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="bg-dark text-white">Updated At</th>
                                    <td>{{ $petugas->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="col-md-8 col-lg-8 bg-dark text-light p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="bg-dark text-white">Projects List</h5>
                <div class="d-flex">
                    <select class="form-select me-2" style="width: 70px;">
                        <option>7</option>
                        <option>10</option>
                        <option>15</option>
                    </select>
                    <input type="text" class="form-control" placeholder="Search Project">
                </div>
            </div>

            <table class="table table-dark table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox"></th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Pengawas</th>
                        <th scope="col">Tim</th>
                        <th scope="col">Progress</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <h5 class="bg-dark text-white">Ringkasan Progress</h5>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <div>#</div>
                                </div>
                            </div>
                        </td>
                        <td>#</td>
                        <td>
                            <div class="d-flex">
                                <span class="text-muted">+4</span>
                            </div>
                        </td>
                        <td>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" style="width: #" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>#%</small>
                        </td>
                        <td>
    <div class="dropdown">
        <button class="btn btn-link text-light dropdown-toggle" type="button" id="dropdownMenuButton=" data-bs-toggle="dropdown" aria-expanded="false">
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton=">
            <li>
                <a class="dropdown-item" href="#">Details</a>
            </li>
            <li>
                <a class="dropdown-item" href="#">Archive</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this survey?');">
                    @csrf
                    @method('DELETE')
                    <button class="dropdown-item text-danger" type="submit">Delete</button>
                </form>
            </li>
        </ul>
    </div>
</td>

                    </tr>
                </tbody>
            </table>
        </div>
            </div>




            {{-- ROW FOR ADDITIONAL FUNCTIONALITY BUTTON --}}
            <div class="m-4">
                <a onclick="goBack()" class="btn btn-outline-secondary me-2"><i
                        class="tf-icons bx bx-left-arrow-alt me-2"></i>Back</a>
                <a class="btn btn-primary me-2" href="{{ route('daftarpetugas.edit', ['id' => $petugas->id]) }}"
                    title="update this user">
                    <i class='tf-icons bx bx-pencil me-2'></i>Edit</a>
                <a class="btn btn-danger me-2" href="{{ route('daftarpetugas.edit', ['id' => $petugas->id]) }}"
                    title="delete user">
                    <i class='tf-icons bx bx-trash me-2'></i>Delete</a>
            </div>

        </div>
    </div>

@endsection

@section('footer-code')

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

@endsection
