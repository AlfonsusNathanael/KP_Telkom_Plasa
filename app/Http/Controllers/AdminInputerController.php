<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AdminInputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('data')
        ->select('id_data', 'nama_sales','nama_site_lokasi','created_at','updated_at','produk', 'nama_pelangganktp','keterangan_lme','odp_survey','ket_detaillme', 'tanggal_order','no_sc','status_sc','ket_detail_sc')
        ->leftJoin('ket_lme','ket_lme.ket_lme','=','data.keterangan_lme')
        ->where('ket_lme.keterangan','selesai')
        ->get();

        return view('admininputer.admininputer',[
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
        return view('admininputer.CreateInputer');
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
        //     'no_sc' => $request->no_sc,
        //     'status_sc' =>$request->status_sc,
        //     'ket_detail_sc' =>$request->ket_detail_sc,
        // ]);

        // return redirect()->route('inputer.index');
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
        $status_sc=DB::table('status_sc')->get();
        return view('admininputer.EditInputer',[
            'data'=>$data,
            'status_scs'=>$status_sc
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
                'no_sc' => $request->no_sc,
                'status_sc' =>$request->status_sc,
                'ket_detail_sc' =>$request->ket_detail_sc,
            ]);

        return redirect()->route('inputer.index');
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

    public function approve_data($data)
    {
        DB::table('data')
            ->where('id_data', $data)
            ->update([
                'ket_data' => 'selesai',
            ]);
        return redirect()->route('inputer.index');
    }

    public function cancel_data($data)
    {
        DB::table('data')
            ->where('id_data', $data)
            ->update([
                'ket_data' => 'batal',
            ]);
        return redirect()->route('inputer.index');
    }
}
