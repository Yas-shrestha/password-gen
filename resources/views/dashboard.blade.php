<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="p-6 text-gray-900">
                    <h1 clas style="text-align: center; font-size:48px" class="font-semibold">
                        Welcome to
                        <span style="color: blue">Password </span> Manager
                    </h1>
                    <p style="text-align: center">A safe place for your Keys</p>
                </div>
                <hr>
                <div class="generate p-4">
                    <h2 class="font-semibold" style="font-size: 24px">
                        Generate <span style="color: blue">Password</span>
                    </h2>
                    <p class="ms-4">
                        Generate a customized secure password through our page.
                    </p>
                    <a href="{{ route('pass.gen') }}" class="primary-button">Generate
                        Now</a>
                </div>
                <div class="Add-pass   p-4">
                    <h2 class="font-semibold" style="font-size: 24px">
                        Store Your <span style="color: blue">Passwords</span>
                    </h2>
                    <p class="ms-4">
                        A safe place to store Your keys
                    </p>
                    <a href="{{ route('pass-manage.index') }}" class="primary-button">Add Your Passwords</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
