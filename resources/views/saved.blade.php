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

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit" class="primary-button">
                        Save Password
                    </button>
                </div>
            </form>
        </div>

        <!-- Table for Displaying Passwords -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <h2 class="text-2xl font-semibold p-6 bg-gray-50">Passwords</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <!-- Table Header -->
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Website
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Username
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Password
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Example Row 1 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            example.com
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            user1
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ********
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                            <span class="mx-2 text-gray-300">|</span>
                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
