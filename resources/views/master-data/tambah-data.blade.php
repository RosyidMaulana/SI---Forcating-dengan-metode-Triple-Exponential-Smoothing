

@extends("welcome")
@section("isi")
 <div class="container-fluid">
    <div class="card shadow mb-4">
    <div style="width: 80%; margin: auto;">
        <canvas id="kunjunganWisatawanChart"></canvas>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jumlah Wisatawan</h6>
        </div>
        <div class="card-body">
            <form action="/master-data/store" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Jumlah Kunjungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $months = [
                                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                ];
                            @endphp

                            @foreach($months as $index => $month)
                            <tr>
                                <td>{{ $month }}</td>
                                <td>
                                    <input type="hidden" name="data[{{ $index }}][bulan]" value="{{ $month }}">
                                    <input type="number" name="data[{{ $index }}][jumlah_kunjungan]"
                                           class="form-control" placeholder="Masukkan jumlah kunjungan" required>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
