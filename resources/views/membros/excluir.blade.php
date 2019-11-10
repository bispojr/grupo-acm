<div class="container" style="margin-top:1em;">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h1>Excluir membros</h1>

        <form action="">
          <div class="form-group">
                <label for="exampleFormControlInput1">Nome</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $membro->nome }}" readonly>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" value="{{ $membro->email }}" readonly>
          </div>
          
          <div class="form-group">
            <label for="exampleFormControlInput1">CPF</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $membro->cpf }}" readonly>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Descrição:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $membro->descricao }}" readonly>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Foto</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $membro->foto }}" readonly>
          </div>

          <button type="submit" class="btn btn-primary mb-2">Excluir</button>
          <a class="btn btn-primary" href='{{ url('/membros/todos') }}' role="button"> Voltar </a>

        </form>


    </div>  
    <div class="col-md-1"></div>
  </div>
</div>



