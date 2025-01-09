@extends("welcome")
@section("isi")
 <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div style="width: 80%; margin: auto;">
                            <canvas id="wisatawanChart"></canvas>
                        </div>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan Mengguanakan Triple Exponensial Smoothing</h6>
                        </div>
                        <div class="card-body">
                            {{-- <a href="" class="btn btn-primary">Tambah</a> --}}
                            <div class="table-responsive table-bordered border-info">
                                <table class="table table-striped border-info" id="dataTable" width="100%" cellspacing="0" >
                                    <thead>
                                          <tr>
                                            <th class="text-center align-middle">Tahun</th>
                                            <th class="text-center align-middle">Bulan</th>
                                            <th>Y - Jumlah Kunjungan</th>
                                            <th class="text-center align-middle">Y`</th>
                                            <th class="text-center align-middle">Y``</th>
                                            <th class="text-center align-middle">Y```</th>
                                            <th class="text-center align-middle">a</th>
                                            <th class="text-center align-middle">b</th>
                                            <th class="text-center align-middle">c</th>
                                            <th>Forecast</th>
                                            <th>Error</th>
                                            <th>|Error|</th>
                                            <th>PE</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($dataKebutuhan as $calc)
                                        <tr>
                                            <td>{{ $calc['tahun'] }}</td>
                                            <td>{{ $calc['bulan'] }}</td>
                                            <td>{{ $calc['jumlah_kunjungan'] }}</td>
                                            <td>{{ round($calc['singleSmoothing'], 3) }}</td>
                                            <td>{{ round($calc['doubleSmoothing'], 3) }}</td>
                                            <td>{{ round($calc['tripleSmoothing'], 3) }}</td>
                                            <td>{{ round($calc['aForcast'], 3) }}</td>
                                            <td>{{ round($calc['bForcast'], 3) }}</td>
                                            <td>{{ round($calc['cForcast'], 3) }}</td>
                                            <td>{{ round($calc['resultForcasting'], 3) }}</td>
                                            <td>{{ round($calc['countError'], 1) }}</td>
                                            <td>{{ round($calc['absError'], 1) }}</td>
                                            <td>{{ round($calc['percentageError'], 1) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th class="text-center align-middle">Tahun</th>
                                            <th class="text-center align-middle">Bulan</th>
                                            <th>Y - Jumlah Kunjungan</th>
                                            <th class="text-center align-middle">Y`</th>
                                            <th class="text-center align-middle">Y``</th>
                                            <th class="text-center align-middle">Y```</th>
                                            <th class="text-center align-middle">a</th>
                                            <th class="text-center align-middle">b</th>
                                            <th class="text-center align-middle">c</th>
                                            <th>Forcast</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hasil MAPE = {{ round($mape, 2) }}</h6>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil Forcasting 1 Tahun Kedepan</h6>
                        </div>
                        <div class="card-body">
                            {{-- <a href="" class="btn btn-primary">Tambah</a> --}}
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                          <tr>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Forecast</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($dataForcast as $calcForcast)
                                        <tr>
                                            <td>{{ $calcForcast->tahun }}</td>
                                            <td>{{ $calcForcast->bulan }}</td>
                                            <td>{{ $calcForcast->resultForcast }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Forcast</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

        <script>
            // Data dari PHP (Laravel Blade)
            const data = @json($dataKebutuhan);

            // Ambil hasil forecast dan bulan
            const labels = data.map(item => item.bulan);
            const values = data.map(item => item.resultForcasting);
            const kunjunganValues = data.map(item => item.jumlah_kunjungan);

            // Buat grafik menggunakan Chart.js
            const ctx = document.getElementById('wisatawanChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels, // Sumbu X
                    datasets: [
                        {
                            label: 'Hasil Forecast',
                            data: values, // Data Y
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 2,
                            tension: 0.4
                        },
                        {
                            label: 'Jumlah Kunjungan',
                            data: kunjunganValues, // Data jumlah kunjungan
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderWidth: 2,
                            tension: 0.4 // Membuat garis melengkung
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
