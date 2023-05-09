<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pegawai;
use App\Models\Pelatihan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('failed')) {
                Alert::error(session('failed'));
            }

            return $next($request);
        });
    }

    public function index()
    {
        return view('pelatihan/index', [
            'title' => 'Data Pelatihan',
            'dataPelatihan' => DB::table('pelatihans')
                ->selectRaw('*, count(*) as total')
                ->groupBy('nama_pelatihan', 'sifat_pelatihan', 'tanggal_mulai', 'tanggal_berakhir')
                ->get(),
            'dataPesertaPelatihan' => Pelatihan::all(),
            'dataPegawai' => Pegawai::all(),
            'sifatPelatihan' => Pelatihan::sifatPelatihan(),
        ]);
    }

    public function storePelatihan(Request $request)
    {
        $validatedData = $request->validate([
            'pegawai_id' => 'required',
            'nama_pelatihan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_berakhir' => 'required',
            'sifat_pelatihan' => 'required',
        ]);
        foreach ($request->pegawai_id as $item) {
            $validatedData['pegawai_id'] = $item;
            Pelatihan::create($validatedData);
        }
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function showPelatihan($id)
    {
        $pelatihan = Pelatihan::find($id);
        return view('pelatihan/show-pelatihan', [
            'title' => 'Data Pelatihan',
            'pelatihan' => $pelatihan,
        ]);
    }


    public function destroyPelatihan($id)
    {
        Pelatihan::destroy($id);
        return back()->with('success', 'Data Berhasil dihapus!');
    }
}
