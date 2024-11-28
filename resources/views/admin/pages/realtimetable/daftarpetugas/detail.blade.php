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
        <h5 class="bg-dark text-white">Ringkasan Progress</h5>
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
                <th scope="col">No.</th>
                <th scope="col">Kegiatan</th>
                <th scope="col">PML</th>
                <th scope="col">Periode</th>
                <th scope="col">Progress</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($kegiatan as $index => $item)
            <tr class="main-row">
                <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                <td>{{ $item->kegiatan_name }}</td> <!-- Menampilkan nama kegiatan -->
                <td>{{ $item->Pengawas }}</td> <!-- Menampilkan Pengawas -->
               
                <td><select
                    class="form-select bg-dark text-white"
                    onchange="updateSubRowPeriod(this)">
                    <option value="1">Tahun</option>
                    <option value="2">Semester</option>
                    <option value="3">Caturwulan</option>
                    <option value="4">Triwulan</option>
                    <option value="5">Bulanan</option>
                    <option value="6">Dua Minggu</option>
                    <option value="7">Minggu</option>
                </select></td>
                <td>
                    <div class="progress" style="height: 10px; border: 1px solid white;">
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small>50%</small>
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link text-light dropdown-toggle" type="button" onclick="toggleSubRow(this)">
                        <i class="arrow-icon">&#9660;</i>
                        </button>
                    </div>
                </td>
            </tr>
            
            <!-- Subrow (Hidden by Default) -->
            <tr class="sub-row" style="display: none;">
                <td colspan="6" class="bg-secondary">
                    <strong>Detail Informasi:</strong>
                    <table class="table table-dark table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">Responden</th>
                <th scope="col">Periode</th>
                <th scope="col">Tanggal Mencacah</th>
                <th scope="col">Waktu Mencacah</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
                        <tr>
                            <td>Responden A</td>
                            <td class="subrow-period"></td>
                            <td>25 Juni 2024</td>
                            <td>1 Jam 16 Menit 43 Detik</td>
                            <td>1</td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            @endforeach
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
    /* Ikon dropdown */
<style> 
.arrow-icon {
    transition: transform 0.3s ease;
    display: inline-block;
}
.rotate {
    transform: rotate(180deg);
}
</style>

<script>
    function toggleSubRow(button) {
    // Cari elemen <tr> utama dan subrow berikutnya
    const mainRow = button.closest('tr');
    const subRow = mainRow.nextElementSibling;

    // Toggle tampilkan/hidden subrow
    if (subRow.style.display === 'none') {
        subRow.style.display = 'table-row'; // Tampilkan subrow
        button.querySelector('.arrow-icon').classList.add('rotate'); // Putar ikon
    } else {
        subRow.style.display = 'none'; // Sembunyikan subrow
        button.querySelector('.arrow-icon').classList.remove('rotate'); // Kembalikan ikon
    }
}

// Function to update the "Periode" in the subrow
    function updateSubRowPeriod(selectElement) {
        const mainRow = selectElement.closest('.main-row');
        const subRow = mainRow.nextElementSibling;

        // Get the value of the selected period
        const selectedPeriod = selectElement.value;

        // Update all subrow-period cells with the selected period
        const periodCells = subRow.querySelectorAll('.subrow-period');
        periodCells.forEach((cell) => {
            cell.textContent = selectedPeriod;
        });
    }
</script>


@endsection

@section('footer-code')

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

@endsection
