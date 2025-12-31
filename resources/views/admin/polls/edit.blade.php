<x-app-layout>
    <div class="max-w-3xl mx-auto px-6 py-10">

        <h1 class="text-2xl font-bold mb-6">
            Edit Polling
        </h1>

        <form method="POST" action="/admin/polls/{{ $poll->id }}" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label class="block text-sm font-medium mb-2">
                    Judul Polling
                </label>
                <input
                    type="text"
                    name="title"
                    value="{{ $poll->title }}"
                    required
                    class="w-full rounded-xl border-gray-300"
                >
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block text-sm font-medium mb-2">
                    Deskripsi
                </label>
                <textarea
                    name="description"
                    rows="3"
                    class="w-full rounded-xl border-gray-300"
                >{{ $poll->description }}</textarea>
            </div>

            {{-- Opsi --}}
            <div>
                <label class="block text-sm font-medium mb-3">
                    Opsi Voting
                </label>

                <div class="space-y-3">
                    @foreach ($poll->options as $option)
                        <input
                            type="text"
                            name="options[]"
                            value="{{ $option->option_text }}"
                            required
                            class="w-full rounded-xl border-gray-300"
                        >
                    @endforeach
                </div>

                <p class="text-xs text-gray-500 mt-2">
                    Minimal 2 opsi
                </p>
            </div>

            {{-- Actions --}}
            <div class="flex gap-3">
                <button
                    type="submit"
                    class="px-6 py-3 bg-[#F53003] text-white font-semibold rounded-xl">
                    Simpan Perubahan
                </button>

                <a href="/admin/polls"
                   class="px-6 py-3 border rounded-xl">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
