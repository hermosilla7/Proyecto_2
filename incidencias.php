<?php
	include_once 'conexion.php';
	include_once 'header.php';
	

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	  
	$consulta_incidencias = ("SELECT * FROM incidencia");
	$result_incidencias = mysqli_query($con, $consulta_incidencias);

	$consulta_recursos = ("SELECT * FROM recurso");
	$result_recursos = mysqli_query($con, $consulta_recursos);

?>

		<div class="container" style="margin-top:10px">
			<div class="incidencias"><!-- FORMULARIO PRINCIPAL DE DONDE OBTENDRÁ LOS DATOS LA TABLA -->
			<form id="frmIncidencia" name="frmIncidencia" role="form" action="incidencias_insert.php">

	            <!-- PARTE DONDE SE ENCUENTRA EL TITULO, AREA Y DESCRIPCION DE LA MEJORA -->
				<div class="row" style="width:100%;margin-top:20px">
				    <h1 style="margin-left:15px">Formulario de incidencias</h1>
				    
					<div class="col-md-20" style="margin-left:20px">
			            <div class="panel panel-default">
			                <div class="panel-body"> 
			                	<div class="form-group"> 
				                	<input name="titulo" id="titulo" type="text" class="form-control" placeholder="Titulo de la incidencia" maxlength="50" size="60" />
			                	</div>
			                	<div class="form-group">
			                		<select class="btn btn-default" id="recurso" name="recurso">
										<option value="">Seleccionar recurso</option>
										<?php
										while($fila=mysqli_fetch_array($result_recursos)){
											echo utf8_encode("<option value=\"$fila[id_recurso]\">$fila[nombre]</option>");
										}
							        	?>
								    </select>
			                	</div>
				                <div class="form-group">
				                	<textarea class="form-control counted" name="descripcion" id="descripcion" placeholder="Descripción" rows="5" style="margin-bottom:10px;width:100%"></textarea>
			                	</div>
			                	<h6 class="pull-left" id="counter">500 caràcters encara</h6>
		            			<button class="btn btn-flat btn-primary pull-right2" id="enviar" name="enviar" type="submit">Envia</button>
			                </div>
			            </div>
		            </div>  
		            </div>           
			    </div>
			</form>
		</div>

		<script>
			$(function () {
				/* VALIDACION DE LOS CAMPOS DEL FORMULARIO, SI ESTAN RELLENOS O NO */
				$('#frmIncidencia')	.bootstrapValidator({
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
			            titulo: {
			            	err: 'tooltip',
							row: '.col-xs-4',
			                validators: {
			                    notEmpty: {
			                        message: "Necesitamos un título de la incidencia"
			                    }
			                }
			            },
			            descripcion: {
			            	err: 'tooltip',
							row: '.col-xs-4',
			                validators: {
			                    notEmpty: {
			                        message: "Necesitamos la descripción de la incidencia"
			                    }
			                }
			            },
			            recurso: {
			            	err: 'tooltip',
			                row: '.col-xs-4',
			                validators: {
			                    notEmpty: {
			                        message: 'Necesitamos un recurso para asociarlo a la incidencia'
			                    }
			                }
			            }
			        },	 
			    });
			});
		</script>

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
	include 'footer.php';
?>