<div class="container" style="margin-top:1em;">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h1>Editar membros</h1>

        <form method="POST" action='{{ url('/membros/editar/'.$membro->id) }}'>
            @csrf
              <div class="form-group">
                <label for="exampleFormControlInput1">Nome</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $membro->nome }}" >
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" value="{{ $membro->email }}" >
              </div>
              
              <div class="form-group">
                <label for="exampleFormControlInput1">CPF</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $membro->cpf }}" >
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Descrição:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $membro->descricao }}" >
              </div>

          <button type="submit" class="btn btn-primary mb-2">Editar</button>
        </form>


    </div>  
    <div class="col-md-1"></div>
  </div>
</div>



