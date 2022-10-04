@extends('layout.master')
@section('body')

    <main>
        <h1 class="mb-5 d-flex justify-content-center">Form Input Canvasser</h1>

        <form action="{{route('canvasser.store')}}" method="POST" class="mx-5 px-5 mb-5 " enctype="multipart/form-data">
            @csrf
                <div class="mb-3 mx-5 px-5">
                    <label for="nama_sales" class="form-label">Nama Sales / Agency </label>
                    <select name="sales_select" class="form-select" aria-label="select">
                        @foreach ($saless as $sales)
                            <option value="{{ $sales->nama_sales}}">
                                {{$sales->nama_sales}}
                            </option>
                        @endforeach
                    </select>
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="site_lokasi" class="form-label">Nama Site Lokasi</label>
                <input type="text" name="site_lokasi" class="form-control" id="site_lokasi"
                placeholder="Masukkan nama site lokasi">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan KTP</label>
                <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan"
                placeholder="Masukkan nama pelanggan KTP">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="nik_ktp" class="form-label">NIK KTP</label>
                <input type="text" name="nik_ktp" class="form-control" id="nik_ktp"
                placeholder="Masukkan NIK KTP">
              </div>

              <div class="mb-3 mx-5 px-5">
                <label for="alamat_instalasi" class="form-label">Alamat Instalasi</label>
                <input type="text" name="alamat_instalasi" class="form-control" id="alamat_instalasi"
                placeholder="Masukkan alamat instalasi">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="cp_telfon" class="form-label">CP (Pastikan bisa di Telepon)</label>
                <input type="text" name="cp_telfon" class="form-control" id="cp_telfon"
                placeholder="Masukkan nomor telepon">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="cp_alternatif" class="form-label">CP Alternatif Pelanggan</label>
                <input type="text" name="cp_alternatif" class="form-control" id="cp_alternatif"
                placeholder="Masukkan nomor telepon">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="email_pelanggan" class="form-label">Email Pelanggan</label>
                <input type="text" name="email_pelanggan" class="form-control" id="email_pelanggan"
                placeholder="Masukkan email pelanggan">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="linkreferral_sobatwarkop" class="form-label">Link Referral Sobat Warkop</label>
                <input type="text" name="linkreferral_sobatwarkop" class="form-control" id="linkreferral_sobatwarkop"
                placeholder="Masukkan link referral">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="datel" class="form-label">Datel</label>
                <select name="datel_select" class="form-select" aria-label="select">
                    @foreach ($datels as $datel)
                        <option value="{{ $datel->nama_datel}}">
                            {{$datel->nama_datel}}
                        </option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="sto" class="form-label">STO</label>
                <select name="sto_select" class="form-select" aria-label="select">
                    @foreach ($stos as $sto)
                        <option value="{{ $sto->nama_sto}}">
                            {{$sto->nama_sto}}
                        </option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="produk" class="form-label">Produk</label>
                <select name="produk_select" class="form-select" aria-label="select">
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->nama_produk}}">
                            {{$produk->nama_produk}}
                        </option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="bandwidth" class="form-label">Bandwidth</label>
                <select name="bandwidth_select" class="form-select" aria-label="select">
                    @foreach ($bandwidths as $bandwidth)
                        <option value="{{ $bandwidth->nama_bandwidth}}">
                            {{$bandwidth->nama_bandwidth}}
                        </option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="diskon" class="form-label">Keterangan Discount</label>
                <select name="diskon_select" class="form-select" aria-label="select">
                    @foreach ($diskons as $diskon)
                        <option value="{{ $diskon->nama_diskon}}">
                            {{$diskon->nama_diskon}}
                        </option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="foto_lokasi" class="form-label">Foto Warkop / Rumah</label>
                <input type="file" id="foto_lokasi" name="foto_lokasi" class="form-control" 
                placeholder="Tambahkan foto warkop / rumah">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="foto_ktp_pelanggan" class="form-label">Foto KTP Pelanggan</label>
                <input type="file" name="foto_ktp_pelanggan" class="form-control" id="foto_ktp_pelanggan"
                placeholder="Tambahkan foto KTP Pelanggan">
              </div>
              {{-- <div class="mb-3 mx-5 px-5">
                <label for="tanggal_order" class="form-label">Tanggal Order Pelanggan</label>
                <input type=>
              </div> --}}
              <div class="mb-3 mx-5 px-5">
                <label for="foto_ktp_selfiepelanggan" class="form-label">Foto Selfie dengan KTP</label>
                <input type="file" name="foto_ktp_selfiepelanggan" class="form-control" id="foto_ktp_selfiepelanggan"
                placeholder="Tambahkan KTP + selfie pelanggan">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="koordinat_instalasi_pelanggan" class="form-label">Koordinat Instalasi Pelanggan</label>
                <input type="text" name="koordinat_instalasi_pelanggan" class="form-control" id="koordinat_instalasi_pelanggan"
                placeholder="Masukkan koordinat instalasi pelanggan">
              </div>
              <div class="mb-3 mx-5 px-5">
                <label for="kontak_isc" class="form-label">Kontak ISC / Downline</label>
                <input type="text" name="kontak_isc" class="form-control" id="kontak_isc"
                placeholder="Masukkan kontak ISC/Downline">
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{route('canvasser.index')}}" class="btn btn-danger mx-2">Cancel</a>
                </div>
        </form>
    </main>

@endsection
