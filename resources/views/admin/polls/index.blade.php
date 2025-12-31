<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-10">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold tracking-tight">
                    Manajemen Polling
                </h1>
                <p class="text-sm text-gray-500">
                    Kelola polling yang tersedia dan statusnya
                </p>
            </div>

            <a href="/admin/polls/create"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#F53003] text-white font-semibold rounded-xl shadow hover:opacity-90 transition">
                + Tambah Polling
            </a>
        </div>

        {{-- Empty State --}}
        @if ($polls->isEmpty())
            <div class="bg-white border border-gray-200 rounded-2xl p-10 text-center">
                <p class="text-gray-500 mb-4">
                    Belum ada polling yang dibuat.
                </p>
                <a href="/admin/polls/create"
                   class="inline-block px-6 py-3 bg-[#F53003] text-white rounded-xl font-semibold">
                    Buat Polling Pertama
                </a>
            </div>
        @else
            {{-- Polling List --}}
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($polls as $poll)
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 flex flex-col justify-between relative">

                        <div>
                            <h3 class="text-lg font-semibold mb-2">
                                {{ $poll->title }}
                            </h3>

                            {{-- Status Badge --}}
                            @if ($poll->is_active)
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                             bg-green-100 text-green-700">
                                    Aktif
                                </span>
                            @else
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                             bg-gray-100 text-gray-600">
                                    Nonaktif
                                </span>
                            @endif
                        </div>

                        {{-- Actions (future ready) --}}
                        <div class="mt-6 flex gap-3 text-sm">
                            <a href="/admin/polls/{{ $poll->id }}/edit"
                            class="px-4 py-2 border rounded-lg hover:bg-gray-50">
                                Edit
                            </a>

                            <form method="POST" action="/admin/polls/{{ $poll->id }}/toggle">
                                @csrf
                                @method('PATCH')
                                <button
                                    class="px-4 py-2 border rounded-lg
                                    {{ $poll->is_active ? 'text-red-600 hover:bg-red-50' : 'text-green-600 hover:bg-green-50' }}">
                                    {{ $poll->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                </button>
                            </form>

                            <form method="POST"
                                action="/admin/polls/{{ $poll->id }}"
                                onsubmit="return confirm('Yakin hapus polling ini?')"
                                class="absolute top-3 right-3">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-8 h-8 flex items-center justify-center
                                        rounded-full text-red-500
                                        hover:bg-red-50 hover:text-red-700
                                        transition">
                                    ✕
                                </button>
                            </form>

                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>
</x-app-layout>
