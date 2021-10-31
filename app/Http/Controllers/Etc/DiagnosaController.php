<?php

namespace App\Http\Controllers\Etc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Diag, Dentistguest, Dentalrecord};

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('etc.diagnosa.index', [
            'diags' => Diag::get(),
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
            'kode' => 'required|max:20',
            'diagnosa' => 'required|max:255'
        ]);

        Diag::create([
            'kode' => $request->kode,
            'diagnosa' => $request->diagnosa,
            'onoff' => 1
        ]);
        return redirect()->route('dentist.diagnosa')->with('status', 'Diagnosa berhasil ditambahkan');
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
        $diagnosa = Diag::findOrFail($id);
        return view('etc.diagnosa.edit', [
            'diags' => Diag::get(),
            'diagnosa' => $diagnosa,
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
        $diagnosa = Diag::findOrFail($id);
        $request->validate([
            'kode' => 'required|max:20',
            'diagnosa' => 'required|max:255'
        ]);

        Diag::where('id', $id)->update([
            'kode' => $request->kode,
            'diagnosa' => $request->diagnosa
        ]);
        return redirect()->route('dentist.diagnosa')->with('status', 'Diagnosa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diagnosa = Diag::findOrFail($id);
        $dentalrecords = Dentalrecord::where('diag_id', $diagnosa->id)->get();
        if(count($dentalrecords)):
            return redirect()->route('dentist.diagnosa')->with('status', $diagnosa->diagnosa.' tidak boleh dihapus');
        else:
            Diag::destroy($diagnosa->id);
            return redirect()->route('dentist.diagnosa')->with('status', $diagnosa->diagnosa.' berhasil dihapus');
        endif;
    }

    public function onoff($id)
    {
        $diagnosa = Diag::findOrFail($id);
        if ($diagnosa->onoff == 1):
            Diag::where('id', $id)->update([
                'onoff' => 0
            ]);
            return redirect()->route('dentist.diagnosa')->with('status', $diagnosa->diagnosa.' berhasil disembunyikan');
        else:
            Diag::where('id', $id)->update([
                'onoff' => 1
            ]);
            return redirect()->route('dentist.diagnosa')->with('status', $diagnosa->diagnosa.' berhasil ditampilkan');
        endif;
    }
}
