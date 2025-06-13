<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - Bastion Hosting</title>
    <meta http-equiv="refresh" content="3;url=/">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background: #0a0a0a; 
            color: #ffffff; 
            text-align: center; 
            padding: 50px; 
        }
        .container { max-width: 600px; margin: 0 auto; }
        h1 { color: #0066ff; font-size: 3rem; margin-bottom: 1rem; }
        p { font-size: 1.2rem; margin-bottom: 2rem; }
        .redirect-note { color: #a0a0a0; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <p>Oops! That page doesn't exist.</p>
        <div class="redirect-note">
            Redirecting you to our homepage in 3 seconds...
        </div>
    </div>
    <script>
        setTimeout(() => {
            window.location.href = '/';
        }, 3000);
    </script>
</body>
</html>
