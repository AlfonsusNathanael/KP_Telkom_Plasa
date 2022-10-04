@extends('layout.master')
@section('body')

<main>
    <h1 class="text-center"> Admin Inputer </h1>

    <div class="tbl">
        <table class="table datatable table-hover table-striped" id="inputer_table">
            <thead>
                <tr>
                    @if (Session::get('nama_user')=="inputer" || Session::get('nama_user')=="admin")
                        <th>Action</th>
                        <th>Approve</th>
                    @endif
                    <th>Nama Sales</th>
                    <th>Nama Site Lokasi</th>
                    <th>Tanggal Input</th>
                    <th>Tanggal Update</th>
                    <th>Nama Pelanggan KTP</th>
                    <th>Keterangan LME</th>
                    <th>ODP Survey</th>
                    <th>Ket Detail LME</th>
                    <th>Tanggal Order</th>
                    {{-- admin inputer dari sini --}}
                    <th>No SC</th>
                    <th>Status SC</th>
                    <th>Ket Detail SC</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                  <tr>
                    @if (Session::get('nama_user')=="inputer" || Session::get('nama_user')=="admin")
                        <td>
                            <div class="d-flex">
                                <a href="{{route('inputer.edit',[$data->id_data])}}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>
                            </div>
                        </td>
                        <!-- <td>
                            <div class="d-flex">
                                <a href="{!! url('approve/data')!!}/{{$data->id_data}}" class="btn btn-success btn-sm me-2">Approve</a>
                                <a href="{!! url('cancel/data')!!}/{{$data->id_data}}" class="btn btn-danger btn-sm me-2">Cancel</a>
                            </div>
                        </td> -->
                    @else
                        {{-- <td>Button user inputer</td>
                        <td>Approve user inputer</td> --}}
                    @endif

                    <td>{{ $data->nama_sales}}</td>
                    <td>{{ $data->nama_site_lokasi}}</td>
                    <td>{{ $data->created_at}}</td>
                    <td>{{ $data->updated_at}}</td>
                    <td>{{ $data->nama_pelangganktp}}</td>
                    <td>{{ $data->keterangan_lme}}</td>
                    <td>{{ $data->odp_survey}}</td>
                    <td>{{ $data->ket_detaillme}}</td>
                    <td>{{ $data->tanggal_order}}</td>
                    <td>{{ $data->no_sc}}</td>
                    <td>{{ $data->status_sc}}</td>
                    <td>{{ $data->ket_detail_sc}}</td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</main>

@endsection

@section('custom_script')
<script>
    $(document).ready( function () {
        $('#inputer_table').DataTable({
        });
    } );
</script>
@endsection
