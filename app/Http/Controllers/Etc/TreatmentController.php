<?php

namespace App\Http\Controllers\Etc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Treatment;
use App\Models\Dentalrecord;
use App\Models\Dentistguest;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('etc.treatment.index', [
            'treatments' => Treatment::get(),
            'dentistguests' => Dentistguest::where('cektahun', 1)->orderBy('tahun', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tindakan' => 'required|max:100'
        ]);

        Treatment::create([
            'tindakan' => $request->tindakan
        ]);
        return redirect()->route('dentist.treatment')->with('status', 'Tindakan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $treatment = Treatment::findOrFail($id);
        return view('etc.treatment.edit', [
            'treatments' => Treatment::get(),
            'treatment' => $treatment,
            'dentistguests' => Dentistguest::where('cektahun', 1)->orderBy('tahun', 'desc')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $treatment = Treatment::findOrFail($id);
        $request->validate([
            'tindakan' => 'required|max:100'
        ]);

        treatment::where('id', $id)->update([
            'tindakan' => $request->tindakan
        ]);
        return redirect()->route('dentist.treatment')->with('status', 'Tindakan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $treatment = Treatment::findOrFail($id);
        $dentalrecords = Dentalrecord::where('treatment_id', $treatment->id)->get();
        if(count($dentalrecords)):
            return redirect()->route('dentist.treatment')->with('status', $treatment->tindakan.' tidak boleh dihapus');
        else:
            Treatment::destroy($treatment->id);
            return redirect()->route('dentist.treatment')->with('status', $treatment->tindakan.' berhasil dihapus');
        endif;
    }
}
