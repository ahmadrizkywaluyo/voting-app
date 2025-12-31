<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function index()
    {
        $polls = Poll::where('is_active', true)
                    ->with('options')
                    ->latest()
                    ->get();

        return view('polls.index', compact('polls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'poll_id' => 'required|exists:tbl_polls,id',
            'poll_option_id' => 'required|exists:tbl_poll_options,id',
        ]);

        $userId = Auth::id();

        // Cek sudah vote atau belum
        $alreadyVoted = Vote::where('user_id', $userId)
            ->where('poll_id', $request->poll_id)
            ->exists();

        if ($alreadyVoted) {
            return back()->with('error', 'Anda sudah memberikan suara pada polling ini.');
        }

        Vote::create([
            'user_id' => $userId,
            'poll_id' => $request->poll_id,
            'poll_option_id' => $request->poll_option_id,
        ]);

        return back()->with('success', 'Terima kasih, suara Anda berhasil disimpan.');
    }
}
