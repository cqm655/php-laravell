<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>@yield('page_title') - Online Restaurant</title>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/shop">Shop</a>
        <a href="/about">About</a>
    </nav>
    <main>
        @yield("main_content")
    </main>
    <footer>
        
        <p>Online Restaurant</p>
    </footer>
    <script src="js/app.js"></script>
    
</body>
</html>