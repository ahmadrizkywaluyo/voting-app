<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-10">

        <h1 class="text-2xl font-bold mb-6">
            Laporan Polling
        </h1>

        <div class="grid gap-4">
            @foreach ($polls as $poll)
                <div class="bg-white border rounded-xl p-6 flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold text-lg">
                            {{ $poll->title }}
                        </h3>
                        <p class="text-sm text-gray-500">
                            Status: {{ $poll->is_active ? 'Aktif' : 'Nonaktif' }}
                        </p>
                    </div>

                    <a href="/admin/reports/polls/{{ $poll->id }}/pdf"
                       class="px-5 py-2 bg-red-600 text-white rounded-lg font-semibold hover:opacity-90">
                        Download PDF
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
