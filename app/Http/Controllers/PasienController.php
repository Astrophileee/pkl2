<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Requests\PasienRequest;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->has('search')){
        $pasien = Pasien::where('nama_pasien', 'like', '%' . request()->search . "%", )->orWhere('jenis_kelamin', 'like', '%' . request()->search . "%", )->orWhere('alamat', 'like', '%' . request()->search . "%", )->latest()->paginate(6);
        return view('pasiens.index',[
            'pasiens' => $pasien
        ]);


        }
        else {
            return view('pasiens.index', [
            'pasiens' => Pasien::latest()->paginate(6),
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
        return view('pasiens.create', ['pasien' => new Pasien()]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PasienRequest $request)
    {
        $attr = $request->all();

        Pasien::create($attr);

        session()->flash('success', 'Pasien telah di tambahkan');
        return redirect('pasien');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        return view('pasiens.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(PasienRequest $request)
    {
        $input = $request->all();
        $query = Pasien::where('id', $request->id)->first();
        $query->update($input);
        session()->flash('success', 'Pasien Telah Di Update');
        return redirect('pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        // dd(request()->id);
        $input = request()->all();
        $query = Pasien::where('id', request()->id)->firstOrFail();
        $query->delete($input);
        session()->flash('success', 'The Pasien destroy');
        return redirect('pasien');

    }

    
    
}
