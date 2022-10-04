@extends('layout.master')
@section('body')

    <main>
        <h1 class="mb-5 d-flex justify-content-center">Form Input Admin Helpdesk</h1>

        <form action="{{route('helpdesk.update',[$data->id_data])}}" method="POST" class="mx-5 px-5 mb-5 ">
            @csrf
            @method('put')

              <div class="mb-3 mx-5 px-5">
                <label for="ip_olt" class="form-label">IP-OLT</label>
                <input type="text" name="ip_olt" class="form-control" id="ip_olt"
                placeholder="Masukkan keterangan ip_olt" value="{{$data->ip_olt}}">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="gpon_olt" class="form-label">GPON-OLT</label>
                <input type="text" name="gpon_olt" class="form-control" id="gpon_olt"
                placeholder="Masukkan keterangan gpon_olt" value="{{$data->gpon_olt}}">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="port_olt" class="form-label">PORT-OLT</label>
                <input type="text" name="port_olt" class="form-control" id="port_olt"
                placeholder="Masukkan keterangan port_olt" value="{{$data->port_olt}}">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="ap_name" class="form-label">AP-NAME</label>
                <input type="text" name="ap_name" class="form-control" id="ap_name"
                placeholder="Masukkan keterangan ap_name" value="{{$data->ap_name}}">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="tgl_close" class="form-label">TGL-CLOSE</label>
                <input type="text" name="tgl_close" class="form-control" id="tgl_close"
                placeholder="Masukkan keterangan tgl_close" value="{{$data->tgl_close}}">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="belum_input_sc" class="form-label">Belum Input SC</label>
                <select name="belum_input_sc" class="form-select" aria-label="select">
                    @foreach ($beluminputscs as $beluminputsc)
                        <option value="{{ $beluminputsc->ket_inputsc}}" {{$data->belum_input_sc == $beluminputsc->ket_inputsc ?'selected':''}}>
                            {{$beluminputsc->ket_inputsc}}
                        </option>
                    @endforeach
                  </select>
                </div>

              <div class="mb-3 mx-5 px-5">
                <label for="ket_helpdesk" class="form-label">Ket</label>
                <input type="text" name="ket_helpdesk" class="form-control" id="ket_helpdesk"
                placeholder="Masukkan keterangan ket_helpdesk" value="{{$data->ket_helpdesk}}">
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{route('helpdesk.index')}}" class="btn btn-danger mx-2">Cancel</a>
                </div>
        </form>
    </main>

@endsection
