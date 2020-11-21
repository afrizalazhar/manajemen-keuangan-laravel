<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemasukan;
use Illuminate\Support\Facades\Validator;

class KeuanganController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'jenis_pemasukan' => ['required', 'string', 'max:255'],
            'jumlah' => ['required', 'string']
        ]);
    }

    public function inputKeuangan()
    {
        return view('pages.keuangan.input_pemasukan');
    }

    public function storePemasukan(Request $request)
    {
        $this->validator($request->all())->validate();
        $data = $request->except("_token");
        $data["user_id"] = $request->user()->id;
        $pemasukan = Pemasukan::create($data);
        
        return redirect()->back()->withInput();
    }

    public function getRiwayatPemasukan()
    {
        $times = date('Y-m-d', strtotime('-7 days'));
        $data = Pemasukan::where('created_at', '>=', $times)->limit(7)->get();
        return view('components.input_keuangan.history', ["histories"=>$data]);
    }
}
