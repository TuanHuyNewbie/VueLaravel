<!doctype html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <font-awesome-icon :icon="['fab', 'twitter']" class="icon alt"/>
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">

    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>
<body>
    <div id="app">
        <v-app>
            <router-view></router-view>
        </v-app>    
    </div>
    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>

