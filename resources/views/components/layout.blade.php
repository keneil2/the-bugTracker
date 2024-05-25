<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env("APP_NAME")}}</title>
</head>

<body>
    <!-- vite is used to load asset in quick without refreshing the page like css or js -->
    @vite("resources/css/app.css")
    <header>
        <!-- nav bar component -->
        
      
    </header>
    <main>
    {{$slot}}
    </main>
    <script src="https://kit.fontawesome.com/f05da63fd8.js" crossorigin="anonymous"></script>
</body>

</html>