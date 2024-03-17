<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;
use App\Models\Vote;

use Illuminate\Support\Str;

class EnqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($unique_identifier)
    {
        // 一意の値をもとにアンケート情報を取得
        $enqueteData = Enquete::where('unique_identifier', $unique_identifier)->firstOrFail();
        $votes = Vote::where('enquete_id', $enqueteData->id)->get();
        // dd($enqueteData);
        return view('enquetes.index', [
            'enqueteData' => $enqueteData,
            'votes' => $votes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enquetes.create');
    }

    // public function votes_create($unique_identifier)
    // {
    //     $enquete = Enquete::where('unique_identifier', $unique_identifier)->firstOrFail();
    //     return view('votes.create', compact('enquete'));
    // }

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

    return redirect()->route('enquetes.show', $enquete->unique_identifier);
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
    public function edit($id)
    {
        $enquete = Enquete::where('id', $id)->firstOrFail();
        // dd($enquete);
        return view('enquetes.edit', compact('enquete'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $enquete = Enquete::where('id', $request->id)->firstOrFail();
        $enquete->name = $request->name;
        $enquete->event_name = $request->event_name;
        $enquete->location = $request->location;
        $enquete->reservation_time = $request->reservation_time;
        $enquete->cuisine_type = $request->cuisine_type;
        $enquete->ambiance = $request->ambiance;
        $enquete->save();

        return redirect()->route('enquetes.index', $enquete->unique_identifier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
