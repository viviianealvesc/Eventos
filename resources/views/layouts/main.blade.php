<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
   <header>
      <nav class="navbar navbar-expand-lg bg-light">
         <div class="collapse navbar-collapse justify-content-between" id="navbar">
            <a href="/" class="navbar-bland">
               <img width="70" src="/img/icone.png" alt="Logo">
            </a>
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a href="/" class="nav-link">Eventos</a>
               </li>
               <li class="nav-item">
                  <a href="/events/create" class="nav-link">Criar eventos</a>
               </li>
               <li class="nav-item">
                  <a href="/" class="nav-link">Entrar</a>
               </li>
               <li class="nav-item">
                  <a href="/" class="nav-link">Cadastrar</a>
               </li>
            </ul>
         </div>
      </nav>
   </header>
   <main>
      <div class="container-fluid">
         <div class="row">
            @if(session('msg')) 
              <p class="msg">{{session('msg')}}</p>
            @endif
         </div>
      </div>
   </main>

   @yield('content')

   <footer> 
      <p>MV Eventos &copy; 2024</p>
   </footer>
    
     <!-- Icones -->
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>