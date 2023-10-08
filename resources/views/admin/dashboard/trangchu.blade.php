<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Bitter" rel="stylesheet" type="text/css">
    <script src="https://cdn.tiny.cloud/1/sffkyqbf4ckstll0vlz4ln29q24f2nm17gg3a33zokk1snce/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="scripts/tinymceConfig.js"></script>
    <script src="{{asset('js/tinymce.js')}}"></script>
    <link rel="stylesheet" href="/css/style.css">
    
    <title>@yield('title')</title>
</head>
<body>
    @include('admin.partial.sidebar')

    <main class="container">
        @include('admin.partial.menu')
        @yield('dashboard')

        {{-- user --}}
        @yield('users')
        @yield('add.user')

        {{-- product --}}
        @yield('products')
        @yield('add.products')
        @yield('update.products')

        {{-- roles --}}
        @yield('roles')
        @yield('add.roles')

        {{-- category --}}
        @yield('category')
        @yield('add.category')
        @yield('update.category')


        {{-- order --}}
        @yield('order')
        
    </main>

    
    <script src="/js/slide.js"></script>
    <script src="{{asset('js/add-image.js')}}"></script>
    <script src="{{asset('js/filter.js')}}"></script>
</body>
</html>