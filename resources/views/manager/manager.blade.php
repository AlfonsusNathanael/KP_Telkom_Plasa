@extends('layout.master')
@section('body')

<main>
    <h1> Manager </h1>


    <div class="tbl">
        <table class="table datatable" id="manajer_table">
            <thead>
                <tr>
                    <th>NAMA SALES / AGENCY</th>
                    <th>NAMA SITE LOKASI</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Tanggal Update</th>
                    <th>NAMA PELANGGAN KTP</th>
                    <th>NIK KTP</th>
                    <th>ALAMAT INSTALASI</th>
                    <th>CP (Pastikan bisa di Telpon)</th>
                    <th>CP ALTERNATIF PELANGGAN</th>
                    <th>EMAIL PELANGGAN</th>
                    <th>LINK REFERRAL SOBAT WARKOP</th>
                    <th>DATEL</th>
                    <th>STO</th>
                    <th>PRODUK</th>
                    <th>BANDWIDTH</th>
                    <th>KETERANGAN DISCOUNT</th>
                    <th>FOTO WARKOP / RUMAH</th>
                    <th>FOTO KTP PELANGGAN</th>
                    <th>FOTO KTP + SELFIE PELANGGAN</th>
                    <th>KOORDINAT INSTALASI PELANGGAN</th>
                    <th>KKONTAK ISC / DOWNLINE</th>
                    <th>Email Address</th>
                    {{-- cocococo --}}

                    <th>Validasi WO</th>
                    <th>KETERANGAN LME</th>
                    <th>ODP Survey</th>
                    <th>KET DETAIL LME</th>
                    <th>TEKNISI</th>
                    <th>MITRA</th>
                    <th>TAG ODP</th>
                    <th>PORT</th>
                    <th>SN-ONT</th>
                    <th>TAG PELANGGAN</th>
                    <th>SN-AP</th>
                    <th>MAC-AP</th>
                    <th>TANGGAL PROGRES</th>
                    <th>TANGGAL ORDER</th>
                    <th>NO SC</th>
                    <th>STATUS SC</th>
                    <th>KET DETAIL SC</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                  <tr>
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
                    <td>{{ $data->foto_lokasi}}</td>
                    <td>{{ $data->foto_ktp_pelanggan}}</td>
                    <td>{{ $data->foto_ktp_selfiepelanggan}}</td>
                    <td>{{ $data->koordinat_instalasi_pelanggan}}</td>
                    <td>{{ $data->kontak_isc}}</td>
                    <td>{{ $data->email_address}}</td>
                    {{-- cocococo --}}

                    <td>{{ $data->validasi_wo}}</td>
                    <td>{{ $data->keterangan_lme}}</td>
                    <td>{{ $data->odp_survey}}</td>
                    <td>{{ $data->ket_detaillme}}</td>
                    <td>{{ $data->teknisi}}</td>
                    <td>{{ $data->mitra}}</td>
                    <td>{{ $data->tag_odp}}</td>
                    <td>{{ $data->port}}</td>
                    <td>{{ $data->sn_ont}}</td>
                    <td>{{ $data->tag_pelanggan}}</td>
                    <td>{{ $data->sn_ap}}</td>
                    <td>{{ $data->mac_ap}}</td>
                    <td>{{ $data->tanggal_progres}}</td>
                    <td>{{ $data->tanggal_order}}</td>
                    <td>{{ $data->no_sc}}</td>
                    <td>{{ $data->status_sc}}</td>
                    <td>{{ $data->ket_detail_sc}}</td>
                  </tr>
                @endforeach
            </tbody>
        </table>


</main>

@endsection

@section('custom_script')
<script>
    $(document).ready( function () {
        $('#manajer_table').DataTable({
            scrollX: true,
        });
    } );
</script>
@endsection
