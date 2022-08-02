<?php

namespace App\Http\Controllers;

use App\Models\SaleTeam;
use Illuminate\Http\Request;

class SaleInsertController extends Controller
{

    public function index()
    {
        $data['sales'] = SaleTeam::orderBy('id', 'desc')->paginate(5);
        return view('sales.index', $data);
    }

    public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'address' => 'required',
            'route' => 'required',
        ]);
        $sale = new SaleTeam;
        $sale->name = $request->name;
        $sale->email = $request->email;
        $sale->address = $request->address;
        $sale->telephone = $request->telephone;
        $sale->route = $request->route;
        $sale->comment = $request->comment;
        $sale->save();
        return redirect()->route('sales.index')
            ->with('success', 'Sale has been created successfully.');
    }

    public function show(SaleTeam $sale)
    {
        return view('sales.show', compact('sale'));
    }

    public function edit(SaleTeam $sale)
    {
        return view('sales.edit', compact('sale'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $sale = SaleTeam::find($id);
        $sale->name = $request->name;
        $sale->email = $request->email;
        $sale->address = $request->address;
        $sale->save();
        return redirect()->route('sales.index')
            ->with('success', 'Sale Has Been updated successfully');
    }

    public function destroy(SaleTeam $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')
            ->with('success', 'Sale has been deleted successfully');
    }
}
