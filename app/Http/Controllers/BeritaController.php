<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BeritaController;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $beritas = Berita::all();

        return view('welcome', compact('beritas'));

    }
   
    public function index(Request $request)
    {
        if(!session()->has('key')) {
            return redirect()->route('login')->with('error', 'Silahkan login');
        }
       $berita = Berita::query();

       if($request->filled('search')) {
        $berita->where('judul', 'like', '%'. $request->search. '%');
       }
       $berita= $berita->paginate(5);
       return view('berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();

        return view('berita.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $gambar = $request->file('gambar')->store('images', 'public');
       $input = $request->all();
       $input['gambar'] = "$gambar";
       $input['penulis_id'] = session('key.0.id');

       Berita::create($input);

       return redirect()->route('berita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::find($id);

        return view('detail', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        $kategori = Kategori::all();
        return view('berita.edit', compact('berita', 'kategori'));
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
        $berita = Berita::find($id);
        $request->validate([
            'judul' =>'required',
            'isi' =>'required',
            'tgl' =>'required',
            'kategori_id' =>'required'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar', 'public');
        }

        $berita->judul  =$request->judul;
        $berita->isi =$request->isi;
        $berita->tgl  =$request->tgl;
        $berita->kategori_id  =$request->kategori_id;
        $berita->save();

        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $berita = Berita::find($id);
     $berita->delete();
     return redirect()->route('berita.index');
    }
}
