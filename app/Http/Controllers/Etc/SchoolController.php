<?php

namespace App\Http\Controllers\Etc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{School, Dentistguest, Dentalrecord};

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('etc.school.index', [
            'schools' => School::get(),
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
            'sekolah' => 'required|max:100'
        ]);

        School::create([
            'sekolah' => $request->sekolah
        ]);
        return redirect()->route('dentist.school')->with('status', 'Sekolah berhasil ditambahkan');
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
        $school = School::findOrFail($id);
        return view('etc.school.edit', [
            'schools' => School::get(),
            'school' => $school,
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
        $school = School::findOrFail($id);
        $request->validate([
            'sekolah' => 'required|max:100'
        ]);

        School::where('id', $id)->update([
            'sekolah' => $request->sekolah
        ]);
        return redirect()->route('dentist.school')->with('status', 'Sekolah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $dentalrecords = Dentalrecord::where('school_id', $school->id)->get();
        if(count($dentalrecords)):
            return redirect()->route('dentist.school')->with('status', $school->sekolah.' tidak boleh dihapus');
        else:
            School::destroy($school->id);
            return redirect()->route('dentist.school')->with('status', $school->sekolah.' berhasil dihapus');
        endif;
    }
}
