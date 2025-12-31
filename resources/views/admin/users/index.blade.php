<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Manajemen User</h1>

            <a href="{{ route('users.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah User
            </a>
        </div>

        @if(session('success'))
            <div id="success-alert" class="mb-4 p-3 bg-green-100 text-green-700 rounded transition-opacity duration-500">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(function() {
                    let alert = document.getElementById('success-alert');
                    if (alert) {
                        alert.style.opacity = '0'; // Efek fade out
                        setTimeout(() => alert.remove(), 500); // Hapus dari layar setelah fade
                    }
                }, 3000); // 3000ms = 3 detik
            </script>
        @endif

        {{-- <div class="bg-white shadow rounded overflow-x-auto"> --}}
            <table class="w-full" id="table">
                {{-- <thead class="text-white bg-[#F53003]"> --}}
                <thead class="bg-blue-100">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Role</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-t">
                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3">{{ $user->role }}</td>
                        <td class="p-3 text-center flex justify-center gap-3">
                            <a href="{{ route('users.edit', $user) }}"
                            class="text-blue-600 hover:underline">
                                Edit
                            </a>

                            <form action="{{ route('users.destroy', $user) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin hapus user ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
