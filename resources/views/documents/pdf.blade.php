<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $document->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo img {
            width: 150px; /* Adjust the size of the logo */
        }
        .header {
            text-align: center;
            margin-bottom: 50px;
        }
        .header h1 {
            font-size: 24px;
            text-transform: uppercase;
            margin: 0;
        }
        .document-content {
            margin-bottom: 50px;
        }
        .footer {
            position: absolute;
            bottom: 50px;
            width: 100%;
            text-align: center;
        }
        .signature, .stamp {
            display: inline-block;
            width: 45%;
            vertical-align: top;
        }
        .signature img, .stamp img {
            width: 150px; /* Adjust the size of the images */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo Section -->
        <div class="logo">
            <img src="{{ public_path('images/logo.jpeg') }}" alt="Logo"> <!-- Add your logo image here -->
        </div>

      

        <!-- Document Content Section -->
        <div class="document-content">
            <p><strong>Document Number:</strong> {{ $document->number }}</p>
            <p><strong>Amount:</strong> {{ $document->amount }} DH</p>
            <p><strong>Received From:</strong> {{ $document->received_from }}</p>
            <p><strong>Purpose:</strong> {{ $document->purpose }}</p>
            <p><strong>Location:</strong> {{ $document->location }}</p>
            <p><strong>Date:</strong> {{ $document->date }}</p>
            <p><strong>Content:</strong> {{ $document->content }}</p>
        </div>

        <!-- Footer Section with Signature and Stamp -->
        <div class="footer">
            <div class="signature">
                <img src="{{ public_path('images/signature.png') }}" alt="Signature">
                <p>Signature</p>
            </div>
            <div class="stamp">
                <img src="{{ public_path('images/stamp.jpeg') }}" alt="Stamp">
                <p>Stamp</p>
            </div>
        </div>
    </div>
</body>
</html>
