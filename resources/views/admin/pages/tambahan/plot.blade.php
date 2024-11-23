@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Plot Petugas')

{{-- MAIN CONTENT PART --}}
@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">

        {{-- FOR BREADCRUMBS --}}
        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}
    <div class="container">
        <h2>Plot Petugas</h2>
        <form action="#" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="#">
        <div class="form-group">
            <label for="Nama_Petugas">Kegiatan Survei</label>
            <input type="text" name="Nama_Petugas" id="Nama_Petugas" class="form-control" value="#" required>
        </div>
        <div class="form-group">
            <label for="kode_kabkot">Kabupaten/Kota</label>
            <input type="text" name="kode_kabkot" id="kode_kabkot" class="form-control" value="#" required>
        </div>
        <div class="form-group">
            <label for="kode_petugas">Pilih Petugas</label>
            <input type="text" name="kode_petugas" id="kode_petugas" class="form-control" value="#" required>
        </div>
        <div class="form-group">
            <label for="Username">Pilih Responden</label>
            <input type="text" name="username" id="username" class="form-control" value="#" required>
        </div>
        <div class="m-4">
                <button type="submit" class="btn btn-success">Plot</button>
        </div>   
        </form>
    </div>
</div>
@endsection

@section('footer-code')



@endsection
