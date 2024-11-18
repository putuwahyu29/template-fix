@extends('admin/template-base')

@section('page-title', 'Tambah Petugas')

@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        <div class="card">
            <h5 class="card-header">Tambah Petugas</h5>
            <div class="card-body">
                <form action="{{ route('daftarpetugas.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="Nama_Petugas" class="form-label">Nama Petugas</label>
                        <input type="text" class="form-control @error('Nama_Petugas') is-invalid @enderror" id="Nama_Petugas" name="Nama_Petugas" value="{{ old('Nama_Petugas') }}" required>
                        @error('Nama_Petugas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kode_kabkot" class="form-label">Kode Kabupaten/Kota</label>
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

                    <div class="mb-3">
                        <label for="kode_petugas" class="form-label">Kode Petugas</label>
                        <input type="text" class="form-control @error('kode_petugas') is-invalid @enderror" id="kode_petugas" name="kode_petugas" value="{{ old('kode_petugas') }}" required>
                        @error('kode_petugas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('Username') is-invalid @enderror" id="Username" name="Username" value="{{ old('Username') }}" required>
                        @error('Username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('Password') is-invalid @enderror" id="Password" name="Password" required>
                        @error('Password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="Pengawas" class="form-label">Pengawas</label>
                        <input type="text" class="form-control @error('Pengawas') is-invalid @enderror" id="Pengawas" name="Pengawas" value="{{ old('Pengawas') }}" required>
                        @error('Pengawas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email_petugas" class="form-label">Email Petugas</label>
                        <input type="email" class="form-control @error('email_petugas') is-invalid @enderror" id="email_petugas" name="email_petugas" value="{{ old('email_petugas') }}" required>
                        @error('email_petugas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat_petugas" class="form-label">Alamat</label>
                        <textarea class="form-control @error('alamat_petugas') is-invalid @enderror" id="alamat_petugas" name="alamat_petugas">{{ old('alamat_petugas') }}</textarea>
                        @error('alamat_petugas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_petugas" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control @error('no_petugas') is-invalid @enderror" id="no_petugas" name="no_petugas" value="{{ old('no_petugas') }}" required>
                        @error('no_petugas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <a onclick="goBack()" class="btn btn-outline-secondary me-2"><i
                        class="tf-icons bx bx-left-arrow-alt me-2"></i>Back</a>
                    <button type="submit" class="btn btn-primary">Tambah Petugas</button>
                </form>
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