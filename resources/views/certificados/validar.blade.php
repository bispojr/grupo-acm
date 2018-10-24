<div class="container" style="margin-top:1em;">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h1>Validar Certificados</h1>

        <form method="POST" class="form-inline" style="margin-top:1em;" action='{{ url('/certificados/validar') }}'>
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <label for="codigo" class="sr-only">Código</label>
                <input type="text" class="form-control" id="codigo" placeholder="Digite aqui o código.">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Validar</button>
        </form>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>



