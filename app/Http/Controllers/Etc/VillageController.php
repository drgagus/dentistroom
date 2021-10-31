<?php

namespace App\Http\Controllers\Etc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\Dentalrecord;
use App\Models\Dentistguest;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('etc.village.index', [
            'villages' => Village::get(),
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
            'desa' => 'required|max:100'
        ]);

        Village::create([
            'desa' => $request->desa
        ]);
        return redirect()->route('dentist.village')->with('status', 'Nama Desa/Kelurahan berhasil ditambahkan');
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
        $village = Village::findOrFail($id);
        return view('etc.village.edit', [
            'villages' => Village::get(),
            'village' => $village,
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
        $village = Village::findOrFail($id);
        $request->validate([
            'desa' => 'required|max:100'
        ]);

        Village::where('id', $id)->update([
            'desa' => $request->desa
        ]);
        return redirect()->route('dentist.village')->with('status', 'Nama Desa/Kelurahan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $village = Village::findOrFail($id);
        $dentalrecords = Dentalrecord::where('village_id', $village->id)->get();
        if(count($dentalrecords)):
            return redirect()->route('dentist.village')->with('status', $village->desa.' tidak boleh dihapus');
        else:
            Village::destroy($village->id);
            return redirect()->route('dentist.village')->with('status', $village->desa.' berhasil dihapus');
        endif;
    }
}
