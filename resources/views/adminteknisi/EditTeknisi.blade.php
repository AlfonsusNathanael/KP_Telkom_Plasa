@extends('layout.master')
@section('body')

    <main>
        <h1 class="mb-5 d-flex justify-content-center">Form Input Admin Teknisi</h1>

        <form action="{{route('teknisi.update',[$data->id_data])}}" method="POST" class="mx-5 px-5 mb-5 ">
            @csrf
            @method('put')
              <div class="mb-3 mx-5 px-5">
                <label for="ket_lme" class="form-label">Ket LME</label>
                <select name="ket_lme" class="form-select" aria-label="select">
                  <option value="">-- Silahkan Pilih Keterangan LME --</option>
                    @foreach ($ket_lmes as $ket_lme)
                        <option value="{{ $ket_lme->ket_lme}}" {{$data->keterangan_lme == $ket_lme->ket_lme ?'selected':''}}>
                            {{$ket_lme->ket_lme}}
                        </option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="ket_detaillme" class="form-label">Ket Detail LME</label>
                <input type="text" name="ket_detaillme" class="form-control" id="ket_detaillme"
                placeholder="Masukkan ket detail LME">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="validasi_wo" class="form-label">Validasi WO</label>
                <input type="text" name="validasi_wo" class="form-control" id="validasi_wo"
                placeholder="Masukkan validasi WO">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="teknisi" class="form-label">Teknisi</label>
                <input type="text" name="teknisi" class="form-control" id="teknisi"
                placeholder="Masukkan teknisi">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="mitra" class="form-label">Mitra</label>
                <input type="text" name="mitra" class="form-control" id="mitra"
                placeholder="Masukkan mitra">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="odp" class="form-label">ODP</label>
                <input type="text" name="odp" class="form-control" id="odp"
                placeholder="Masukkan ODP">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="tag_dop" class="form-label">Tag ODP</label>
                <input type="text" name="tag_dop" class="form-control" id="tag_dop"
                placeholder="Masukkan tag ODP">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="port" class="form-label">Port</label>
                <input type="text" name="port" class="form-control" id="port"
                placeholder="Masukkan port">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="sn_ont" class="form-label">SN ONT</label>
                <input type="text" name="sn_ont" class="form-control" id="sn_ont"
                placeholder="Masukkan SN ONT">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="tag_pelanggan" class="form-label">Tag Pelanggan</label>
                <input type="text" name="tag_pelanggan" class="form-control" id="tag_pelanggan"
                placeholder="Masukkan tag pelanggan">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="sto" class="form-label">STO</label>
                <select name="sto_select" class="form-select" aria-label="select">
                    @foreach ($stos as $sto)
                        <option value="{{ $sto->nama_sto}}" {{$data->sto == $sto->nama_sto ?'selected':''}}>
                            {{$sto->nama_sto}}
                        </option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="sn_ap" class="form-label">SN-AP</label>
                <input type="text" name="sn_ap" class="form-control" id="sn_ap"
                placeholder="Masukkan SN-AP">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="mac_ap" class="form-label">MAC-AP</label>
                <input type="text" name="mac_ap" class="form-control" id="mac_ap"
                placeholder="Masukkan MAC-AP">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="tanggal_proses" class="form-label">Tanggal Proses</label>
                <input type="text" name="tanggal_proses" class="form-control" id="tanggal_proses"
                placeholder="Masukkan tanggal proses">
              </div>


              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{route('canvasser.index')}}" class="btn btn-danger mx-2">Cancel</a>
                </div>
        </form>
    </main>

@endsection
