@extends('layout.master')
@section('body')

<main>
    <h1 class="text-center"> Admin Helpdesk </h1>

    <div class="tbl">
        <table class="table datatable table-hover table-striped" id="inputer_table">
            <thead>
                <tr>
                    <th>Action</th>
                    <!-- <th>Approve</th> -->
                    <th>Tanggal Order</th>
                    <th>Nama Site</th>
                    <th>Produk</th>
                    <th>Hasil</th>
                    <th>Ket Detail</th>
                    <th>Tanggal Proses</th>
                    <th>IP-OLT</th>
                    <th>GPON-OLT</th>
                    <th>PORT-OLT</th>
                    <th>AP-NAME</th>
                    <th>TGL-CLOSE</th>
                    <th>Belum input SC</th>
                    <th>KET.</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                  <tr>
                    @if (Session::get('nama_user')=="helpdesk" || Session::get('nama_user')=="admin")
                        <td>
                            <div class="d-flex">
                                <a href="{{route('helpdesk.edit',[$data->id_data])}}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>
                            </div>
                        </td>
                        <!-- <td>
                            <div class="d-flex">
                                <a href="{!! url('approve/data')!!}/{{$data->id_data}}" class="btn btn-success btn-sm me-2">Approve</a>
                                <a href="{!! url('cancel/data')!!}/{{$data->id_data}}" class="btn btn-danger btn-sm me-2">Cancel</a>
                            </div>
                        </td> -->
                    @else
                        <td>Button user helpdesk</td>
                        <td>Approve user helpdesk</td>
                    @endif

                    
                    <td>{{ $data->created_at}}</td>
                    <td>{{ $data->nama_site_lokasi}}</td>
                    <td>{{ $data->produk}}</td>
                    <td>{{ $data->keterangan_lme}}</td>
                    <td>{{ $data->ket_detaillme}}</td>
                    <td>{{ $data->tanggal_progres}}</td>
                    <td>{{ $data->ip_olt}}</td>
                    <td>{{ $data->gpon_olt}}</td>
                    <td>{{ $data->port_olt}}</td>
                    <td>{{ $data->ap_name}}</td>
                    <td>{{ $data->tgl_close}}</td>
                    <td>{{ $data->belum_input_sc}}</td>
                    <td>{{ $data->ket_helpdesk}}</td>

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
