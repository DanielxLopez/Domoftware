@include('plantillas.navinicio')

    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/privada_admin.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<br>


<style>
    .imgnav{
      width: 100vw;
      margin-top: -70px;
      z-index: 1; 

}
      .titulo{
        color: white;
        text-align: center;
        letter-spacing: 5px; 
        z-index: 2; 
        font-size: 30px;

      }

      </style>

    <h2 class="titulo display-5 font-weight-light">Panel de Administrador</h2>
    <img src="{{ asset('images/nav6.png') }}" class="imgnav">

    <div class="container black-container">
      

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearUsuarioModal">
  <i class="fas fa-user-plus"></i> 
 
</button>
<br>
  <br>
        <div class="input-group mb-3" style="z-index: 2;">
            <input type="text" id="search" class="form-control" placeholder="Buscar por nombre">
            <div class="input-group-append">
                <button class="btn btn-primary" id="searchBtn" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
<th><i class="fas fa-user text-primary"></i> Nombre</th>
<th><i class="fas fa-envelope text-info"></i> Email</th>
<th><i class="fas fa-briefcase text-success"></i> Cargo</th>
<th><i class="fas fa-cogs text-warning"></i> Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
<td>
    @if ($user->id_cargo === 1)
        <i class="fas fa-user-shield text-danger"></i> Administrador
    @elseif ($user->id_cargo === 2)
        <i class="fas fa-user text-primary"></i> Usuario
    @endif
</td>


                        
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




<!-- Modal -->
<div class="modal fade" id="crearUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
          </div>
          <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="id_cargo">Cargo:</label>
            <select class="form-control" id="id_cargo" name="id_cargo">
              <option value="1" {{ old('id_cargo') == 1 ? 'selected' : '' }}>Administrador</option>
              <option value="2" {{ old('id_cargo') == 2 ? 'selected' : '' }}>Usuario</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>










    <script src="{{ asset('js/Plantillanav.js') }}"></script>
<br>
<br>
    @include('plantillas.Terminos_condiciones')
    @include('plantillas.fooster')
    @include('plantillas.Animacion')
</body>
</html>
