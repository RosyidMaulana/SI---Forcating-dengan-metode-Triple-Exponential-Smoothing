@extends("welcome")
@section("isi")
 <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <a href="" class="btn btn-primary">Tambah</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th>Kondisi</th>
                                            <th>Harga</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th>Kondisi</th>
                                            <th>Harga</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($databr as $dtbr)
                                        <tr>
                                            <td>{{ $dtbr['id'] }}</td>
                                            <td>{{ $dtbr['nama'] }}</td>
                                            <td>{{ $dtbr['jumlah'] }}</td>
                                            <td>{{ $dtbr['kondisi'] }}</td>
                                            <td>{{ $dtbr['harga'] }}</td>
                                            <td>{{ $dtbr['waktu'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($datausr as $dt)
                                        <tr>
                                            <td>{{ $dt['id'] }}</td>
                                            <td>{{ $dt['name'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection
