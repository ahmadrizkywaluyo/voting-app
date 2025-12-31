<x-app-layout>
    <div class="max-w-3xl mx-auto px-6 py-10">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl font-bold tracking-tight">
                Buat Polling Baru
            </h1>
            <p class="text-sm text-gray-500">
                Tentukan judul dan opsi yang akan dipilih oleh user
            </p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white border border-gray-200 rounded-2xl p-8">
            <form method="POST" action="/admin/polls" class="space-y-6">
                @csrf

                {{-- Judul --}}
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Judul Polling
                    </label>
                    <input
                        type="text"
                        name="title"
                        required
                        placeholder="Contoh: Pemilihan Ketua BEM 2025"
                        class="w-full rounded-xl border-gray-300 focus:border-[#F53003] focus:ring-[#F53003]"
                    >
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Deskripsi (Opsional)
                    </label>
                    <textarea
                        name="description"
                        rows="3"
                        placeholder="Deskripsi singkat tentang polling ini"
                        class="w-full rounded-xl border-gray-300 focus:border-[#F53003] focus:ring-[#F53003]"
                    ></textarea>
                </div>

                {{-- Opsi Voting --}}
                <div>
                    <label class="block text-sm font-medium mb-3">
                        Opsi Voting
                    </label>

                    <div id="options-wrapper" class="space-y-3">

                        {{-- Default minimal 2 opsi --}}
                        <div class="flex gap-2">
                            <input
                                type="text"
                                name="options[]"
                                required
                                placeholder="Opsi 1"
                                class="flex-1 rounded-xl border-gray-300"
                            >
                        </div>

                        <div class="flex gap-2">
                            <input
                                type="text"
                                name="options[]"
                                required
                                placeholder="Opsi 2"
                                class="flex-1 rounded-xl border-gray-300"
                            >
                        </div>

                    </div>

                    <button
                        type="button"
                        onclick="addOption()"
                        class="mt-3 text-sm font-medium text-[#F53003] hover:underline"
                    >
                        + Tambah Opsi
                    </button>

                    <p class="text-xs text-gray-500 mt-2">
                        Minimal 2 opsi diperlukan
                    </p>
                </div>

                {{-- Actions --}}
                <div class="flex justify-end gap-3 pt-4">
                    <a href="/admin/polls"
                       class="px-5 py-2.5 rounded-xl border text-sm font-medium hover:bg-gray-50">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-2.5 bg-[#F53003] text-white rounded-xl font-semibold shadow hover:opacity-90 transition"
                    >
                        Simpan Polling
                    </button>
                </div>
            </form>
        </div>

    </div>
    {{-- JS --}}
<script>
    function addOption() {
        const wrapper = document.getElementById('options-wrapper');
        const count = wrapper.children.length + 1;

        const div = document.createElement('div');
        div.className = 'flex gap-2';

        div.innerHTML = `
            <input
                type="text"
                name="options[]"
                placeholder="Opsi ${count}"
                class="flex-1 rounded-xl border-gray-300"
                required
            >
            <button type="button"
                onclick="this.parentElement.remove()"
                class="px-3 rounded-lg border text-red-600 hover:bg-red-50">
                ✕
            </button>
        `;

        wrapper.appendChild(div);
    }
</script>
</x-app-layout>