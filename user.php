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
		<link rel="icon" type="image/png" href="images/favicon.png" />
	</head>
	<body>
		<?php
			include_once 'conexion.php';
			include_once 'header.php';
			  
			$consulta_recurso = ("SELECT * FROM recurso");
			$consulta_categoria = ("SELECT * FROM categoria");
			$result_recurso = mysqli_query($con, $consulta_recurso);
			$result_categoria = mysqli_query($con, $consulta_categoria);

			?>
			<form action="resultados.php" method="GET">
				<input id="checkbox" type="checkbox" name="estado_recurso[]" value="0">Disponible<br/><br>
				<input id="checkbox" type="checkbox" name="estado_recurso[]" value="1">Ocupado<br/><br>

			   	<!-- Categoria -->
				<select id="categoria" name="categoria">
						<option value="">Seleccionar categoría</option>
						<?php
						while($fila=mysqli_fetch_array($result_categoria)){
							echo utf8_encode("<option value=\"$fila[id]\">$fila[nombre]</option>");
						}
			        	?>
			    </select><br/><br>

					<input id="boton" type="submit" value="Enviar">
					<input id="boton" type="reset" value="Cancelar">
					<input id="boton" type="button" onclick="alert('Rellena los campos necesarios')" value="?">
			</form>
		


		<!-- VENTANA MODAL QUE APARECERÁ CUANDO SE ESCRIBA LA MEJORA -->
		<div class="modal fade" id="helloModal">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" id="close" data-dismiss="modal" aria-hidden="true">×</button>
		                <h4 class="modal-title">Millores NET Jesuïtes Educació </h4>
		            </div>
		            <div class="modal-body">
							<p>La teva millora ha estat registrada.En breu sabràs l'estat de la millora. </p>
							<p><b>Moltes gràcies!</b></p>
		            </div>
		        </div>
		    </div>
		</div>

		
		<div class="container" style="margin-top:10px">
			<!-- FORMULARIO PRINCIPAL DE DONDE OBTENDRÁ LOS DATOS LA TABLA -->
			<!-- <form id="frmMillora" name="frmMillora" role="form" action="updateReg.php">
				<div class="form-group">
					<?php
						echo "<input name='usuari' id='usuari' type='text' class='form-control' data-bv-field='usuari' value='$nomUsuari' style='display:none' />"
	            	?>
	            </div> -->

	            <!-- PARTE DONDE SE ENCUENTRA EL TITULO, AREA Y DESCRIPCION DE LA MEJORA -->
				<!-- <div class="row" style="width:100%;margin-top:20px">
				    <h1 style="margin-left:15px">Possibles millores</h1>
					<div class="col-md-20" style="margin-left:20px">
			            <div class="panel panel-default">
			                <div class="panel-body"> 
			                	<div class="form-inline form-group"> 
				                	<input name="titol" id="titol" type="text" class="form-control" placeholder="Títol de la millora" data-bv-field='titol' maxlength="25" size="68" />
				                	<select class="btn btn-default" id="area" name="area" data-bv-field='area'>
				                		<option value="Escollir area">Escollir àrea</option>
				                		<option value="Arxius">Arxius</option>
				                		<option value="Calendari">Calendari</option>
				                		<option value="Centre Notificacions">Centre Notificacions</option>
				                		<option value="Configuració">Configuració</option>
				                		<option value="Disseny">Disseny</option>
				                		<option value="Inici">Inici</option>
				                		<option value="Llista">Llista</option>
				                		<option value="Lloc Web">Lloc Web</option>
									  	<option value="NET General">NET General</option>
									</select>
			                	</div>
				                <div class="form-group">
				                	<textarea class="form-control counted" name="millora" id="millora" placeholder="Descripció" rows="5" style="margin-bottom:10px;width:100%" data-bv-field='millora'></textarea>
			                	</div>
			                	<h6 class="pull-left" id="counter">500 caràcters encara</h6>
		            			<button class="btn btn-flat btn-primary pull-right" id="enviar" name="enviar" type="submit">Envia</button>
			                </div>
			            </div>
		            </div>             
			    </div> -->

			    <!-- PARTES OCULTAS PARA QUE LEA UN VALOR EN LA BASE DE DATOS -->
			    <!-- <div class="form-group" style="display:none;">
			        <label >Puntuació</label>
			        <div class="col-xs-10">
			            <input id="puntuacio" name="puntuacio" type="number" />
			        </div>
			    </div>
			    <div class="form-group" style="display:none;">
			        <label class="col-xs-2 control-label">Prioritat</label>
			        <div class="col-xs-10">
			            <select class="btn btn-default" name="prioritat" id="prioritat">
						    <option value="1">1</option>
						    <option value="2">2</option>
						    <option value="3">3</option>
						    <option value="4">4</option>
						    <option value="5">5</option>
						</select>
			        </div>
			    </div>	
			    <div class="form-group" style="display:none;">
			        <label class="col-xs-2 control-label">Estat</label>
			        <div class="col-xs-10">
			            <select class="btn btn-default" name="estat" id="estat">
						    <option value="Pendent">Pendent</option>
						    <option value="En procés">En procés</option>
						    <option value="Descartada">Descartada</option>
						    <option value="Finalitzada">Finalitzada</option>
						</select>
			        </div>
			    </div>
			</form> -->


			<!-- FORMULARIO ESTRUCTURADO PARA QUE APAREZCA EN LA VENTANA MODAL -->
			<!-- <form id="frmModal" class="form-horizontal" style="display: none;" role="form" action="updateModal_admin.php">
				<div class="form-group" style="display: none;">
			        <label class="col-xs-2 control-label">ID_Millora</label>
			        <div class="col-xs-10">
			            <input type="text" class="form-control" id="id_millora" name="id_millora" readonly="readonly" />
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-xs-2 control-label">Autor</label>
			        <div class="col-xs-10">
			            <input type="text" class="form-control" id="usuari2" name="usuari2" readonly="readonly" />
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-xs-2 control-label">Títol</label>
			        <div class="col-xs-10">
			            <input type="text" class="form-control" id="titol2" name="titol2" readonly="readonly" />
			        </div>
			    </div>	
			    <div class="form-group">
			        <label class="col-xs-2 control-label">Descripció</label>
			        <div class="col-xs-10">
			            <textarea name="millora2" id="millora2" rows="6"  class="form-control noresize" readonly="readonly"></textarea>
			        </div>
			    </div>
			    <div class="form-group">
			        <label class="col-xs-2 control-label">Àrea</label>
			        <div class="col-xs-4">
		        		<select class="btn btn-default" id="area2" name="area2" data-bv-field='area'>
	                		<option value="Escollir area">Escollir àrea</option>
	                		<option value="Arxius">Arxius</option>
	                		<option value="Calendari">Calendari</option>
	                		<option value="Centre Notificacions">Centre Notificacions</option>
	                		<option value="Configuració">Configuració</option>
	                		<option value="Disseny">Disseny</option>
	                		<option value="Inici">Inici</option>
	                		<option value="Llista">Llista</option>
	                		<option value="Lloc web">Lloc Web</option>
						  	<option value="NET General">NET General</option>
						</select>
		        	</div>
			    </div>
			    <div class="form-group">
			        <label class="col-xs-2 control-label">Prioritat</label>
			        <div class="col-xs-10">
			            <select class="btn btn-default" name="prioritat2" id="prioritat2">
						    <option value="1">1</option>
						    <option value="2">2</option>
						    <option value="3">3</option>
						    <option value="4">4</option>
						    <option value="5">5</option>
						</select>
			        </div>
			    </div>	
			    <div class="form-group">
			        <label class="col-xs-2 control-label">Estat</label>
			        <div class="col-xs-10">
			            <select class="btn btn-default" name="estat2" id="estat2">
						    <option value="Pendent">Pendent</option>
						    <option value="En procés">En procés</option>
						    <option value="Descartada">Descartada</option>
						    <option value="Finalitzada">Finalitzada</option>
						</select>
			        </div>
			    </div>
			</form> -->

			<!-- TITULO Y PRINCIPIO DE LA TABLA BOOTSTRAP -->
    		<!-- <h1>Millores proposades pels usuaris</h1> -->
			<table id="tablaJS" data-toolbar="#custom-toolbar"></table>
		</div>


		<!-- SCRIPT PARA CONSTRUIR LA TABLA BOOTSTRAP Y EL VALIDADOR DEL FORUMLARIO -->
		<script>
			$(function () {
			     $('#tablaJS').bootstrapTable({
			         method: 'get',
			         url: 'loadReg.php',
					queryParams: function (p) {
						return { titol: $('#titol').val() };
					},
			         cache: false,
			         height: 500,
			         striped: true,
			         pagination: true,
			         pageSize: 100,
			         pageList: [10, 25, 50, 100, 200],
			         search: true,
			         showColumns: true,
			         showRefresh: true,
					 showToggle: false,
			         minimumCountColumns: 2,
			         clickToSelect: false,
			         columns: [{
			             field: 'nombre',
			             title: 'Nombre del recurso',
			             align: 'left',
			             valign: 'middle',
			             sortable: true
			         }, {
			             field: 'contenido',
			             title: 'Descripción',
			             align: 'center',
			             valign: 'middle',
			             sortable: true
			         }, {
			             field: 'imagen',
			             title: 'Imágen',
			             align: 'center',
			             valign: 'middle',
			             sortable: true
			         }/*, {
			         	 field: 'prioritat',
			         	 title: 'Prioritat',
			         	 align: 'center',
			         	 valign: 'middle',
			         	 sortable: true
			         }, {
			             field: 'estat',
			             title: 'Estat',
			             align: 'center',
			             valign: 'middle',
			             sortable: true
			         }, {
			             field: 'mitjana',
			             title: 'Puntuació',
			             align: 'center',
			             valign: 'middle',
						 sortable: true,
						 formatter: starFormatter
			         }*/]
		       	 }).on('click-row.bs.table', function (e, row, $element) {
				         //alert('Event: click-row.bs.table, data: ' + JSON.stringify(row));
						
						$('#frmModal')
						 .find('[name="id_millora"]').val(row.id_millora).end()
						 .find('[name="usuari2"]').val(row.autor).end()
						 .find('[name="titol2"]').val(row.titol).end()
						 .find('[name="millora2"]').val(row.millora).end()
						 .find('[name="area2"]').val(row.area).end()
						 .find('[name="prioritat2"]').val(row.prioritat).end()
						 .find('[name="estat2"]').val(row.estat).end()
						 .find('[name="puntuacio2"]').val(row.puntuacio).end();

						bootbox
							.dialog({
								title: 'Visualització de la millora',
								message: $('#frmModal'),
								show: false, // We will show it manually later
								buttons: {
									success: {
										label: "Guardar",
										className: "btn-flat btn-success",
										callback: function (){
											$.post( $("#frmModal").attr("action"), 
												$("#frmModal").serializeArray(),function(data){ 
													$('#tablaJS').bootstrapTable('refresh');
												}
											);
										}
									},
									main: {
										label: "Tancar",
										className: "btn-flat btn-default",
										callback: function() {
														
										}
									}
								}
							})
							.on('shown.bs.modal', function() {
								$('#frmModal')
				                 .show()                             // Show the login form
								})
							.on('hide.bs.modal', function(e) {
								// Bootbox will remove the modal 
								// after hiding the modal
								// Therefor, we need to backup the form
								$('#frmModal').hide().appendTo('body');
							})
							.modal('show');				
						
						
					});
					
					/* SOLUCION PARA REDIMENSIONAR AUTOMATICAMENTE LOS CAMPOS DE LA TABLA */

					$(window).resize(function () {
				        $('#tablaJS').bootstrapTable('resetView');
				    });

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
						format: "(%1 caràcters restants)",
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