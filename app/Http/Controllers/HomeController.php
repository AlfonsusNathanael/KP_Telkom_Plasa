<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Datel;
use App\Models\Sales;


class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function data_report_input()
    {
        $data = new Data();
        $sales = Sales::select('nama_sales')->get();

        $Daftardata = array();
        for ($key = 0; $key < count($sales); $key++){
            $Daftardata[] = array( "data" => count($data->bySales($sales[$key]->nama_sales)),
                                   "ps" => count($data->bySalesComplete($sales[$key]->nama_sales)),
                                   "user" => $sales[$key]->nama_sales
                                );
        }

        $hasil = array(
            'data' => $Daftardata,
        );

        return $hasil;


    }

    public function filter_report_input(Request $request)
    {
        $startDate = $request->start_date_filter;
        $endDate = $request->end_date_filter;

        $data = new Data();
        $sales = Sales::select('nama_sales')->get();

        $Daftardata = array();

        if ($startDate == $endDate){
            for ($key = 0; $key < count($sales); $key++){
                $Daftardata[] = array( "data" => count($data->bySalesFilterSama($sales[$key]->nama_sales,$startDate)),
                                        "ps" => count($data->bySalesFilterComplete($sales[$key]->nama_sales,$startDate)),
                                        "user"=>$sales[$key]->nama_sales
                                    );
            }
        }else {
            for ($key = 0; $key < count($sales); $key++){
                $Daftardata[] = array( "data" => count($data->bySalesFilter($sales[$key]->nama_sales,$startDate,$endDate)),
                                        "ps" => count($data->bySalesFilterComplete($sales[$key]->nama_sales,$startDate,$endDate)),
                                        "user"=>$sales[$key]->nama_sales
                                    );
            }
        }

        $data = array(
            'data' => $Daftardata,
        );

        return $data;

    }

    public function data_report_ps()
    {
        $data = new Data();
        $sales = Sales::select('nama_sales')->get();

        $Daftardata = array();
        for ($key = 0; $key < count($sales); $key++){
            $Daftardata[] = array( "data" => count($data->bySalesComplete($sales[$key]->nama_sales)),
                                   "user" => $sales[$key]->nama_sales
                                );
        }

        $hasil = array(
            'data' => $Daftardata,
        );

        return $hasil;


    }

    public function filter_report_ps(Request $request)
    {
        $startDate = $request->start_date_filter;
        $endDate = $request->end_date_filter;

        $data = new Data();
        $sales = Sales::select('nama_sales')->get();

        $Daftardata = array();

        for ($key = 0; $key < count($sales); $key++){
            $Daftardata[] = array( "data" => count($data->bySalesFilterComplete($sales[$key]->nama_sales,$startDate,$endDate)),
                                    "user"=>$sales[$key]->nama_sales
                                );
        }

        $data = array(
            'data' => $Daftardata,
        );

        return $data;

    }

    public function data_report_monitor()
    {
        $data = new Data();
        $datel = Datel::select('nama_datel')->get();

        $Daftardata = array();
        for ($key = 0; $key < count($datel); $key++){
            $Daftardata[] = array( "total wo" => count($data->TotalWo($datel[$key]->nama_datel)),
                                   "on progess" => count($data->OnProgess($datel[$key]->nama_datel)),
                                   "alpro ready" => count($data->AlproReady($datel[$key]->nama_datel)),
                                   "propose construction" => count($data->ProposeConstruction($datel[$key]->nama_datel)),
                                   "propose maintenance" => count($data->ProposeMaintenance($datel[$key]->nama_datel)),
                                   "kendala nte" => count($data->KendalaNTE($datel[$key]->nama_datel)),
                                   "kendala alpro" => count($data->KendalaAlpro($datel[$key]->nama_datel)),
                                   "anomali order" => count($data->AnomaliOrder($datel[$key]->nama_datel)),
                                   "cancelByCuztomer" => count($data->CancelByCuztomer($datel[$key]->nama_datel)),
                                   "CuztomerHandicap" => count($data->CuztomerHandicap($datel[$key]->nama_datel)),
                                   "LmeokOntok" => count($data->LmeokOntok($datel[$key]->nama_datel)),
                                   "LmeokOntokApok" => count($data->LmeokOntokApok($datel[$key]->nama_datel)),
                                   "TotalClear" => count($data->TotalClear($datel[$key]->nama_datel)),
                                   "KetBelumInputSC" => count($data->KetBelumInputSC($datel[$key]->nama_datel)),
                                   "KetFCC" => count($data->KetFCC($datel[$key]->nama_datel)),
                                   "KetOntTidakDetect" => count($data->KetOntTidakDetect($datel[$key]->nama_datel)),
                                   "KetApTidakDetect" => count($data->KetApTidakDetect($datel[$key]->nama_datel)),
                                   "KetOgpPS" => count($data->KetOgpPS($datel[$key]->nama_datel)),
                                   "KetCompleted" => count($data->KetCompleted($datel[$key]->nama_datel)),
                                   "datel" => $datel[$key]->nama_datel
                                );
        }

        $hasil = array(
            'data' => $Daftardata,
        );

        return $hasil;
    }
}


