<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>

	{!! Html::style('css/pdf.css') !!}
	<link rel="shortcut icon" type="image/png" href="{{{ asset('favicon.ico') }}}"> 

</head>

<body style="font-family: 'Play', sans-serif;">

	
	<table style="width: 100%;">
		<thead></thead>
		<tbody>
			<tr>
				<td width="20%">
					<!-- Incluimos el logotipo de la cotizacion -->
					@include( 'Cotizador.PDF.Layouts.logo' )
				</td>
				<td width="50%">
					<!-- Incluimos de los datos de facturación la dirección -->
					@include( 'Cotizador.PDF.Layouts.datosFacturacion' )
				</td>
				<td width="30%">
					<div class="folio">
						<strong>Cot. N° </strong>{!! $cotizacion->no_cotizacion !!}<br>
						<strong>Fecha </strong>{!! $cotizacion->fecha_emision !!}
					</div>
				</td>
			</tr>
		</tbody>
	</table>


	@yield( 'body' )

</body>

</html>
