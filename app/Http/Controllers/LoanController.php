<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{

    public function view() {
        return view('home',['showForm' => false]);
    }

    public function offer() {
        $loans = Loan::where('borrower_id', Auth::id())->get();
        return view('offer',['loans' => $loans]);
    }

    public function form() {
        return view('home', ['showForm' => true]);
    }

    public function store(Request $request){
         $loans = $request->validate([
            'jumlah' => 'required|max:100',
            'tenor' => 'required',
            'tujuan' => 'required|max:200'
        ]);

        $loans['borrower_id'] = Auth::id();

        Loan::create($loans);

        return redirect('/home')->with('success', 'Pengajuan berhasil diajukan, saat ini pengajuanmu sedang menunggu persetujuan. lihat penawaran untuk membuka pengajuanmu');
    }
}
