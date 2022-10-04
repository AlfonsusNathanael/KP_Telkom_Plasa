<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminTeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::table('data')
        ->select('id_data', 'tanggal_order','created_at','updated_at','nama_site_lokasi','produk', 'no_sc','status_sc','ket_detail_sc','alamat_instalasi','cp','datel','sto','keterangan_lme','validasi_wo','ket_detaillme','teknisi','mitra','odp_survey','tag_odp','port', 'sn_ont','tag_pelanggan','sto','sn_ap', 'mac_ap', 'tanggal_progres')
        ->where('ket_data',1)
        ->get();

        return view('adminteknisi.adminteknisi',[
            'datas' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $sto = DB::table('sto')->get();
        $ket_lmes = DB::table('ket_lme')->get();
        return view('adminteknisi.EditTeknisi',[
            'data' =>$data,
            'ket_lmes' =>$ket_lmes,
            'stos' =>$sto,
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
        DB::table('data')
        ->where('id_data', $id)
        ->update([
            'keterangan_lme' => $request->ket_lme,
            'ket_detaillme' => $request->ket_detaillme,
            'validasi_wo' => $request->validasi_wo,
            'teknisi' => $request->teknisi,
            'mitra' =>$request->mitra,
            'odp_survey' =>$request->odp,
            'tag_odp' =>$request->tag_dop,
            'port' =>$request->port,
            'sn_ont' =>$request->sn_ont,
            'tag_pelanggan' =>$request->tag_pelanggan,
            'sn_ap' =>$request->sn_ap,
            'mac_ap' =>$request->mac_ap,
            'tanggal_progres' =>$request->tanggal_proses,
        ]);

    return redirect()->route('teknisi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter_data(Request $request)
    {


        $filter = DB::table('data')
        ->select('id_data', 'tanggal_order','created_at','updated_at','nama_site_lokasi','produk', 'no_sc','status_sc','ket_detail_sc','alamat_instalasi','cp','datel','sto','keterangan_lme','validasi_wo','ket_detaillme','teknisi','mitra','odp_survey','tag_odp','port', 'sn_ont','tag_pelanggan','sto','sn_ap', 'mac_ap', 'tanggal_progres');

        if ($request->nama_keterangan){
            $filter->leftJoin('ket_lme','ket_lme.ket_lme','=','data.keterangan_lme');
            if ($request->nama_keterangan == 'progres'){
                $filter->whereNull('keterangan_lme');
            }else {
                $filter->where('ket_lme.keterangan',$request->nama_keterangan);
            }
        }

        $data = $filter->get();

        return view('adminteknisi.adminteknisi',[
            'datas' => $data,
        ]);
    }
}
