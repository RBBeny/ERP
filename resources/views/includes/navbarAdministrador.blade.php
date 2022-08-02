<link rel="stylesheet" href="{{ asset('css/navbar.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />       
<input type="checkbox" id="checkk">
        <div class="cabezera">
            <div class="contentenidoCabezera">
            <label for="checkk">
                <i class="fas fa-bars" id="barraMenu_btn"></i>
            </label>
           <div class="Izquierda_area">
               <h3>ERP <span>Jarcie</span></h3>
           </div>
           <div class="Derecha_area">
           
               <a href="/logout" class="btn btn-primary botonCerrar">Cerrar Sesión</a>
            </div>
            </div>
        </div>
        <div class="barraMenu">
            <center>
            <i class="fas fa-user fa-5x" ></i>
            <h4>
                @if(auth()->check())
                {{ auth()->user()->nomUsuario }}
         @endif
            </h4>
            </center>
            <a href="/homeAdmin"> <i class="fas fa-home fa-lg"></i></i><span>Home</span></a>
            <a href="/verUsuarios"> <i class="fas fa-user-plus fa-lg"></i></i><span>Usuarios</span></a>



        </div>

   
