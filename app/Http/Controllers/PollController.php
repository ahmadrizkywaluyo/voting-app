<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PollReportExport;


class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::latest()->get();
        return view('admin.polls.index', compact('polls'));
        // if (auth()->user()->role === 'admin') {
        //     abort(403);
        // }
    }

    public function create()
    {
        return view('admin.polls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string'
        ]);

        $poll = Poll::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => false
        ]);

        foreach ($request->options as $option) {
            $poll->options()->create([
                'option_text' => $option
            ]);
        }

        return redirect('/admin/polls')->with('success', 'Polling berhasil dibuat');
    }

    public function edit(Poll $poll)
    {
        $poll->load('options');
        return view('admin.polls.edit', compact('poll'));
    }

    public function update(Request $request, Poll $poll)
    {
        $request->validate([
            'title' => 'required|string',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string',
        ]);

        $poll->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Hapus opsi lama
        $poll->options()->delete();

        // Simpan opsi baru
        foreach ($request->options as $option) {
            $poll->options()->create([
                'option_text' => $option
            ]);
        }

        return redirect('/admin/polls')->with('success', 'Polling berhasil diperbarui');
    }

    public function destroy(Poll $poll)
    {
        $poll->delete(); // otomatis hapus options (jika FK cascade)
        return redirect('/admin/polls')->with('success', 'Polling berhasil dihapus');
    }


    public function toggle(Poll $poll)
    {
        $poll->update([
            'is_active' => ! $poll->is_active
        ]);

        return back()->with('success', 'Status polling diperbarui');
    }

    public function reportPdf(Poll $poll)
    {
        $poll->load('options.votes');

        $totalVotes = $poll->options->sum(fn ($o) => $o->votes->count());

        $pdf = Pdf::loadView('admin.polls.report-pdf', [
            'poll' => $poll,
            'totalVotes' => $totalVotes
        ]);

        return $pdf->download('laporan-polling-'.$poll->id.'.pdf');
    }


}
