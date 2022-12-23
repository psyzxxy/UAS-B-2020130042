<?php

namespace App\Http\Controllers;

use App\Models\items;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValueMap;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = items::all();
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id'=> 'required |min:0|max:16|',
            'nama' => 'required|max:225',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|numeric|min:0',
        ]);

        items::create($validateData);

        $request->session()->flash('success',"sukses menambahkan items dengan nama:{$validateData['nama']}");
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(items $items)
    {
        return view('item.show',compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(items $items)
    {
        return view('item.edit',compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, items $items)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:225',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',

        ]);
        items::created($validateData);

        $request->session()->flash('success',"sukses mengubah items dengan nama:{$validateData['items']}");
        return redirect()->route('item.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(items $items)
    {
        $items->delete();
        return redirect()->route('item.index')->with('success',"berhasil menghapus item{$items['nama']}");
    }
}
