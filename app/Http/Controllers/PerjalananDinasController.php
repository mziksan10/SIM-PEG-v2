<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pegawai;
use App\Models\PerjalananDinas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PerjalananDinasController extends Controller
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
        return view('perjalanan-dinas/index', [
            'title' => 'Perjalanan Dinas',
            'dataPerjalananDinas' => DB::table('perjalanan_dinas')
                ->selectRaw('*, count(*) as total')
                ->groupBy('keperluan', 'tempat_tujuan', 'anggaran', 'tanggal_berangkat', 'tanggal_kembali')
                ->get(),
            'dataPegawaiPerjalananDinas' => PerjalananDinas::all(),
            'dataPegawai' => Pegawai::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData  = $request->validate([
            'keperluan' => 'required',
            'tempat_tujuan' => 'required',
            'alat_transportasi' => 'required',
            'anggaran' => 'required',
            'tanggal_berangkat' => 'required',
            'tanggal_kembali' => 'required',
            'pegawai_id' => 'required',
        ]);
        foreach ($request->pegawai_id as $item) {
            $validatedData['pegawai_id'] = $item;
            PerjalananDinas::create($validatedData);
        }
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        PerjalananDinas::destroy($id);
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
