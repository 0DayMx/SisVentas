<!DOCTYPE html>
<html lang="es">

<head>

	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

	<title>@yield('title')</title>

	  <!-- Select en lista desplegable -->
    {!! Html::style( 'select2/css/select2.min.css' ) !!}

    {!! Html::style( 'css/bootstrap.min.css' ) !!}
    {!! Html::style( 'css/font-awesome.css' ) !!}
    {!! Html::style( 'css/AdminLTE.min.css' ) !!}

    <!-- Datatables -->
    {!! Html::style( 'dataTables.net-bs/css/dataTables.bootstrap.min.css' ) !!}

    {!! Html::style( 'css/_all-skins.min.css' ) !!}

		<!-- Bootstrap Material Datetime Picker Css (Modal calendario) -->
    {!! Html::style( 'plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css' ) !!}

     <!-- Sweetalert Css -->
    {!! Html::style( 'plugins/sweetalert/sweetalert.css' ) !!}

    {!! Html::style( 'css/style.css' ) !!}    

	  <link rel="shortcut icon" type="image/png" href="{{{ asset('favicon.ico') }}}"> 

	  @section('cabecera')
    @show

</head>

<body class="hold-transition skin-yellow-light sidebar-mini">
    <div class="wrapper">
      	<header class="main-header">

      		<!-- Logo -->
        	<a href="#" class="logo">
        		<!-- mini logo for sidebar mini 50x50 pixels -->
          		<span class="logo-mini"><b>ER</b>P</span>
          		<!-- logo for regular state and mobile devices -->
          		<span class="logo-lg"><b>ERP0Day</b></span>
        	</a>

        	<!-- Header Navbar: style can be found in header.less -->
        	<nav class="navbar navbar-static-top" role="navigation">
          		<!-- Sidebar toggle button-->
          		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            		<span class="sr-only">Navegación</span>
          		</a>

          		 <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-green-active">Online</small>
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                     <img src="http://oday.mx/images/0Day.png" class="img-thumbnail" alt="User Image">
                    <p>
                      Usuario : {{ Auth::user()->name }}
                      <small>ERP  | < /0Day > </small>
                    </p>

                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        	</nav>
      	</header>

      	<aside class="main-sidebar">
        	  <!-- sidebar: style can be found in sidebar.less -->
        	  <section class="sidebar">
          		  <!-- Sidebar user panel -->
                    
          		  <!-- sidebar menu: : style can be found in sidebar.less -->
          		  <ul class="sidebar-menu">
            		    <li class="header"></li>            
            
            		    <!-- Se incluyen los Menús -->
            		    @include( 'Layouts.Menus.almacen' )
            		    @include( 'Layouts.Menus.compras' )
            		    @include( 'Layouts.Menus.ventas' )
										@include( 'Layouts.Menus.cotizador' )
            		    @include( 'Layouts.Menus.acceso' )
                    @include( 'Layouts.Menus.configuracion' )
            
             		    <li>
              			    <a href="#">
                			      <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                			      <small class="label pull-right bg-red">PDF</small>
              			    </a>
            		    </li>
            		
            		    <li>
              			    <a href="#">
                			      <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                			      <small class="label pull-right bg-yellow">0DAY</small>
              			    </a>
            		    </li>
                        
          		  </ul>
        	  </section>
        </aside>

      	<!--Contenido-->
      	<div class="content-wrapper">

        	  <!-- Main content -->
        	  <section class="content">
 
        		    @yield('body')

        	  </section>
      	
      	</div><!-- div content-wrapper -->
      	<!-- Fin contenido -->

      	<footer class="main-footer">
        	  <div class="pull-right hidden-xs">
          		  <b>Version</b> 1.0.0
        	  </div>
        	  <strong>Copyright &copy; 2018 
        		    <a href="www.oday.mx">0DAY</a>.
        	  </strong> All rights reserved.
      	</footer>

    </div><!-- div wrapper -->

    <!-- jQuery 2.1.4 -->
    {!! Html::script( 'js/jQuery-2.1.4.min.js' ) !!}
    {!! Html::script( 'js/bootstrap.min.js' ) !!}
    {!! Html::script( 'js/app.min.js' ) !!}

    <!-- SweetAlert Plugin Js -->
    {!! Html::script( 'plugins/sweetalert/sweetalert.min.js' ) !!}    
    @include( 'sweet::alert' )

		<!-- datetime picker (Modal calendario)-->
		{!! Html::script( 'plugins/momentjs/moment.js' ) !!}
    {!! Html::script( 'plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js' ) !!}

    <!-- Select en lista desplegable  -->
    {!! Html::script( 'select2/js/select2.full.min.js' ) !!}

    <!-- ids tablas jquery -->
    {!! Html::script( 'js/custom_dataTable.js' ) !!}

    <!-- Sweet alerts -->
    {!! Html::script( 'js/custom_sweet.js' ) !!}

    <!-- Datatables -->
    {!! Html::script( 'dataTables.net-bs/js/jquery.dataTables.js' ) !!}   
    {!! Html::script( 'dataTables.net-bs/js/dataTables.bootstrap.min.js' ) !!}
   

    <script>
        $(function () {
            //Initialize Select2 Elements
            $( '.select2' ).select2()

            $( document ).ready( function(){
                $( '[data-toggle="tooltip"]' ).tooltip();
            });

        });

    </script>

    @yield('scripts') 

</body>
</html>