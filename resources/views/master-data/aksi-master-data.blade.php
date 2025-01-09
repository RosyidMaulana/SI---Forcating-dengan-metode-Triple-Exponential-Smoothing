@extends("welcome")
@section("isi")
            <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">



                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil Forcasting 1 Tahun Kedepan</h6>
                            <br>
                            <a href="tambah" class="btn btn-primary btn-sm" type="submit">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            {{-- <a href="" class="btn btn-primary">Tambah</a> --}}
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                          <tr>
                                            <th>Tahun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        {{-- @foreach($data as $data)
                                        <tr>
                                            <td>{{ $data->tahun }}</td>
                                            <td>
                                            <form action='/master-data/delete' method="post">
                                                @method('delete')
                                                @csrf()
                                                <div >
                                                    <input type="number" name="tahun" id="input" class="form-control d-none"
                                                             value="{{ $data->tahun }}" style="width: 150px; display: inline-block;">
                                                    <button class="btn btn-primary btn-sm" type="submit">Delete</button>
                                                </div>
                                            </form>
                                        </td>
                                        </tr>
                                        @endforeach --}}

                                        @php
                                            $tahunSudahTampil = []; // Array untuk menyimpan tahun yang sudah ditampilkan
                                        @endphp

                                        @foreach($data as $item)
                                            @if(!in_array($item->tahun, $tahunSudahTampil))
                                                {{-- Cek apakah tahun sudah ada di array --}}
                                                <tr>
                                                    <td>{{ $item->tahun }}</td>
                                                    <td>
                                                        <form action='/master-data/delete' method="post">
                                                            @method('delete')
                                                            @csrf()
                                                            <div>
                                                                <input type="number" name="tahun" id="input" class="form-control d-none"
                                                                    value="{{ $item->tahun }}">
                                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @php
                                                    $tahunSudahTampil[] = $item->tahun; // Tambahkan tahun ke array setelah ditampilkan
                                                @endphp
                                            @endif
                                        @endforeach

                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>Tahun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

        <script>
@endsection

