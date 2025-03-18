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
        <div class="bg-white p-4 rounded-lg shadow-md" style="margin-bottom: 20px">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">
                Add New Password
            </h2>
            <form action="{{ route('pass-manage.store') }}" method="POST">
                @csrf
                <!-- Website Field -->
                <div class="mb-6">
                    <label for="website" class="block text-sm font-medium text-gray-700 mb-2">Website</label>
                    <input type="text" name="website" id="website"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                        placeholder="Enter website URL" required />
                </div>

                <!-- Username Field -->
                <div class="mb-6">
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input type="text" name="username" id="username"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                        placeholder="Enter username" required />
                </div>

                <!-- Password Field -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                        placeholder="Enter password" required />
                </div>
                <div class="flex items-center border border-gray-300 rounded-lg p-2">
                    <input id="genpassword" type="text" readonly
                        class="w-full outline-none text-lg px-2 bg-transparent" placeholder="Generated password" />
                    <button onclick="copyPass()" class="ml-2 text-blue-500 hover:text-blue-700">
                        📋
                    </button>
                </div>

                <!-- Customization Options -->
                <div class="mt-4 text-left">
                    <label class="flex items-center space-x-2 gap-3">
                        <input type="checkbox" id="includeUppercase" checked class="w-4 h-4" />
                        <span class="mx-4">Include Uppercase</span>
                    </label>
                    <label class="flex items-center space-x-2 gap-3 mt-2">
                        <input type="checkbox" id="includeNumbers" checked class="w-4 h-4" />
                        <span>Include Numbers</span>
                    </label>
                    <label class="flex items-center space-x-2 gap-3 mt-2">
                        <input type="checkbox" id="includeSymbols" checked class="w-4 h-4" />
                        <span>Include Symbols</span>
                    </label>
                </div>

                <!-- Password Length Slider -->
                <div class="mt-4 text-left">
                    <label class="block mb-1">Password Length:
                        <span id="lengthValue">12</span></label>
                    <input id="lengthSlider" type="range" min="6" max="20" value="12"
                        class="w-full" />
                </div>

                <!-- Generate Button -->
                <div style="text-align: center; margin-top: 20px">
                    <button class="ms-3 t primary-button" type="button" onclick="genPass()">
                        {{ __(' Generate Password') }}
                    </button>
                </div>
                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit" class="primary-button">
                        Save Password
                    </button>
                </div>
            </form>
        </div>

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
