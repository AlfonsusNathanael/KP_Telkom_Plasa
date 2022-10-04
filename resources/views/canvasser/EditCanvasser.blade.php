@extends('layout.master')
@section('body')

    <main>
        <h1 class="mb-5 d-flex justify-content-center">Form Edit Canvasser</h1>

        <form action="{{route('canvasser.update',['canvasser' => $data->id_data])}}" method="POST" class="mx-5 px-5 mb-5 ">
            @csrf
            @method('put')
                <div class="mb-3 mx-5 px-5">
                    <label for="nama_sales" class="form-label">NAMA SALES / AGENCY</label>
                    <select name="sales_select" class="form-select" aria-label="select">
                        @foreach ($saless as $sales)
                            <option value="{{ $sales->nama_sales}}" {{$data->nama_sales == $sales->nama_sales ?'selected':''}}>
                                {{$sales->nama_sales}}
                            </option>
                        @endforeach
                    </select>
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="site_lokasi" class="form-label">NAMA SITE LOKASI</label>
                <input type="text" name="site_lokasi" class="form-control" id="site_lokasi"
                placeholder="Masukkan nama site lokasi" value="{{$data->nama_site_lokasi}}">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="site_lokasi" class="form-label">NAMA SITE LOKASI</label>
                <input type="text" name="site_lokasi" class="form-control" id="site_lokasi"
                placeholder="Masukkan nama site lokasi" value="{{$data->nama_site_lokasi}}">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="nama_pelanggan" class="form-label">NAMA PELANGGAN KTP</label>
                <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan"
                placeholder="Masukkan nama pelanggan KTP" value="{{$data->nama_pelangganktp}}">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="nik_ktp" class="form-label">NIK KTP</label>
                <input type="text" name="nik_ktp" class="form-control" id="nik_ktp"
                placeholder="Masukkan NIK KTP" value="{{$data->nik_ktp}}">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="alamat_instalasi" class="form-label">ALAMAT INSTALASI</label>
                <input type="text" name="alamat_instalasi" class="form-control" id="alamat_instalasi"
                placeholder="Masukkan alamat instalasi" value="{{$data->alamat_instalasi}}">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="cp_telfon" class="form-label">CP (Pastikan bisa di Telpon)</label>
                <input type="text" name="cp_telfon" class="form-control" id="cp_telfon"
                placeholder="Masukkan nomor telepon"  value="{{$data->cp}}">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="cp_alternatif" class="form-label">CP ALTERNATIF PELANGGAN</label>
                <input type="text" name="cp_alternatif" class="form-control" id="cp_alternatif"
                placeholder="Masukkan nomor telepon"  value="{{$data->cp_alternatif}}">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="email_pelanggan" class="form-label">EMAIL PELANGGAN</label>
                <input type="text" name="email_pelanggan" class="form-control" id="email_pelanggan"
                placeholder="Masukkan email pelanggan"  value="{{$data->email_pelanggan}}">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="linkreferral_sobatwarkop" class="form-label">LINK REFERRAL SOBAT WARKOP</label>
                <input type="text" name="linkreferral_sobatwarkop" class="form-control" id="linkreferral_sobatwarkop"
                placeholder="Masukkan link referral" value="{{$data->linkreferral_sobatwarkop}}">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="datel" class="form-label">DATEL</label>
                <select name="datel_select" class="form-select" aria-label="select">
                    @foreach ($datels as $datel)
                        <option value="{{ $datel->nama_datel}}" {{$data->datel == $datel->nama_datel ?'selected':''}}>
                            {{$datel->nama_datel}}
                        </option>
                    @endforeach
                </select>
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
                <label for="produk" class="form-label">PRODUK</label>
                <select name="produk_select" class="form-select" aria-label="select">
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->nama_produk}}" {{$data->produk == $produk->nama_produk ?'selected':''}}>
                            {{$produk->nama_produk}}
                        </option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="bandwidth" class="form-label">BANDWIDTH</label>
                <select name="bandwidth_select" class="form-select" aria-label="select">
                    @foreach ($bandwidths as $bandwidth)
                        <option value="{{ $bandwidth->nama_bandwidth}}" {{$data->bandwidth == $bandwidth->nama_bandwidth ?'selected':''}}>
                            {{$bandwidth->nama_bandwidth}}
                        </option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="diskon" class="form-label">KETERANGAN DISCOUNT</label>
                <select name="diskon_select" class="form-select" aria-label="select">
                    @foreach ($diskons as $diskon)
                        <option value="{{ $diskon->nama_diskon}}" {{$data->keterangan_discount == $diskon->nama_diskon ?'selected':''}}>
                            {{$diskon->nama_diskon}}
                        </option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="foto_lokasi" class="form-label">FOTO WARKOP / RUMAH</label>
                <input type="file" name="foto_lokasi" class="form-control" id="foto_lokasi"
                placeholder="Tambahkan foto warkop / rumah" value="{{$data->foto_lokasi}}">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="foto_ktp_pelanggan" class="form-label">FOTO KTP PELANGGAN</label>
                <input type="file" name="foto_ktp_pelanggan" class="form-control" id="foto_ktp_pelanggan"
                placeholder="Tambahkan foto KTP Pelanggan" value="{{$data->foto_ktp_pelanggan}}">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="foto_ktp_selfiepelanggan" class="form-label">FOTO KTP + SELFIE PELANGGAN</label>
                <input type="file" name="foto_ktp_selfiepelanggan" class="form-control" id="foto_ktp_selfiepelanggan"
                placeholder="Tambahkan KTP + selfie pelanggan"  value="{{$data->foto_ktp_selfiepelanggan}}">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="koordinat_instalasi_pelanggan" class="form-label">KOORDINAT INSTALASI PELANGGAN</label>
                <input type="text" name="koordinat_instalasi_pelanggan" class="form-control" id="koordinat_instalasi_pelanggan"
                placeholder="Masukkan koordinat instalasi pelanggan"  value="{{$data->koordinat_instalasi_pelanggan}}">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="kontak_isc" class="form-label">KKONTAK ISC / DOWNLINE</label>
                <input type="text" name="kontak_isc" class="form-control" id="kontak_isc"
                placeholder="Masukkan kontak ISC/Downline"  value="{{$data->kontak_isc}}">
              </div>

              <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="{{route('canvasser.index')}}" class="btn btn-danger mx-2">Cancel</a>
              </div>
              
        </form>
    </main>

@endsection
