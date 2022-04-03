<?php

namespace App\Http\Controllers;


use App\Http\Requests\PemeriksaanRequest;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->has('search')){
            $search = request()->search;
            $pemeriksaan = Pemeriksaan::whereHas('pasien', function ($query) use ($search) {
                $query->where('nama_pasien', 'like', '%' . $search . '%');
            })
            ->orWhereHas('dokter', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->orWhere('poli', 'like', '%' . request()->search . "%" )
            ->orWhere('keluhan', 'like', '%' . request()->search . "%" )
            ->orWhere('diagnosa', 'like', '%' . request()->search . "%" )
            ->orWhere('obat', 'like', '%' . request()->search . "%" )
            ->latest()->paginate(6);
            return view('pemeriksaans.index',[
                'pemeriksaans' => $pemeriksaan
            ]);
    
    
            }
    
            else {
                return view('pemeriksaans.index', [
                'pemeriksaans' => Pemeriksaan::latest()->paginate(6),
            ]);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemeriksaans.create', ['pemeriksaan'=> new pemeriksaan,'pasiens'=> Pasien::latest()->get(), 'dokters'=> Dokter::latest()->get()]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PemeriksaanRequest $request)
    {
        $attr = $request->all();

        Pemeriksaan::create($attr);

        session()->flash('success', 'Pemeriksaan telah di tambahkan');
        return redirect('pemeriksaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemeriksaan $pemeriksaan)
    {
        return view('pemeriksaans.edit', ['pemeriksaan'=>  $pemeriksaan,'pasiens'=> Pasien::latest()->get(), 'dokters'=> Dokter::latest()->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function update(PemeriksaanRequest $request)
    {
        $input = $request->all();
        $query = Pemeriksaan::where('id', $request->id)->first();
        $query->update($input);
        session()->flash('success', 'The Pemeriksaan update');
        return redirect('pemeriksaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeriksaan $pemeriksaan)
    {
        $input = request()->all();
        $query = Pemeriksaan::where('id', request()->id)->first();
        $query->delete($input);
        session()->flash('success', 'The Pemeriksaan destroy');
        return redirect('pemeriksaan');
    }
}
