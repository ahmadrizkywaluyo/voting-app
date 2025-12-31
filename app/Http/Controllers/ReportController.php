<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $polls = Poll::latest()->get();
        return view('admin.reports.polls', compact('polls'));
    }

    public function pollPdf(Poll $poll)
    {
        $results = $poll->options()->withCount('votes')->get();
        $totalVotes = $results->sum('votes_count');

        $pdf = Pdf::loadView('admin.reports.poll_pdf', compact(
            'poll',
            'results',
            'totalVotes'
        ));

        return $pdf->download('laporan-polling-'.$poll->id.'.pdf');
    }
}
