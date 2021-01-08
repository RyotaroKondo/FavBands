<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\Category;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bands = Band::latest()->paginate(5);
        return view('band.index', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('band.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'url'=>'required',
            'image'=>'required|mimes:png,jpeg,jpg',
            'category'=>'required',
        ]);
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/band_images');
        $image->move($destinationPath, $name);
        Band::create([
            'name'=>$request->get('name'),
            'description'=>$request->get('description'),
            'url'=>$request->get('url'),
            'image'=>$name,
            'category_id'=>$request->get('category'),
        ]);
        return redirect()->route('band.index')->with('message', 'バンドを追加しました。');
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
        //
        $band = Band::find($id);
        return view('band.edit', compact('band'));
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
        //
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'url'=>'required',
            'image'=>'mimes:png,jpeg,jpg',
            'category'=>'required',
        ]);
        $band = Band::find($id);
        $name = $band->image;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/band_images');
            $image->move($destinationPath, $name);
        }
        $band->name = $request->get('name');
        $band->description = $request->get('description');
        $band->url = $request->get('url');
        $band->image = $name;
        $band->category_id = $request->get('category');
        
        $band->save();
        return redirect()->route('band.index')->with('message', 'バンド情報を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $band = Band::find($id);
        $band->delete();
        return redirect()->route('band.index')->with('message', 'バンドを削除しました。');
    }
    
    public function listBand(){
        $categories = Category::with('band')->get();
        return view('band.list', compact('categories'));
    }

    public function view($id){
        $band = Band::find($id);
        return view('band.detail', compact('band'));
    }

}
