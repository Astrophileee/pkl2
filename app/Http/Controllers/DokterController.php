<?php

namespace App\Http\Controllers;

use App\Http\Requests\DokterRequest;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->has('search')){
            $dokter = Dokter::where('nama', 'like', '%' . request()->search . "%")
            ->orWhere('no_izin', 'like', '%' . request()->search . "%", )
            ->orWhere('alamat', 'like', '%' . request()->search . "%", )
            ->latest()->paginate(6);
            return view('dokters.index',[
                'dokters' => $dokter
            ]);
    
    
            }
    
            else {
                return view('dokters.index', [
                'dokters' => Dokter::latest()->paginate(6),
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
        return view('dokters.create', ['dokter' => new Dokter()]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DokterRequest $request)
    {
        $attr = $request->all();

        Dokter::create($attr);

        session()->flash('success', 'Dokter telah di tambahkan');
        return redirect('dokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        return view('dokters.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(DokterRequest $request)
    {
        $input = $request->all();
        $query = Dokter::where('id', $request->id)->first();
        $query->update($input);
        session()->flash('success', 'The Pasien update');
        return redirect('dokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $input = request()->all();
        $query = Dokter::where('id', request()->id)->first();
        $query->delete($input);
        session()->flash('success', 'The Pasien destroy');
        return redirect('dokter');
    }
}
