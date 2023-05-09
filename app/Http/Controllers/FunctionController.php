<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\RiwayatPendidikan;


class FunctionController extends Controller
{
    public function cariKota(Request $request)
    {
        $getKota = DB::select("SELECT city_name, city_id FROM cities WHERE prov_id = '$request->provinsi' ORDER BY city_name ASC");
        return response()->json($getKota);
    }

    public function cariKecamatan(Request $request)
    {
        $getKecamatan = DB::select("SELECT dis_name, dis_id FROM districts WHERE city_id = '$request->kab_kota' ORDER BY dis_name ASC");
        return response()->json($getKecamatan);
    }

    public function cariDesa(Request $request)
    {
        $getDesa = DB::select("SELECT subdis_name, subdis_id FROM subdistricts WHERE dis_id = '$request->kecamatan' ORDER BY subdis_name ASC");
        return response()->json($getDesa);
    }

    public function cariJabatan(Request $request)
    {
        $jabatan_id = Jabatan::where('bidang_id', $request->get('bidang_id'))->pluck('nama_jabatan', 'id');
        return response()->json($jabatan_id);
    }

    public function cariGolongan(Request $request)
    {
        $getPegawai = Pegawai::select('*')->where('nip', $request->get('nip'))->first();
        $getJenjang = RiwayatPendidikan::select('*')->where('pegawai_id', $getPegawai->id)->latest()->first();
        if ($getPegawai->status == 1) {
            $status = "Tetap";
        } elseif ($getPegawai->status == 2 || $getPegawai->status == 3) {
            $status = "Kontrak";
        }
        $golongan_id = Golongan::where('jenjang', $getJenjang->jenjang)->where('status', $status)->where('min_masa_kerja', '>=',  $request->get('lama_bekerja'))->get();
        return response()->json($golongan_id);
    }

    public function cariPegawai(Request $request)
    {
        $pegawai = Pegawai::orderby('nama', 'asc')->select('nip', 'nama')->where('nip', 'like', '%' . $request->search . '%')->limit(5)->get();
        $response = array();
        foreach ($pegawai as $item) {
            $response[] = array("value" => $item->nip, "label" => $item->nip . ' - ' . $item->nama);
        }

        return response()->json($response);
    }
}
