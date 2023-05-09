<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Pegawai;
use App\Models\RewardPunishment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RewardPunishmentController extends Controller
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
        return view('reward-punishment/index', [
            'title' => 'Reward & Punishment',
            'dataRewardPunishment' => DB::table('reward_punishments')
                ->selectRaw('*, count(*) as total')
                ->groupBy('status', 'nama_bentuk', 'tanggal_sk')
                ->get(),
            'status' => RewardPunishment::status(),
            'dataPenerima' => RewardPunishment::all(),
            'dataPegawai' => Pegawai::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'nama_bentuk' => 'required',
            'tanggal_sk' => 'required',
            'scan_sk' => 'mimes:pdf|max:1024',
            'pegawai_id' => 'required'
        ]);
        if (request()->file('scan_sk')) {
            $validatedData['scan_sk'] = request()->file('scan_sk')->store('berkas-pegawai');
        } else {
            $validatedData['scan_sk'] = 0;
        }
        foreach ($request->pegawai_id as $item) {
            $validatedData['pegawai_id'] = $item;
            RewardPunishment::create($validatedData);
        }
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        RewardPunishment::destroy($id);
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
