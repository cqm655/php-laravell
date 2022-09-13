
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .container{
            width: 700px;
            background-color: aliceblue;
            padding: 10px;
        }
       
        #name{
            width: 500px;
        }
        #body{
            width: 600px;
            height: 260px;
        }
        body{
            background-color: lightblue;
        }
        .isDisabled {
           color: currentColor;
           cursor: not-allowed;
           opacity: 0.5;
           text-decoration: none;
           pointer-events: none;
           visibility: hidden;
}
.isEnabled{
    pointer-events:all;
}
    </style>
</head>
<body>
    <nav class="nav justify-content-center">
        <a class="nav-link" href="/news">Main</a>
       <?php
     
      $id = Auth::user(); //retreive the user name
      
        if($id!="") {
            echo '<a class="nav-link" href="/dashboard">'.$id['name'].'</a>';
        } else {
            echo '<a class="nav-link" href="/login" class="isEnabled" id="login">Login</a>';
        }
        ?>
    
    </nav>
    <main>
        @yield("main_content")
    </main>
  
</body></html>

