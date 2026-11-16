<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transactions = Transaction::all();

        $totalPemasukan = Transaction::where('aruskas', 'income')->sum('nominal');
        $totalPengeluaran = Transaction::where('aruskas', 'outcome')->sum('nominal');
        $total = $totalPemasukan - $totalPengeluaran;

        return view('index', compact('transactions', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $data = $request->toArray();
        $data = $request->validate([
            '*' => 'required',
        ]);
        // dd($data);
        if (Transaction::create($data)) {
            return redirect()->to('/')->with('success', 'Catatan Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Catatan gagal ditambahkan');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $detailTransaction = Transaction::findorFail($id);

        return view('edit', compact('detailTransaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            '*' => 'required',
        ]);

        $transaction = Transaction::findorFail($id);
        $transaction->update($data);

        return redirect()->to('/')->with('success', 'Catatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if (Transaction::destroy($id)) {
            return redirect()->back()->with('success', 'Data Berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}
