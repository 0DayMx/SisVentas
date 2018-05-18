<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>

	{{-- Html::style('css/bootstrap.css') --}} 
	{!! Html::style('css/cotizacion.css') !!}

</head>

<body style="font-family: 'Play', sans-serif;">

<!--<table>
		<thead>
			<tr>
				<th>{!! Html::image('img/logoRM.jpg', '', ['width' => '180', 'height' => '65']) !!}</th>
				<th></th>
			</tr>
		</thead>
	</table>-->
	<div id="header"> 
		{!! Html::image('images/reporte/head.png', '', ['class'=>'img-head']) !!}
	</div>

	<div id="footer">
    	<p>
    		<center>
    			<hr width="100%">
    			<hr width="100%">
				<p>Benigno Arriaga No. 260 Col. 21 de Marzo Soledad de Graciano Sánchez, S.L.P. C.P. 78437
					<br>
					Tel. y Fax: (444)822 41 41 &nbsp;&nbsp;&nbsp; (444)822 40 75
				</p>
			</center>
    	</p>
  	</div>	

  	<!-- Marca de agua -->
  	<div id="marca-agua"> 
		{!! Html::image('images/reporte/marca_agua.jpg', '', ['class'=>'img-marca-agua']) !!}
	</div>


<div id="content">
	
	<br>

	<table width="100%">
			
		<thead></thead>
			
		<tbody>
			<tr>
				<td width="50%" style="margin-top: 0px;">

					<div class="body-table-rep-tec">
						<table width="100%">

							<thead></thead>
							<tbody>
								<tr>
									<td>
										<strong>Para:</strong>
										<br><br>
										<strong>{!! $cliente->razon_social !!}</strong>
										<br>
										{!! $cliente->calle !!}
										<br>
										{!! $cliente->colonia !!}
										<br>
										{!! $cliente->localidad !!}
									</td>
								</tr>
							</tbody>
						</table>
					</div>
						
				</td>
				
				<td width="15%" style="margin-top: 0px;">
					<!-- Aquí iria el logotipo del cliente -->
				</td>

				<td width="35%" style="margin-top: 0px;">

					<center>
						<p class="no-cotizacion">
							<strong>COTIZACION:</strong> No. {!! $cotizacion->no_cotizacion !!}
						</p>
						<p class="no-cotizacion">
							{!! $cotizacion->getFechaEmision() !!}
						</p>
					</center>					

				</td>

			</tr>
		</tbody>
	</table>
			
	<br>

		@yield('body')


</div>

<br>

</body>

</html>
