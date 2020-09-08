<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = 'add';
        $method = 'POST';
        $data = '';
        return view('pendaftaran', compact('data', 'action', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $insert = Mahasiswa::create($request->except(['_token']));

            if ($insert) {
                DB::commit();
                Session::flash('success', 'Data Berhasil Diinputkan!'); 
                return redirect()->route('home')->with(['success', 'Data Berhasil Diinputkan!']);
            } else {
                DB::rollback();
                Session::flash('failed', 'Data Gagal Diinputkan!'); 
                return redirect()->route('home')->with(['failed', 'Data Gagal Diinputkan!']);
            }
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('error', 'Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()); 
            return redirect()->route('home')->with(['error', 'Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $action = 'update';
        $method = 'patch';
        $data = Mahasiswa::find($request->id);
        return view('pendaftaran', compact('data', 'action', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // dd($request->except(['_token', '_method', 1]));
        try {
            DB::beginTransaction();
            $update = Mahasiswa::where('id', $request->id)->update($request->except(['_token', '_method', 1]));

            if ($update) {
                DB::commit();
                Session::flash('success', 'Data Berhasil Diubah!'); 
                return redirect()->route('home')->with(['success', 'Data Berhasil Diubah!']);
            } else {
                DB::rollback();
                Session::flash('failed', 'Data Gagal Diinputkan!'); 
                return redirect()->route('home')->with(['failed', 'Data Gagal Diubah!']);
            }
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('error', 'Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()); 
            return redirect()->route('home')->with(['error', 'Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = Mahasiswa::findOrFail($request->id);
            $delete  = $data->delete();
            if ($delete) {
                DB::commit();
                Session::flash('success', 'Data Berhasil Dihapus!'); 
                return redirect()->route('home')->with(['success', 'Data Berhasil Dihapus!']);
            } else {
                DB::rollback();
                Session::flash('failed', 'Data Gagal Diinputkan!'); 
                return redirect()->route('home')->with(['failed', 'Data Gagal Dihapus!']);
            }
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('error', 'Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()); 
            return redirect()->route('home')->with(['error', 'Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()]);
        }
    }
}
