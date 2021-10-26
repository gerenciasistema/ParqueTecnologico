<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Parque Tecnologico</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/estilo.css">
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script> 
</head>
<body>
<!-- NavBar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <div class="container-fluid">
    <!-- Name NavBar -->
    <div style="margin: -10px 0 -25px 200px">
      <p class="text">Parque  Tecnologico</p>
    </div>
    <!-- Name NavBar -->

      <!-- DropDown -->
      <ul style="margin: 9px 3px 0 400px" class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Status</a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><button type="button" class="dropdown-item">Todos</button></li>
            <li><button type="button" id="pendente" class="dropdown-item">Pendentes</button></li>
            <li><button type="button" id="finalizado" class="dropdown-item">Finalizados</button></li>
          </ul>

        </li>
      </ul>
      <!-- DropDown -->

    <!-- Campo de Pesquisa -->
    <div style="margin: 10px 0 0 0" class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex" action="{{route('searchMunicipio')}}"  method="post">
      @csrf
      <select name="search_name" id="search">
        <option value="">Escolha Seu Municipio</option>
          @foreach($cidades as $cidade)
          <option value="{{$cidade->municipio}}">{{$cidade->municipio}}</option>
          @endforeach
      </select>
        <button class="btn btn-outline-light" type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
        </button>
      </form>
    <!-- Campo de Pesquisa -->
    </div>
  </div>
</nav>
<!-- NavBar -->

<section style="margin: 70px 0 0 0">

    @if ($search == null)
    
    @else
  <div class="card-body">
    <table style="aling center: center;" id="tabela" class="table table-bordered table-hover w3-card-4">
      <thead id="topo" class="text-center ">
        <tr class="table-light fs-5">
          <th>SIGEAM</th>
          <th>ESCOLA</th>
          <th>MUNICIPIO</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($search as $name)
      <tr >
  
      @if ($name->status === 0)  
          <td class="status table-danger" data-estado="pendente">{{$name->status}}</td>
        @else         
          <td class="status table-success" data-estado="finalizado">{{$name->status}}</td>
        @endif
          <td class="escola">{{$name->escola}}</td>
          <td class="municipio">{{$name->municipio}}</td> 
        </tr>
        @endforeach
      </tbody>
    </table>
          
  </div>
      @endif

    

  <script>
    var tds = document.querySelectorAll('table td[data-estado]');
    document.querySelector('.dropdown-menu').addEventListener('click', function(e) 
    {
      var estado = e.target.id;
      for (var i = 0; i < tds.length; i++) 
      {
        var tr = tds[i].closest('tr');
        tr.style.display = estado == tds[i].dataset.estado || !estado ? '' : 'none';
      }
    });
  </script>

</section>
</body>
</html>


