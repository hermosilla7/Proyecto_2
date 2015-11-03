<!DOCTYPE html>
<html>
	<head>
		<html lang="es">
		<meta charset="utf-8">
		<title>Reserva de Material</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- JQUERY -->
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> 

		<!-- BOOTSTRAP -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

		<!-- BOOTSTRAP TABLE -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.5.0/bootstrap-table.min.css">
		<script type="text/javascript" src="js/bootstrap-table/bootstrap-table.js"></script>
		<script type="text/javascript" src="js/bootstrap-table/bootstrap-table-ca-ES.js"></script>
		<script src="//oss.maxcdn.com/bootbox/4.2.0/bootbox.min.js"></script>

		<!-- BOOTSTRAP SELECT -->
		<link rel="stylesheet" href="css/bootstrap-select.min.css">
		<script type="text/javascript" src="js/bootstrap-select.min.js"></script>

		<!-- VALIDATION -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css"></link>
		<script type="text/javascript" src="js/bootstrapValidator.js"></script>
		
		<!-- Generic page styles -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" type="image/png" href="img/favicon.png" />
	</head>
	<body>
		<?php
			include_once 'conexion.php';
			include_once 'header.php';
			  
			$consulta_recurso = ("SELECT * FROM recurso");
			$consulta_categoria = ("SELECT * FROM categoria");
			$result_recurso = mysqli_query($con, $consulta_recurso);
			$result_categoria = mysqli_query($con, $consulta_categoria);


			//creamos la sesion
			session_start();

			$nomUsuari = $_SESSION['nom'];

			//validamos si se ha hecho o no el inicio de sesion correctamente
			//si no se ha hecho la sesion nos regresará a index.html
			if(!isset($_SESSION['nom'])) 
			{
			  header('Location: index.html'); 
			  exit();
			}
		?>
		<form action="resultados.php" method="GET">
			<div class="checkbox">
				<label class="checkbox-inline">
					<input id="checkbox" type="checkbox" name="estado_recurso[]" value="0">Disponible
				</label>
				<label class="checkbox-inline">
					<input id="checkbox" type="checkbox" name="estado_recurso[]" value="1">Ocupado
				</label>
			</div>
			
		   	<!-- Categoria -->
			<select class="btn btn-default" id="categoria" name="categoria">
					<option value="">Seleccionar categoría</option>
					<?php
					while($fila=mysqli_fetch_array($result_categoria)){
						echo utf8_encode("<option value=\"$fila[id]\">$fila[nombre]</option>");
					}
		        	?>
		    </select><br/><br>

				<input class="btn btn-default" id="botonEnviar" type="submit" value="Enviar">
				<input class="btn btn-danger" id="botonCancelar" type="reset" value="Cancelar">
				<input class="btn btn-success" id="botonAyuda" type="button" value="?">
		</form>

		<script type="text/javascript">
			$('#botonAyuda').popover({
				title: 'Ayuda',
				content: 'Rellena los campos necesarios',
				placement: 'right'
			});

			
		</script>
		


		<!-- VENTANA MODAL QUE APARECERÁ CUANDO SE ESCRIBA LA MEJORA -->
		<div class="modal fade" id="helloModal">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" id="close" data-dismiss="modal" aria-hidden="true">×</button>
		                <h4 class="modal-title">Incidencias Club Estudio</h4>
		            </div>
		            <div class="modal-body">
							<p>Tu incidencia ha sido registrada. En breve sabrás el estado de la incidencia.</p>
							<p><b>Muchas grácias!</b></p>
		            </div>
		        </div>
		    </div>
		</div>

		
		<div class="container" style="margin-top:10px">
			<!-- FORMULARIO PRINCIPAL DE DONDE OBTENDRÁ LOS DATOS LA TABLA -->
			<form id="frmIncidencia" name="frmIncidencia" role="form" action="updateReg.php">
				<div class="form-group">
					<?php
						echo "<input name='usuari' id='usuari' type='text' class='form-control' value='$nomUsuari' style='display:none' />"
	            	?>
	            </div>

	            <!-- PARTE DONDE SE ENCUENTRA EL TITULO, AREA Y DESCRIPCION DE LA MEJORA -->
				<div class="row" style="width:100%;margin-top:20px">
				    <h1 style="margin-left:15px">Posibles incidencias</h1>
					<div class="col-md-20" style="margin-left:20px">
			            <div class="panel panel-default">
			                <div class="panel-body"> 
			                	<div class="form-inline form-group"> 
				                	<input name="titulo" id="titulo" type="text" class="form-control" placeholder="Titulo de la incidencia" maxlength="50" size="68" />
				                	<select class="btn btn-default" id="recurso" name="recurso">
				                		<option value="Escoger recurso">Escoger recurso</option>
				                		<option value="Aula">Aula</option>
				                		<option value="Portatil">Portatil</option>
									</select>
			                	</div>
				                <div class="form-group">
				                	<textarea class="form-control counted" name="contenido" id="contenido" placeholder="Descripción" rows="5" style="margin-bottom:10px;width:100%"></textarea>
			                	</div>
			                	<h6 class="pull-left" id="counter">500 caràcters encara</h6>
		            			<button class="btn btn-flat btn-primary pull-right" id="enviar" name="enviar" type="submit">Envia</button>
			                </div>
			            </div>
		            </div>             
			    </div>
			</form>
		</div>

		<!-- SCRIPT PARA CONSTRUIR LA TABLA BOOTSTRAP Y EL VALIDADOR DEL FORUMLARIO -->
		<script>
			$(function () {
				/* VALIDACION DE LOS CAMPOS DEL FORMULARIO, SI ESTAN RELLENOS O NO */
				$('#frmMillora').bootstrapValidator({
			        framework: 'bootstrap',
			        icon: {
			            valid: 'glyphicon glyphicon-ok',
			            invalid: 'glyphicon glyphicon-remove',
			            validating: 'glyphicon glyphicon-refresh'
			        },
			        err: {
			            container: 'tooltip'
			        },
			        fields: {
			            usuari: {
			            	err: 'tooltip',
							row: '.col-xs-4',
			                validators: {
			                    notEmpty: {
			                        message: "Necessitem el nom de l'usuari"
			                    }
			                }
			            },
			            titol: {
			            	err: 'tooltip',
							row: '.col-xs-4',
			                validators: {
			                    notEmpty: {
			                        message: "Necessitem el títol de la millora"
			                    }
			                }
			            },
			            millora: {
			                row: '.col-xs-4',
			                validators: {
			                    notEmpty: {
			                        message: 'Necessitem la millora'
			                    }
			                }
			            }
			        },

			        /* MOSTRAR VENTANA MODAL DE CONSULTA SATISFACTORIA */
			        submitHandler: function(validator, form, submitButton) {
				                                 
			            $('#helloModal').modal();
						$.post( $("#frmMillora").attr("action"), 
							$("#frmMillora").serializeArray(),function(data){ 
							$('#tablaJS').bootstrapTable('refresh');
							$("#result").show();
							$("#result").html(data); 
							$('#frmMillora').trigger("reset");
						});				
			        }		 
			    });
			});
		</script>


		<!-- CONTADOR DE CARACTERES DEL TEXTAREA DEL FORMULARIO -->
		<script>
			(function($) {
			    /**
				 * attaches a character counter to each textarea element in the jQuery object
				 * usage: $("#myTextArea").charCounter(max, settings);
				 */
				
				$.fn.charCounter = function (max, settings) {
					max = max || 100;
					settings = $.extend({
						container: "<span></span>",
						classname: "charcounter",
						format: "(%1 caracteres restantes)",
						pulse: true,
						delay: 0
					}, settings);
					var p, timeout;
					
					function count(el, container) {
						el = $(el);
						if (el.val().length > max) {
						    el.val(el.val().substring(0, max));
						    if (settings.pulse && !p) {
						    	pulse(container, true);
						    };
						};
						if (settings.delay > 0) {
							if (timeout) {
								window.clearTimeout(timeout);
							}
							timeout = window.setTimeout(function () {
								container.html(settings.format.replace(/%1/, (max - el.val().length)));
							}, settings.delay);
						} else {
							container.html(settings.format.replace(/%1/, (max - el.val().length)));
						}
					};
					
					function pulse(el, again) {
						if (p) {
							window.clearTimeout(p);
							p = null;
						};
						el.animate({ opacity: 0.1 }, 100, function () {
							$(this).animate({ opacity: 1.0 }, 100);
						});
						if (again) {
							p = window.setTimeout(function () { pulse(el) }, 200);
						};
					};
					
					return this.each(function () {
						var container;
						if (!settings.container.match(/^<.+>$/)) {
							// use existing element to hold counter message
							container = $(settings.container);
						} else {
							// append element to hold counter message (clean up old element first)
							$(this).next("." + settings.classname).remove();
							container = $(settings.container)
											.insertAfter(this)
											.addClass(settings.classname);
						}
						$(this)
							.unbind(".charCounter")
							.bind("keydown.charCounter", function () { count(this, container); })
							.bind("keypress.charCounter", function () { count(this, container); })
							.bind("keyup.charCounter", function () { count(this, container); })
							.bind("focus.charCounter", function () { count(this, container); })
							.bind("mouseover.charCounter", function () { count(this, container); })
							.bind("mouseout.charCounter", function () { count(this, container); })
							.bind("paste.charCounter", function () { 
								var me = this;
								setTimeout(function () { count(me, container); }, 10);
							});
						if (this.addEventListener) {
							this.addEventListener('input', function () { count(this, container); }, false);
						};
						count(this, container);
					});
				};

			})(jQuery);

			$(".counted").charCounter(500,{container: "#counter"});

			
		</script>

<?php  
	include "footer.php";
?>