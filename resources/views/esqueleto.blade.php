<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{!! asset('favicon.ico') !!}">

    <title>Jataí ACM SIGCSE Chapter: {{ $titulo }}</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/navbar-top-fixed.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href='{{ url('/') }}'>Jataí SIGCSE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href='{{ url('/') }}'>Principal <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='{{ url('/sobre') }}'>Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='{{ url('/quem-somos') }}'>Quem somos?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='{{ url('/agenda') }}'>Agenda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Certificados
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href='{{ url('/certificados/buscar') }}'>Buscar</a>
              <a class="dropdown-item" href='{{ url('/certificados/validar') }}'>Validar</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='{{ url('/recursos') }}'>Recursos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='{{ url('/fale-conosco') }}'>Fale Conosco</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Busca" aria-label="busca">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busca</button>
        </form>
      </div>
    </nav>

    @include($view);

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
