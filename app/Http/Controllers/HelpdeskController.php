<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('data')
        ->select('id_data', 'nama_site_lokasi','created_at','updated_at','produk', 'keterangan_lme', 'ket_detaillme', 'tanggal_order', 'tanggal_progres', 'ip_olt', 'gpon_olt', 'port_olt', 'ap_name', 'tgl_close', 'belum_input_sc', 'ket_helpdesk')
        ->leftJoin('ket_lme','ket_lme.ket_lme','=','data.keterangan_lme')
        ->where('ket_lme.keterangan','selesai')
        ->get();

        return view('helpdesk.helpdesk',[
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
        $beluminputsc = DB::table('beluminputsc')->get();
        return view('helpdesk.edithelpdesk',[
            'data'=>$data,
            'beluminputscs' =>$beluminputsc
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
                'ip_olt' => $request->ip_olt,
                'gpon_olt' =>$request->gpon_olt,
                'port_olt' =>$request->port_olt,
                'ap_name' =>$request->ap_name,
                'tgl_close' =>$request->tgl_close,
                'belum_input_sc' =>$request->belum_input_sc,
                'ket_helpdesk' =>$request->ket_helpdesk,
            ]);

        return redirect()->route('helpdesk.index');
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
}
