<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 space-y-8">

        <h2 class="text-2xl font-bold tracking-tight">
            Polling Aktif
        </h2>

        @foreach ($polls as $poll)

            @php
                $totalVotes = $poll->options->sum(fn($opt) => $opt->votes->count());
                $hasVoted = \App\Models\Vote::where('user_id', auth()->id())
                    ->where('poll_id', $poll->id)
                    ->exists();
            @endphp

            <div class="bg-white border border-gray-200 rounded-2xl p-6">

                <h3 class="text-lg font-semibold mb-4">
                    {{ $poll->title }}
                </h3>

                {{-- HASIL --}}
                <div class="space-y-4">

                    @foreach ($poll->options as $option)

                        @php
                            $count = $option->votes->count();
                            $percent = $totalVotes > 0
                                ? round(($count / $totalVotes) * 100)
                                : 0;
                        @endphp

                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span>{{ $option->option_text }}</span>
                                <span class="font-medium">
                                    {{ $count }} suara ({{ $percent }}%)
                                </span>
                            </div>

                            <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">
                                <div
                                    class="h-3 bg-[#F53003]"
                                    style="width: {{ $percent }}%">
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

                {{-- FORM VOTE --}}
                @if (! $hasVoted)
                    <form method="POST" action="/polls/vote" class="mt-6 space-y-3">
                        @csrf
                        <input type="hidden" name="poll_id" value="{{ $poll->id }}">

                        @foreach ($poll->options as $option)
                            <label class="flex items-center gap-2 text-sm">
                                <input
                                    type="radio"
                                    name="poll_option_id"
                                    value="{{ $option->id }}"
                                    required>
                                {{ $option->option_text }}
                            </label>
                        @endforeach

                        <button
                            class="mt-4 w-full bg-[#F53003] text-white py-2.5 rounded-xl font-semibold hover:opacity-90">
                            Kirim Suara
                        </button>
                    </form>
                @else
                    <p class="mt-4 text-sm text-green-600 font-medium">
                        ✔️ Anda sudah memberikan suara
                    </p>
                @endif

            </div>
        @endforeach

    </div>
</x-app-layout>