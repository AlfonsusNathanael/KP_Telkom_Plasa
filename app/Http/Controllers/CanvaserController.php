<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Models\Data;


class CanvaserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('data')
            ->select('id_data', 'nama_sales','created_at','updated_at', 'nama_site_lokasi','nama_pelangganktp', 'nik_ktp','alamat_instalasi','cp','cp_alternatif','email_pelanggan','linkreferral_sobatwarkop','datel','sto','produk','bandwidth','keterangan_discount','foto_lokasi', 'foto_ktp_pelanggan','foto_ktp_selfiepelanggan','koordinat_instalasi_pelanggan','kontak_isc', 'email_address',"ket_data")
            ->get();
        $sales = DB::table('sales')-> get();

        return view('canvasser.canvasser',[
            'datas' => $data,
            'saless' => $sales,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sales = DB::table('sales')-> get();
        $sto = DB::table('sto')-> get();
        $datel = DB::table('datel')-> get();
        $produk = DB::table('produk')-> get();
        $bandwidth = DB::table('bandwidth')-> get();
        $diskon = DB::table('diskon')-> get();

        return view('canvasser.CreateCanvasser',[
            'saless' => $sales,
            'stos' => $sto,
            'datels' => $datel,
            'produks' => $produk,
            'bandwidths' => $bandwidth,
            'diskons' => $diskon,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::table('data')->insert([
        //     'nama_sales' => $request->sales_select,
        //     'nama_site_lokasi' =>$request->site_lokasi,
        //     'nama_pelangganktp' =>$request->nama_pelanggan,
        //     'nik_ktp' => $request->nik_ktp,
        //     'alamat_instalasi' => $request->alamat_instalasi,
        //     'cp' => $request->cp_telfon,
        //     'cp_alternatif' => $request->cp_alternatif,
        //     'email_pelanggan' => $request->email_pelanggan,
        //     'linkreferral_sobatwarkop' => $request->linkreferral_sobatwarkop,
        //     'datel' => $request->datel_select,
        //     'sto' => $request->sto_select,
        //     'produk' => $request->produk_select,
        //     'bandwidth' => $request->bandwidth_select,
        //     'keterangan_discount' => $request->diskon_select,
        //     'foto_lokasi' => $request->foto_lokasi,
        //     'foto_ktp_pelanggan' => $request->foto_ktp_pelanggan,
        //     'foto_ktp_selfiepelanggan' => $request->foto_ktp_selfiepelanggan,
        //     'koordinat_instalasi_pelanggan' => $request->koordinat_instalasi_pelanggan,
        //     'kontak_isc' => $request->kontak_isc,
        //     'email_address' => $request->email_address,
        // ]);

        
        //trouble pada store data
        // $foto_lokasi = $request->file('foto_lokasi');
        // // $foto_lokasi -> store('public/files/lokasi');

        // $foto_ktp = $request->file('foto_ktp_pelanggan');
        // $foto_ktp -> store('public/files/ktp');

        // $foto_selfi = $request->file('foto_ktp_selfiepelanggan');
        // $foto_selfi -> store('public/files/selfie');
        Data::create([
            'nama_sales' => $request->sales_select,
            'tanggal_order' => $request->created_ad,
            'nama_site_lokasi' =>$request->site_lokasi,
            'nama_pelangganktp' =>$request->nama_pelanggan,
            'nik_ktp' => $request->nik_ktp,
            'alamat_instalasi' => $request->alamat_instalasi,
            'cp' => $request->cp_telfon,
            'cp_alternatif' => $request->cp_alternatif,
            'email_pelanggan' => $request->email_pelanggan,
            'linkreferral_sobatwarkop' => $request->linkreferral_sobatwarkop,
            'datel' => $request->datel_select,
            'sto' => $request->sto_select,
            'produk' => $request->produk_select,
            'bandwidth' => $request->bandwidth_select,
            'keterangan_discount' => $request->diskon_select,
            'foto_lokasi' => $request->foto_lokasi,
            'foto_ktp_pelanggan' => $request->foto_ktp_pelanggan,
            'foto_ktp_selfiepelanggan' => $request->foto_ktp_selfiepelanggan,
            'koordinat_instalasi_pelanggan' => $request->koordinat_instalasi_pelanggan,
            'kontak_isc' => $request->kontak_isc,
            'email_address' => $request->email_address,
        ]);

        return redirect()->route('canvasser.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('data')->where('id_data',$id)->first();

        $sales = DB::table('sales')-> get();
        $sto = DB::table('sto')-> get();
        $datel = DB::table('datel')-> get();
        $produk = DB::table('produk')-> get();
        $bandwidth = DB::table('bandwidth')-> get();
        $diskon = DB::table('diskon')-> get();

        return view('canvasser.EditCanvasser',[
            'saless' => $sales,
            'stos' => $sto,
            'datels' => $datel,
            'produks' => $produk,
            'bandwidths' => $bandwidth,
            'diskons' => $diskon,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DB::table('data')
        //     ->where('id_data', $id)
        //     ->update([
        //         'nama_sales' => $request->sales_select,
        //         'nama_site_lokasi' =>$request->site_lokasi,
        //         'nama_pelangganktp' =>$request->nama_pelanggan,
        //         'nik_ktp' => $request->nik_ktp,
        //         'alamat_instalasi' => $request->alamat_instalasi,
        //         'cp' => $request->cp_telfon,
        //         'cp_alternatif' => $request->cp_alternatif,
        //         'email_pelanggan' => $request->email_pelanggan,
        //         'linkreferral_sobatwarkop' => $request->linkreferral_sobatwarkop,
        //         'datel' => $request->datel_select,
        //         'sto' => $request->sto_select,
        //         'produk' => $request->produk_select,
        //         'bandwidth' => $request->bandwidth_select,
        //         'keterangan_discount' => $request->diskon_select,
        //         'foto_lokasi' => $request->foto_lokasi,
        //         'foto_ktp_pelanggan' => $request->foto_ktp_pelanggan,
        //         'foto_ktp_selfiepelanggan' => $request->foto_ktp_selfiepelanggan,
        //         'koordinat_instalasi_pelanggan' => $request->koordinat_instalasi_pelanggan,
        //         'kontak_isc' => $request->kontak_isc,
        //         'email_address' => $request->email_address,
        //     ]);

        $t=time();
        // echo($t . "<br>");
        // echo(date("Y-m-d",$t));
        // $foto_ktp_pelanggan = date("Y-m-d",$t)
        $data = [
            'nama_sales' => $request->sales_select,
            'nama_site_lokasi' =>$request->site_lokasi,
            'nama_pelangganktp' =>$request->nama_pelanggan,
            'nik_ktp' => $request->nik_ktp,
            'alamat_instalasi' => $request->alamat_instalasi,
            'cp' => $request->cp_telfon,
            'cp_alternatif' => $request->cp_alternatif,
            'email_pelanggan' => $request->email_pelanggan,
            'linkreferral_sobatwarkop' => $request->linkreferral_sobatwarkop,
            'datel' => $request->datel_select,
            'sto' => $request->sto_select,
            'produk' => $request->produk_select,
            'bandwidth' => $request->bandwidth_select,
            'keterangan_discount' => $request->diskon_select,
            'foto_lokasi' => $request->foto_lokasi,
            'foto_ktp_pelanggan' => $request->foto_ktp_pelanggan,
            'foto_ktp_selfiepelanggan' => $request->foto_ktp_selfiepelanggan,
            'koordinat_instalasi_pelanggan' => $request->koordinat_instalasi_pelanggan,
            'kontak_isc' => $request->kontak_isc,
            'email_address' => $request->email_address,
        ];
        print_r($data);

        Data::where('id_data', $id)
        ->update($data);
        
        return redirect()->route('canvasser.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('data')
            ->where('id_data', $id)
            ->delete();

        return redirect()->route('canvasser.index');
    }

    public function filter_data(Request $request)
    {
        if ($request->nama_sales){
            $data = DB::table('data')
            ->where('nama_sales', $request->nama_sales)
            ->get();
        }else {
            $data = DB::table('data')
            ->get();
        }

        $sales = DB::table('sales')-> get();

        return view('canvasser.canvasser',[
            'datas' => $data,
            'saless' => $sales,
        ]);
    }

    public function kirim_teknisi($data)
    {
        DB::table('data')
            ->where('id_data', $data)
            ->update([
                'ket_data' => '1',
            ]);
        return redirect()->route('canvasser.index');
    }
}
