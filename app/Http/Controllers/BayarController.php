<?php

namespace App\Http\Controllers;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Bayar;
use App\Http\Requests\BayarRequest;
use Illuminate\Http\Request;

class BayarController extends Controller
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
            $bayar = Bayar::whereHas('pasien', function ($query) use ($search) {
                $query->where('nama_pasien','like', '%' . $search . '%');
            })
            ->orWhereHas('dokter', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->orWhere('pembayaran', 'like', '%' . request()->search . "%" )
            ->orWhere('bayar', 'like', '%' . request()->search . "%" )
            ->latest()->paginate(6);
            return view('bayars.index',[
                'bayars' => $bayar
            ]);
    
    
            }
    
            else {
                return view('bayars.index', [
                'bayars' => Bayar::latest()->paginate(6),
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
        return view('bayars.create', [
            'bayar'=> new bayar,
            'pasiens'=> Pasien::latest()->get(), 
            'dokters'=> Dokter::latest()->get()
            ]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BayarRequest $request)
    {
        $attr = $request->all();

        Bayar::create($attr);

        session()->flash('success', 'Pembayaran telah di tambahkan');
        return redirect('bayar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function show(Bayar $bayar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function edit(Bayar $bayar)
    {
        return view('bayars.edit', ['bayar'=>  $bayar,'pasiens'=> Pasien::latest()->get(), 'dokters'=> Dokter::latest()->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function update(BayarRequest $request)
    {
        $input = $request->all();
        $query = Bayar::where('id', $request->id)->first();
        $query->update($input);
        session()->flash('success', 'The Pembayaran update');
        return redirect('bayar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bayar $bayar)
    {
        $input = request()->all();
        $query = Bayar::where('id', request()->id)->first();
        $query->delete($input);
        session()->flash('success', 'The Pembayaran destroy');
        return redirect('bayar');
    }
}
