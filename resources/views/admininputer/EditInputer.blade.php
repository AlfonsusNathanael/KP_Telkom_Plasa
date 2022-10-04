@extends('layout.master')
@section('body')

    <main>
        <h1 class="mb-5 d-flex justify-content-center">Form Input Admin Inputer</h1>

        <form action="{{route('inputer.update',[$data->id_data])}}" method="POST" class="mx-5 px-5 mb-5 ">
            @csrf
            @method('put')
              <div class="mb-3 mx-5 px-5">
                <label for="no_sc" class="form-label">No SC</label>
                <input type="text" name="no_sc" class="form-control" id="no_sc"
                placeholder="Masukkan nomor SC">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="status_sc" class="form-label">Status SC</label>
                <select name="status_sc" class="form-select" aria-label="select">
                        @foreach ($status_scs as $status_sc)
                            <option value="{{ $status_sc->status_sc}}" {{$data->status_sc == $status_sc->status_sc ?'selected':''}}>
                                {{$status_sc->status_sc}}
                            </option>
                        @endforeach
                    </select>
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="ket_detail_sc" class="form-label">Ket Detail SC</label>
                <input type="text" name="ket_detail_sc" class="form-control" id="ket_detail_sc"
                placeholder="Masukkan keterangan detail SC">
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{route('canvasser.index')}}" class="btn btn-danger mx-2">Cancel</a>
                </div>
        </form>
    </main>

@endsection
