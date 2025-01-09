@extends("welcome")
@section("isi")
 <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">



                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DATA MASTER</h6>
                        </div>
                        <div class="card-body">
                            {{-- <a href="" class="btn btn-primary">Tambah</a> --}}
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                          <tr>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Jumlah Kunjungan</th>
                                            <th>Perbbaharuhi isi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($data as $data)
                                        <tr>
                                            <td>{{ $data->tahun }}</td>
                                            <td>{{ $data->bulan }}</td>
                                            <td>{{ $data->jumlah_kunjungan }}</td>
                                            <td>
                                            <form action='/master-data/{{ $data->id_data }}/update' method="POST">
                                                {{-- @method('put') --}}
                                                @csrf()
                                                <div class="d-flex align-items-center flex-row">
                                                    <div class="mr-3">
                                                        <input type="number" name="jumlah_kunjungan" id="input" class="form-control"
                                                            placeholder="Masukkan nilai baru" style="width: 150px; display: inline-block;">
                                                    </div>
                                                    <div >
                                                        <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Jumlah Kunjungan</th>
                                            <th>Perbbaharuhi isi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

        <script>
            // Data dari PHP (Laravel Blade)
            const data = @json($data);

            // Ambil hasil forecast dan bulan
            const labels = data.map(item => item.bulan);
            const kunjunganValues = data.map(item => item.jumlah_kunjungan);

            // Buat grafik menggunakan Chart.js
            const sBar = document.getElementById('kunjunganWisatawanChart').getContext('2d');
            new Chart(sBar, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Jumlah Kunjungan',
                            data: kunjunganValues,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' },
                        title: { display: true, text: 'Grafik Forecast Wisatawan' }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>
@endsection
