<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Passwords') }}
        </h2>
    </x-slot>

    <div class="back max-w-7xl mx-auto p-4">
        <a href="{{ route('dashboard') }}" class="primary-button">Back</a>
    </div>

    <div class="max-w-7xl mx-auto ">
        <!-- Form for Adding a New Password -->


        <!-- Table for Displaying Passwords -->
        <div class="w-full overflow-x-auto">
            <h2 class="text-2xl font-semibold shadow p-6 bg-white">Passwords</h2>

            <div class="w-full overflow-x-auto">
                <table class="w-full min-w-max table-auto border-collapse border border-white">
                    <!-- Table Header -->
                    <thead class="bg-white border-gr text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Website</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Username</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Password</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($passwords as $password)
                            <tr class="border-b bg-white hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $password->app_name }}</td>
                                <td class="px-6 py-4">{{ $password->username ?? 'N/A' }}</td>
                                <td class="px-6 py-4">
                                    <span class="hidden-password">********</span>
                                    <span class="visible-password hidden">
                                        {{ Crypt::decryptString($password->password) }}
                                    </span>
                                    <button class="text-blue-500 ml-2 toggle-password">👁</button>
                                    <button class="text-green-500 ml-2 copy-password"
                                        data-password="{{ Crypt::decryptString($password->password) }}">📋</button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('pass-manage.edit', $password->id) }}"
                                        class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <span class="mx-2 text-gray-400">|</span>
                                    <a href="{{ route('pass-manage.share', $password->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Share</a>
                                    <span class="mx-2 text-gray-400">|</span>
                                    <form action="{{ route('pass-manage.destroy', $password->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full overflow-x-auto">
            <h2 class="text-2xl font-semibold shadow p-6 bg-white">Shared Passwords</h2>
            <div class="w-full overflow-x-auto">
                <table class="w-full table-auto border-collapse border border-white">
                    <!-- Table Header -->
                    <thead class="bg-white border-gr text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Website</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Username</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Password</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Shared_by</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody>

                        @foreach ($receivedPasses as $password)
                            <tr class="border-b bg-white hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $password->app_name }}</td>
                                <td class="px-6 py-4">{{ $password->username ?? 'N/A' }}</td>
                                <td class="px-6 py-4">
                                    <span class="hidden-password">********</span>
                                    <span
                                        class="visible-password hidden">{{ Crypt::decryptString($password->password) }}</span>
                                    <button class="text-blue-500 ml-2 toggle-password">👁</button>
                                    <button class="text-green-500 ml-2 copy-password"
                                        data-password="{{ Crypt::decryptString($password->password) }}">📋</button>
                                </td>

                                <td>{{ $password->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                let row = this.closest('td');
                let hiddenPass = row.querySelector('.hidden-password');
                let visiblePass = row.querySelector('.visible-password');

                if (hiddenPass.style.display === "none") {
                    hiddenPass.style.display = "inline";
                    visiblePass.style.display = "none";
                } else {
                    hiddenPass.style.display = "none";
                    visiblePass.style.display = "inline";
                }
            });
        });

        document.querySelectorAll('.copy-password').forEach(button => {
            button.addEventListener('click', function() {
                let password = this.getAttribute('data-password');
                navigator.clipboard.writeText(password);
                alert("Password copied!");
            });
        });
    </script>

</x-app-layout>
