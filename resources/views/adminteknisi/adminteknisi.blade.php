@extends('layout.master')
@section('body')

<main>
    <h1 class="text-center"> Admin Teknisi </h1>

    <div class="tbl">
        <a class="btn btn-info text-white mb-2" data-bs-toggle="modal" data-bs-target="#ModalSearch">Filter Data</a>
        <table class="table datatable table-hover table-striped" id="teknisi_table">
            <thead>
                <tr>
                    @if (Session::get('nama_user')=="teknisi" || Session::get('nama_user')=="admin")
                        <th>Action</th>
                    @endif
                    <th>Nama Site</th>
                    <th>Tanggal Input</th>
                    <th>Tanggal Update</th>
                    <th>Produk</th>
                    <th>Alamat</th>
                    <th>Contact Person</th>
                    <th>Datel</th>
                    <th>STO</th>
                    <th>Tgl Order</th>
                    <th>No SC</th>
                    <th>Status SC</th>

                    {{-- Teknisi Input Dari sini --}}
                    <th>Ket LME</th>
                    <th>Ket Detail LME</th>
                    <th>Validasi WO</th>
                    <th>Teknisi</th>
                    <th>Mitra</th>
                    <th>ODP</th>
                    <th>Tag ODP</th>
                    <th>Port</th>
                    <th>SN ONT</th>
                    <th>Tag Pelanggan</th>
                    <th>STO</th>
                    <th>SN-AP</th>
                    <th>MAC-AP</th>
                    <th>Tanggal Progres</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                  <tr>
                    @if (Session::get('nama_user')=="teknisi" || Session::get('nama_user')=="admin")
                        <td>
                            <div class="d-flex">
                                <a href="{{route('teknisi.edit',[$data->id_data])}}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>
                            </div>
                        </td>
                    @else
                        {{-- <td>button user teknisi</td> --}}
                    @endif
                    <td>{{ $data->nama_site_lokasi}}</td>
                    <td>{{ $data->created_at}}</td>
                    <td>{{ $data->updated_at}}</td>
                    <td>{{ $data->produk}}</td>
                    <td>{{ $data->alamat_instalasi}}</td>
                    <td>{{ $data->cp}}</td>
                    <td>{{ $data->datel}}</td>
                    <td>{{ $data->sto}}</td>
                    <td>{{ $data->tanggal_order}}</td>
                    <td>{{ $data->no_sc}}</td>
                    <td>{{ $data->status_sc}}</td>

                    <td>{{ $data->keterangan_lme}}</td>
                    <td>{{ $data->ket_detaillme}}</td>
                    <td>{{ $data->validasi_wo}}</td>
                    <td>{{ $data->teknisi}}</td>
                    <td>{{ $data->mitra}}</td>
                    <td>{{ $data->odp_survey}}</td>
                    <td>{{ $data->tag_odp}}</td>
                    <td>{{ $data->port}}</td>
                    <td>{{ $data->sn_ont}}</td>
                    <td>{{ $data->tag_pelanggan}}</td>
                    <td>{{ $data->sto}}</td>
                    <td>{{ $data->sn_ap}}</td>
                    <td>{{ $data->mac_ap}}</td>
                    <td>{{ $data->tanggal_progres}}</td>
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
                <form method="POST" enctype="multipart/form-data" id="filter_tabel" action="{!! url('data/filter/teknisi')!!}">
                    @csrf
                    <div class="row">

                            <div class="col-md-4 mb-3">
                                <label for="nama_keterangan" class="form-label">Nama Sales</label>
                                <select name="nama_keterangan" class="form-select" aria-label="select">
                                    <option value=""> -- Pilih Progress -- </option>
                                    <option value="progres"> WO A0 DSW </option>
                                    <option value="cancel"> WO A1 KENDALA AKSES </option>
                                    <option value="kendala"> WO A1 KENDALA TEKNIK </option>
                                    <option value="selesai"> SELESAI  </option>

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
        $('#teknisi_table').DataTable({
            scrollX: true,
        });
    } );
</script>
@endsection
