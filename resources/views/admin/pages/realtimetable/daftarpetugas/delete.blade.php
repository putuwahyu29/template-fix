@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Hapus Petugas')

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
                    <h3 class="card-header">Hapus Petugas id : {{ $petugas->id }}</h3>
                </div>

            </div>

            <div class="row m-2">

                <div class="col-md-8 col-xs-12">
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

            </div>




            {{-- ROW FOR ADDITIONAL FUNCTIONALITY BUTTON --}}
            <div class="m-4">
                <a onclick="goBack()" class="btn btn-outline-secondary me-2"><i
                        class="tf-icons bx bx-left-arrow-alt me-2"></i>Back</a>
                <a class="btn btn-danger me-2" href="#"
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
