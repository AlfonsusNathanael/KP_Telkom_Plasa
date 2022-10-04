@extends('layout.master')
@section('body')

<main>
    <h1 class="text-center"> Canvasser </h1>

    <div class="tbl">
        @if (Session::get('nama_user')=="canvasser" || Session::get('nama_user')=="admin")
            <a href="{{route('canvasser.create')}}" class="btn btn-primary mb-2">Tambah Data</a>
            <a class="btn btn-info text-white mb-2" data-bs-toggle="modal" data-bs-target="#ModalSearch">Filter Data</a>
        @endif
        <table class="table datatable table-hover table-striped" id="canvasser_table">
            <thead>
                <tr>
                    @if (Session::get('nama_user')=="canvasser" || Session::get('nama_user')=="admin")
                        <th>Action</th>
                    @endif
                    <th>Nama Sales / Agency</th>
                    <th>Nama Site Lokasi</th>
                    <th>Tanggal Input</th>
                    <th>Tanggal Update</th>
                    <th>Nama Pelanggan KTP</th>
                    <th>NIK KTP</th>
                    <th>Alamat Instalasi</th>
                    <th>CP (Pastikan bisa di Telepon)</th>
                    <th>CP Alternatif Pelanggan</th>
                    <th>Email Pelanggan</th>
                    <th>Link Referral Sobat Warkop</th>
                    <th>Datel</th>
                    <th>STO</th>
                    <th>Produk</th>
                    <th>Bandwidth</th>
                    <th>Keterangan Discount</th>
                    <th>Foto Warkop / Rumah</th>
                    <th>Foto KTP Pelanggan</th>
                    <th>Foto KTP + Selfie Pelanggan</th>
                    <th>Koordinat Instalasi Pelanggan</th>
                    <th>Kontak ISC / Downline</th>
                    <th>Email Address</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                  <tr>
                    @if (Session::get('nama_user')=="canvasser" || Session::get('nama_user')=="admin")
                        @if ($data->ket_data == 0)
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('hehehe', $data->id_data)}}" class="btn btn-outline-danger me-1 btn-sm">Kirim</a>

                                    <a href="{{route('canvasser.edit', [$data->id_data])}}" class="btn btn-outline-dark me-1 btn-sm"><i class="bi-pencil-square"></i></a>
                                    <form action="{{route('canvasser.destroy', [$data->id_data])}}" method="POST">
                                        <button type="submit" class="btn btn-outline-dark me-1 btn-sm btn-delete" data-name=""><i class="bi-trash"></i></button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </td>
                        @else
                            <td style="white-space: nowrap">
                                <div class="d-flex">
                                    <a class="btn btn-success btn-sm">Sudah Dikirim</a>

                                </div>
                            </td>
                        @endif

                    @else
                        {{-- <td>Button user canvasser</td> --}}
                    @endif

                    <td>{{ $data->nama_sales}}</td>
                    <td>{{ $data->nama_site_lokasi}}</td> 
                    <td>{{ $data->created_at}}</td>
                    <td>{{ $data->updated_at}}</td>
                    <td>{{ $data->nama_pelangganktp}}</td>
                    <td>{{ $data->nik_ktp}}</td>
                    <td>{{ $data->alamat_instalasi}}</td>
                    <td>{{ $data->cp}}</td>
                    <td>{{ $data->cp_alternatif}}</td>
                    <td>{{ $data->email_pelanggan}}</td>
                    <td>{{ $data->linkreferral_sobatwarkop}}</td>
                    <td>{{ $data->datel}}</td>
                    <td>{{ $data->sto}}</td>
                    <td>{{ $data->produk}}</td>
                    <td>{{ $data->bandwidth}}</td>
                    <td>{{ $data->keterangan_discount}}</td>
                    {{-- //cara menampilkan fotonya :D --}}
                    <td><img src="{{asset('storage/files/lokasi/'.$data->foto_lokasi) }}" alt="" title="" /></td>
                    <td><img src="{{asset('storage/files/ktp/'.$data->foto_ktp_pelanggan) }}" alt="" title="" /></td>
                    <td><img src="{{asset('storage/files/selfie/'.$data->foto_ktp_selfiepelanggan) }}" alt="" title="" /></td>
                    <td>{{ $data->koordinat_instalasi_pelanggan}}</td>
                    <td>{{ $data->kontak_isc}}</td>
                    <td>{{ $data->email_address}}</td>

                  </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="ModalSearch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="labelstatus"></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" id="filter_tabel" action="{!! url('data/filter/canvasser')!!}">
                    @csrf
                    <div class="row">

                            <div class="col-md-4 mb-3">
                                <label for="nama_sales" class="form-label">Nama Sales</label>
                                <select name="nama_sales" class="form-select" aria-label="select">
                                    <option value=""> -- Pilih Sales -- </option>
                                    @foreach ($saless as $sales)
                                        <option value="{{ $sales->nama_sales}}">
                                            {{$sales->nama_sales}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <br>
                    <div >
                            <button class="btn btn-success px-5">Cari</button>
                            <button type="button" class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

</main>

@endsection

@section('custom_script')
<script>
    $(document).ready( function () {
        $('#canvasser_table').DataTable({
            scrollX: true,
        });
    } );
</script>
@endsection


