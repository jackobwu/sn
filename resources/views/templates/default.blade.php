<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Social Network</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        @include('templates.partials.navigation')
        <main class="container">
            @include('templates.partials.alerts')
            @yield('content')
        </main>
    </body>
</html>