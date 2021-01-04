<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Request as ModelRequest;
use App\Fruit;

use function GuzzleHttp\Promise\all;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fruits = Fruit::all();
        return view('userIndex', compact('fruits'));
    }

    public function adminIndex()
    {
        $requests = ModelRequest::join('users', 'users.id', '=', 'request.user_id')
        ->join('fruits', 'fruits.id', '=', 'request.fruit_id')
        ->select('request.*','users.name', 'fruits.name as nama')
        ->groupBy('request.id')
        ->get();

        return view('adminIndex', compact('requests'));
    }

    public function permintaan()
    {
        $requests = ModelRequest::join('fruits', 'fruits.id', '=', 'request.fruit_id')
        ->select('request.*','fruits.*')
        ->groupBy('request.id')
        ->get();

        return view('requests', compact('requests'));
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
            'amount' => 'required|numeric|max:'. $request->validation_qty,
            'is_accepted' => 'required',
            'user_id' => 'required',
            'fruit_id' => 'required',
        ]);

        ModelRequest::create([    
            'amount' => $request->amount,
            'is_accepted' => $request->is_accepted,
            'user_id' =>  $request->user_id,
            'fruit_id' => $request->fruit_id,
        ]);
        return redirect()->route('user.permintaan')->with('status', 'Permintaan dibuat!');
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
        $request->validate([
            'is_accepted' => 'required|max:2',
            'amount' => 'numeric',
        ]);

        ModelRequest::where('id', $id)->update([
            'is_accepted' => $request->is_accepted,
        ]);
        
        $fruitID = ModelRequest::where('id', $id)->select('fruit_id')->first();

        $fruitQuantity = Fruit::where('id', $fruitID->fruit_id)->select('quantity')->first();

        Fruit::where('id', $fruitID->fruit_id)->update([
          'quantity' =>  $fruitQuantity->quantity - $request->amount,
        ]);

        return redirect()->route('admin.index')->with('status', 'Permintaan Diterima!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
