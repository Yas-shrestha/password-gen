<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border: 1px solid #BBC6DF;
        }

        .header {
            background-color: #233254;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 30px;
        }

        .content p {
            font-size: 16px;
            color: #233254;
            margin-bottom: 15px;
        }

        .footer {
            background-color: #BBC6DF;
            text-align: center;
            font-size: 12px;
            color: #233254;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>New Contact Message</h1>
        </div>
        <div class="content">
            <p><strong>Name:</strong> {{ $contactData['name'] }}</p>
            <p><strong>Email:</strong> {{ $contactData['email'] }}</p>
            <p><strong>Phone:</strong> {{ $contactData['phone'] ?? 'N/A' }}</p>
            <p><strong>Message:</strong><br>{{ $contactData['message'] }}</p>
        </div>
        <div class="footer">
            This email was generated automatically by your website.
        </div>
    </div>
</body>

</html>
