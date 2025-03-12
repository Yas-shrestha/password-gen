<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Share Password: {{ $password->website }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Current Access List -->
                    <!-- Current Access List -->
                    <h3 class="font-semibold text-lg mb-4">Users with Access</h3>
                    @if ($sharedWith->isEmpty())
                        <p class="text-gray-600">No one has access to this password yet.</p>
                    @else
                        <ul class="list-disc pl-5 mb-6">
                            @foreach ($sharedWith as $share)
                                <li class="text-gray-700 flex justify-between items-center">
                                    <span>{{ $share->sharedWith->email }} ({{ $share->sharedWith->name }})</span>
                                    <form action="{{ route('pass-manage.remove-share', [$password->id, $share->id]) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-800 text-sm font-medium"
                                            onclick="return confirm('Are you sure you want to remove access for this user?')">
                                            Remove
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <!-- Share Form -->
                    <h3 class="font-semibold text-lg mb-4">Share with Someone New</h3>
                    @if (session('success'))
                        <div class="mb-4 text-green-600">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 text-red-600">{{ session('error') }}</div>
                    @endif
                    <form method="POST" action="{{ route('pass-manage.store-share', $password->id) }}">
                        @csrf
                        <div>
                            <x-input-label for="shared_with_user_id" value="Share with" />
                            <select name="shared_with_user_id" id="shared_with_user_id"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                @foreach ($users as $id => $email)
                                    <option value="{{ $id }}">{{ $email }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('shared_with_user_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-primary-button>Share</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
