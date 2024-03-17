<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;
use App\Models\Vote;
use App\Http\Requests\StoreVoteRequest;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($unique_identifier)
    {
        $enquete = Enquete::where('unique_identifier', $unique_identifier)->firstOrFail();
        return view('votes.create', [ 'enquete' => $enquete ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoteRequest $request)
    {

        $validatedRequest = $request->validated();

        //TODO：ここあきらかに無駄な実装なきがするのでリファクタリングの余地有り
        $enqueteId = Enquete::where('id', $request->enquete_id)->firstOrFail();

        // createメソッドを使用してVoteモデルの新しいインスタンスを作成し、データベースに保存
        $vote = Vote::create($validatedRequest);

        return redirect()->route('enquetes.index', ['unique_identifier' => $enqueteId->unique_identifier]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vote = Vote::where('id', $id)->firstOrFail();

        // Voteモデルから関連するEnqueteモデルにアクセス
        $enquete = $vote->enquetes; // enquete()リレーションを利用

        return view('votes.edit', [
            'vote' => $vote,
            'enquete' => $enquete
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $unique_identifier)
    {
        $vote = Vote::where('id', $request->id)->firstOrFail();
        $vote->name = $request->name;
        $vote->location = $request->location;
        $vote->reservation_time = $request->reservation_time;
        $vote->cuisine_type = $request->cuisine_type;
        $vote->ambiance = $request->ambiance;
        $vote->save();

        return redirect()->route('enquetes.index', $unique_identifier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
