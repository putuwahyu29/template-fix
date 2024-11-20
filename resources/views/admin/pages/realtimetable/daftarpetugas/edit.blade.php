@extends('admin.template-base')

@section('page-title', 'Edit Petugas')

@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        <div class="row">

    
            <!-- Basic Layout -->
            <div class="container">
    <h2>Edit Petugas</h2>
    <form action="{{ route('daftarpetugas.update',$petugas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $petugas->id }}">
        <div class="form-group">
            <label for="Nama_Petugas">Nama Petugas</label>
            <input type="text" name="Nama_Petugas" id="Nama_Petugas" class="form-control" value="{{ $petugas->Nama_Petugas }}" required>
        </div>
        <div class="form-group">
            <label for="kode_kabkot">Kode Kabkot</label>
            <input type="text" name="kode_kabkot" id="kode_kabkot" class="form-control" value="{{ $petugas->kode_kabkot }}" readonly>
        </div>
        <div class="form-group">
            <label for="kode_petugas">Kode Petugas</label>
            <input type="text" name="kode_petugas" id="kode_petugas" class="form-control" value="{{ $petugas->kode_petugas }}" readonly>
        </div>
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ $petugas->loginpetugas->username }}" required>
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="{{ old('password', $petugas->loginpetugas->password) }}">
        </div>
        <div class="form-group">
            <label for="Pengawas">Pengawas</label>
            <input type="text" name="Pengawas" id="Pengawas" class="form-control" value="{{ $petugas->Pengawas }}" readonly>
        </div>
        <div class="form-group">
            <label for="email_petugas">Email</label>
            <input type="email" name="email_petugas" id="email_petugas" class="form-control" value="{{ $petugas->email_petugas }}" required>
        </div>
        <div class="form-group">
            <label for="alamat_petugas">Alamat</label>
            <input type="text" name="alamat_petugas" id="alamat_petugas" class="form-control" value="{{ $petugas->alamat_petugas }}" required>
        </div>
        <div class="form-group">
            <label for="no_petugas">Nomor Telepon</label>
            <input type="text" name="no_petugas" id="no_petugas" class="form-control" value="{{ $petugas->no_petugas }}" required>
        </div>
        <div class="m-4">
                <a onclick="goBack()" class="btn btn-outline-secondary me-2"><i
                        class="tf-icons bx bx-left-arrow-alt me-2"></i>Back</a>
                <button type="submit" class="btn btn-success">Update</button>
        </div>   
    </form>
</div>
@endsection

@section('footer-code')

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

@endsection
