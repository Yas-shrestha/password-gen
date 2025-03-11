<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Password Generate") }}
        </h2>
    </x-slot>
    <div class="back max-w-7xl mx-auto p-4">
        <a href="{{ route('dashboard') }}" class="primary-button">Back</a>
    </div>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1
                        clas
                        style="text-align: center"
                        class="text-5xl font-semibold"
                    >
                        Generate your password
                    </h1>

                    <h2 class="text-xl font-semibold mb-4">
                        Random Password Generator
                    </h2>

                    <!-- Password Display -->
                    <div
                        class="flex items-center border border-gray-300 rounded-lg p-2"
                    >
                        <input
                            id="password"
                            type="text"
                            readonly
                            class="w-full outline-none text-lg px-2 bg-transparent"
                            placeholder="Generated password"
                        />
                        <button
                            onclick="copyPass()"
                            class="ml-2 text-blue-500 hover:text-blue-700"
                        >
                            📋
                        </button>
                    </div>

                    <!-- Customization Options -->
                    <div class="mt-4 text-left">
                        <label class="flex items-center space-x-2 gap-3">
                            <input
                                type="checkbox"
                                id="includeUppercase"
                                checked
                                class="w-4 h-4"
                            />
                            <span class="mx-4">Include Uppercase</span>
                        </label>
                        <label class="flex items-center space-x-2 gap-3 mt-2">
                            <input
                                type="checkbox"
                                id="includeNumbers"
                                checked
                                class="w-4 h-4"
                            />
                            <span>Include Numbers</span>
                        </label>
                        <label class="flex items-center space-x-2 gap-3 mt-2">
                            <input
                                type="checkbox"
                                id="includeSymbols"
                                checked
                                class="w-4 h-4"
                            />
                            <span>Include Symbols</span>
                        </label>
                    </div>

                    <!-- Password Length Slider -->
                    <div class="mt-4 text-left">
                        <label class="block mb-1"
                            >Password Length:
                            <span id="lengthValue">12</span></label
                        >
                        <input
                            id="lengthSlider"
                            type="range"
                            min="6"
                            max="20"
                            value="12"
                            class="w-full"
                        />
                    </div>

                    <!-- Generate Button -->
                    <div style="text-align: center; margin-top: 20px">
                        <button
                            class="ms-3 t primary-button"
                            onclick="genPass()"
                        >
                            {{ __(" Generate Password") }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document
            .getElementById("lengthSlider")
            .addEventListener("input", function () {
                document.getElementById("lengthValue").innerText = this.value;
            });

        function genPass() {
            const length = document.getElementById("lengthSlider").value;
            const includeUppercase =
                document.getElementById("includeUppercase").checked;
            const includeNumbers =
                document.getElementById("includeNumbers").checked;
            const includeSymbols =
                document.getElementById("includeSymbols").checked;

            let chars = "abcdefghijklmnopqrstuvwxyz";
            if (includeUppercase) chars += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            if (includeNumbers) chars += "0123456789";
            if (includeSymbols) chars += "!@#$%^&*()_+-=[]{}|;:',.<>?/";

            let password = "";
            for (let i = 0; i < length; i++) {
                password += chars.charAt(
                    Math.floor(Math.random() * chars.length)
                );
            }
            document.getElementById("password").value = password;
        }

        function copyPass() {
            const passwordField = document.getElementById("password");
            passwordField.select();
            document.execCommand("copy");
            alert("Password copied to clipboard!");
        }
    </script>
</x-app-layout>
