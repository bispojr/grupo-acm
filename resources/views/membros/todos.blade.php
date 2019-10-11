<div class="container" style="margin-top:1em;">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h1>Membros</h1>
        @csrf


        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Funções</th>
            </tr>
          </thead>
          <tbody>
            @foreach($membros as $membro)
              <tr>
                <td scope="row">{{ $membro->id }}</td>
                <td>{{ $membro->nome }}</td>
                <td>{{ $membro->email }}</td>
                <td>
                    <a href="{{ url('/membros/editar/'.$membro->id) }}"> <i class="material-icons">create</i> 
                    <a href="{{ url('/membros/excluir/'.$membro->id) }}"> <i class="material-icons">delete</i> 
                    <a href="{{ url('/membros/exibir/'.$membro->id) }}"> <i class="material-icons">search</i>
                </td>
              </tr>
            @endforeach
          </tbody>

          <button type="submit" class="btn btn-primary mb-2">Adicionar <i class="material-icons">group_add</i> </button>

        </table>





    </div>  
    <div class="col-md-1"></div>
  </div>
</div>



