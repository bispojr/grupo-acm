<div class="container" style="margin-top:1em;">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h1>Buscar Certificados</h1>

        <form method="POST" class="form-inline" style="margin-top:1em;" action='{{ url('/certificados/buscar') }}'>
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <label for="cpf" class="sr-only">CPF</label>
                <input type="text" class="form-control" id="cpf" placeholder="Digite o seu CPF.">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Buscar</button>
        </form>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>



