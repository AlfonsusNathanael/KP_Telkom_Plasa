<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Data extends Model
{
    use HasFactory;
    protected $table="data";
    protected $primaryKey = "id_data ";
    protected $fillable = [
        'nama_sales',
        'nama_site_lokasi',
        'nama_pelangganktp',
        'nik_ktp',
        'alamat_instalasi',
        'cp',
        'cp_alternatif',
        'email_pelanggan',
        'linkreferral_sobatwarkop',
        'datel',
        'sto',
        'produk',
        'bandwidth',
        'keterangan_discount',
        'foto_lokasi',
        'foto_ktp_pelanggan',
        'foto_ktp_selfiepelanggan',
        'koordinat_instalasi_pelanggan',
        'kontak_isc',
        'email_address',
        'validasi_wo',
        'keterangan_lme',
        'odp_survey',
        'ket_detaillme',
        'teknisi',
        'mitra',
        'tag_odp',
        'port',
        'sn_ont',
        'tag_pelanggan',
        'sn_ap',
        'mac_ap',
        'tanggal_progres',
        'tanggal_order',
        'no_sc',
        'status_sc',
        'ket_detail_sc',
        'ket_data',
    ];

    public function bySales($sales = '')
    {
        return DB::table($this->table)->where('nama_sales', '=', $sales)->get();
    }

    public function bySalesFilter($sales = '', $tglAwal = '', $tglAkhir = '')
    {
        return DB::table($this->table)->where('nama_sales', '=', $sales)->where('created_at','>=',$tglAwal)->where('created_at','<=',$tglAkhir)->get();
    }

    public function bySalesFilterSama($sales = '', $tglAwal = '')
    {
        return DB::table($this->table)->where('nama_sales', '=', $sales)->where('created_at','=',$tglAwal)->get();
    }

    public function bySalesComplete($sales = '')
    {
        return DB::table($this->table)->where('nama_sales', '=', $sales)->where('status_SC','COMPLETED')->get();
    }

    public function bySalesFilterComplete($sales = '', $tglAwal = '', $tglAkhir = '')
    {
        return DB::table($this->table)->where('nama_sales', '=', $sales)->where('created_at','>=',$tglAwal)->where('created_at','<=',$tglAkhir)->where('status_SC','COMPLETED')->get();
    }

    public function TotalWo($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->get();
    }

    public function OnProgess($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->whereNotNull('keterangan_lme')->get();
    }

    public function AlproReady($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('keterangan_lme','like','%ALPRO READY%')->get();
    }

    public function ProposeConstruction($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('keterangan_lme','like','%PROPOSE CONSTRUCTION%')->get();
    }

    public function ProposeMaintenance($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('keterangan_lme','like','%PROPOSE MAINTENANCE%')->get();
    }

    public function KendalaNTE($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('keterangan_lme','like','%KENDALA NTE%')->get();
    }

    public function KendalaAlpro($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('keterangan_lme','like','%KENDALA ALPRO%')->get();
    }

    public function AnomaliOrder($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('keterangan_lme','like','%ANOMALI ORDER%')->get();
    }

    public function CancelByCuztomer($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('keterangan_lme','like','%CANCEL BY CUSTOMER%')->get();
    }

    public function CuztomerHandicap($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('keterangan_lme','like','%CUSTOMER HANDICAP%')->get();
    }

    public function LmeokOntok($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('keterangan_lme','LME OK - ONT OK')->get();
    }

    public function LmeokOntokApok($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('keterangan_lme','LME OK - ONT OK - AP OK')->get();
    }

    public function TotalClear($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('keterangan_lme','like','%LME OK%')->get();
    }

    public function KetBelumInputSC($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('belum_input_sc','Belum Input SC')->get();
    }

    public function KetFCC($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('belum_input_sc','FCC')->get();
    }

    public function KetOntTidakDetect($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('belum_input_sc','ONT Tidak Detect')->get();
    }

    public function KetApTidakDetect($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('belum_input_sc','AP Tidak Detect')->get();
    }

    public function KetOgpPS($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('belum_input_sc','OGP PS')->get();
    }

    public function KetCompleted($datel = '')
    {
        return DB::table($this->table)->where('datel',$datel)->where('belum_input_sc','COMPLETED')->get();
    }
}
