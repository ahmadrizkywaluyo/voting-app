<x-app-layout>
    <div class="max-w-xl mx-auto py-10 px-4">

        <h1 class="text-2xl font-bold mb-6">Tambah User</h1>

        <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1">Nama</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block mb-1">Role</label>
                <select name="role" class="w-full border rounded p-2" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div>
                <label class="block mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded p-2" required>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('users.index') }}" class="text-gray-600">
                    ← Kembali
                </a>

                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>