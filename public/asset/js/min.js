function genPass() {
    const length = document.getElementById("lengthSlider").value;
    const includeUppercase =
        document.getElementById("includeUppercase").checked;
    const includeNumbers = document.getElementById("includeNumbers").checked;
    const includeSymbols = document.getElementById("includeSymbols").checked;

    let chars = "abcdefghijklmnopqrstuvwxyz";
    if (includeUppercase) chars += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    if (includeNumbers) chars += "0123456789";
    if (includeSymbols) chars += "!@#$%^&*()_+-=[]{}|;:',.<>?/";

    let password = "";
    for (let i = 0; i < length; i++) {
        password += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    document.getElementById("genpassword").value = password;
    document.getElementById("password").value = password;
}

async function copyPass() {
    const passwordField = document.getElementById("genpassword"); // Fixed ID here

    try {
        // Modern clipboard API approach
        await navigator.clipboard.writeText(passwordField.value);
        alert("Password copied to clipboard!");
    } catch (err) {
        // Fallback for older browsers
        console.error("Failed to copy: ", err);

        // Select the text
        passwordField.select();
        passwordField.setSelectionRange(0, 99999); // For mobile devices

        try {
            // Fallback to deprecated method
            const success = document.execCommand("copy");
            if (success) {
                alert("Password copied to clipboard!");
            } else {
                throw new Error("Copy command failed");
            }
        } catch (execErr) {
            console.error("Fallback copy failed: ", execErr);
            alert("Failed to copy password to clipboard");
        }
    }
}
