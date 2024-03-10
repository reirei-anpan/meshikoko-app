<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;
use Illuminate\Support\Str;

class EnqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('enquetes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enquetes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $enquete = new Enquete;
        $enquete->name = $request->name;
        $enquete->event_name = $request->event_name;
        $enquete->location = $request->location;
        $enquete->reservation_time = $request->reservation_time;
        $enquete->cuisine_type = $request->cuisine_type;
        $enquete->ambiance = $request->ambiance;
        $enquete->unique_identifier = Str::random(32); // 32文字のランダムな文字列
        $enquete->save();

    return redirect()->route('enquete.show', $enquete->unique_identifier);
    }

    /**
     * Display the specified resource.
     */
    public function show($unique_identifier)
    {
        $enquete = Enquete::where('unique_identifier', $unique_identifier)->firstOrFail();
        return view('enquetes.show', compact('enquete'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
