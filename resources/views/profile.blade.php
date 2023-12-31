@include('plantillas.navinicio')

    
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- <h3 class="text-h3">Opciones avanzadas</h3> -->
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

    <h2 class="titulo display-5 font-weight-light">Opciones avanzadas</h2>
    <img src="{{ asset('images/nav6.png') }}" class="imgnav">


    <div class="containertodo">

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="bg-contain1 p-3">
                    <h2 class="text-center">Mi Perfil</h2>
                    <br>
                    <img src="{{ asset('images/Icono.png') }}" alt="Imagen de perfil" width="120" height="120" class="mx-auto d-block">
                    <br>
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name"><i class="fa fa-user"></i> Nombre</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <!-- Cambiar contraseña -->
                        <div class="form-group">
                            <label for="password"><i class="fa fa-lock"></i> Nueva Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation"><i class="fa fa-lock"></i> Confirmar Nueva Contraseña</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        </div>

                        <div class="button-container">
    <button type="submit" class="btn custom-buttonn" id="boton-ocultar"></button>
</div>


<style>
    #boton-ocultar {
        display: none;
    }
</style>


                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="bg-contain2 p-3">
                    <h2 class="text-center">Configuración</h2>
                    <br>
                    <img src="{{ asset('images/Iconoh.png') }}" alt="Imagen de perfil" width="120" height="120" class="mx-auto d-block">

                    <div class="form-group mt-3">
                        <label for="language"><i class="fa fa-cog"></i> Idioma preferido</label>
                        <select class="form-control" id="language">
                            <option value="es">Español</option>
                            <option value="en">Inglés</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for "theme"><i class="fa fa-cog"></i> Tema</label>
                        <select class="form-control" id="theme">
                            <option value="light">Claro</option>
                            <option value="dark">Oscuro</option>
                        </select>
                    </div>


                    <div class="form-group mt-3">
                        <label for="language"><i class="fa fa-cog"></i> Pais</label>
                        <select class="form-control" id="language">
                            <option value="es">Colombia</option>
                            <option value="en">Argentina</option>
                            <option value="en">Chile</option>
                            <option value="en">Panama</option>

                        </select>
                    </div>

                    <h3 class="text-center">Riego manual</h3>
                    <div class="center">
                        <label class="switch">
                            <input type="checkbox" id="toggle" name="toggle" {{ Auth::user()->relay_state ? 'checked' : '' }}>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>




    <div class="button-containerd">
    <button class="custom-save" onclick="ejecutarBoton()">Guardar cambios</button>
    </div>



    </div>

 <script>
        function ejecutarBoton() {
            var boton = document.querySelector('.custom-buttonn');
            if (boton) {
                boton.click(); 
            } else {
                alert('El botón no se encontró en la página.');
            }
        }
    </script>

  <br>
  <br>


    <script src="{{ asset('js/Profile.js') }}"></script>
    
    @include('plantillas.Terminos_condiciones')
    @include('plantillas.fooster')
    @include('plantillas.Animacion')

