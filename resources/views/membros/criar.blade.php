<div class="container" style="margin-top:1em;">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h1>Criar membros</h1>

        <form method="POST" action='{{ url('/membros/criar') }}'>
            @csrf
          <div class="form-group">
            <label for="enderecoEmail">Endereço de e-mail:</label>
            <input name="email" type="email" class="form-control" id="enderecoEmail" placeholder="exemplo@exemplo.com">
          </div>
          <div class="form-group">
                <label for="exampleFormControlInput1">Nome:</label>
                <label for="nome" class="sr-only">Nome</label>
                <input name="nome" type="text" class="form-control" id="nome" placeholder="Digite o seu nome.">
          </div>
          <div class="form-group">
                <label for="cpf">CPF:</label>
                <label for="cpf" class="sr-only">CPF</label>
                <input name="cpf" type="text" class="form-control" id="cpf" placeholder="Digite o seu CPF.">
          </div>
          <div class="form-group">
            <label for="descricao">Breve descrição: </label>
            <textarea name="descricao" class="form-control" id="descricaoMembro" rows="3"></textarea>
          </div>

          <div class="form-group">
                <label for="exampleFormControlInput1">Foto URL:</label>
                <label for="nome" class="sr-only">foto</label>
                <input name="foto_url" type="text" class="form-control" id="nome" placeholder="Digite o seu nome.">
          </div>

          <button type="submit" class="btn btn-primary mb-2">Criar</button>
          <button type="submit" class="btn btn-primary mb-2">Cancelar</button>
        </form>


    </div>  
    <div class="col-md-1"></div>
  </div>
</div>



