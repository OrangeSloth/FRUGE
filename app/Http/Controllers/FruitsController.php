<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Input;
use Illuminate\Support\Facades\Auth;
use App\Fruit;

class FruitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $fruits = Fruit::all();
        return view('fruits', compact('fruits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('fruitsForm');
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
            'name' => 'required|max:255',
            'quantity' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/fruit/', $filename);
        }

        Fruit::create([
            'name' => $request['name'],
            'quantity' => $request['quantity'],
            'image' => $filename,
        ]);

        return redirect()->route('fruitsStok')->with('status', 'Buah Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fruit $fruit)
    {
        return view('fruits.show', compact('fruit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fruit $fruit)
    {
        return view('fruitsEditForm', compact('fruit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fruit $fruit)
    {
        $request->validate([
            'name' => 'required|max:255',
            'quantity' => 'required|numeric',
        ]);

        Fruit::where('id', $fruit->id)->update([
            'name' => $request->name,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('fruitsStok')->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fruit::destroy($id);

        return redirect()->route('fruitsStok')->with('status', 'Fruit Deleted!');
    }
}
