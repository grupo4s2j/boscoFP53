<?php
require_once('bdd.php');


$sql = "SELECT id, titulo, descripcion, relevancia, fechaInicio, fechaFin, color FROM recursos Where activo = 1 AND fechaInicio IS NOT NULL";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="/calendar/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FullCalendar -->
    <link href='/calendar/css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    #calendar {
        max-width: 800px;
    }
    .col-centered{
        float: none;
        margin: 0 auto;
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div id="messages" >

</div>
				<div id="calendar" class="col-centered">
				</div>
        <!-- Modal -->
        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-horizontal" method="POST" action="/calendar/addEvent.php">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Añadir evento</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Título</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="Título">
										</div>
                  </div>
									<div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Decripción</label>
                    <div class="col-sm-10">
                      <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripción">
                    </div>
                  </div>
									<div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Relevancia</label>
                    <div class="col-sm-10">
                      <input type="number" name="descripcion" class="form-control" id="relevancia" min="1" max="5" placeholder="Relevancia">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Color</label>
                    <div class="col-sm-10">
                      <select name="color" class="form-control" id="color">
                          <option value="">Elige un color</option>
                          <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
                          <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
                          <option style="color:#008000;" value="#008000">&#9724; Verde</option>                       
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                          <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                          <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
                          <option style="color:#000;" value="#000">&#9724; Negro</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="start" class="col-sm-2 control-label">Fecha inicio</label>
                    <div class="col-sm-10">
                      <input type="text" name="start" class="form-control" id="start" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="end" class="col-sm-2 control-label">Fecha final</label>
                    <div class="col-sm-10">
                      <input type="text" name="end" class="form-control" id="end" readonly>
                    </div>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        
        
        
        <!-- Modal -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-horizontal" method="POST" action="/calendar/editEventTitle.php">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar evento</h4>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Título</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="Título">
                    </div>
                  </div>
									<div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Decripción</label>
                    <div class="col-sm-10">
                      <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripción">
                    </div>
                  </div>
									<div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Relevancia</label>
                    <div class="col-sm-10">
                      <input type="number" name="descripcion" class="form-control" id="relevancia" min="1" max="5" placeholder="Relevancia">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Color</label>
                    <div class="col-sm-10">
                      <select name="color" class="form-control" id="color">
                          <option value="">Elige un color</option>
                          <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
                          <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
                          <option style="color:#008000;" value="#008000">&#9724; Verde</option>                       
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                          <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                          <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
                          <option style="color:#000;" value="#000">&#9724; Negro</option>
                          
                        </select>
                    </div>
                  </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label class="text-danger"><input type="checkbox"  name="delete"> Borrar evento</label>
                          </div>
                        </div>
                    </div>
                  <input type="hidden" name="id" class="form-control" id="id">         
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="../calendar/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../calendar/js/bootstrap.min.js"></script>
    
    <!-- FullCalendar -->
    <script src='../calendar/js/moment.min.js'></script>
    <script src='../calendar/js/fullcalendar.min.js'></script>
    
    <script>

    $(document).ready(function() {
        var date = new Date();
        var currentDate = date.getFullYear() + " " + (date.getMonth() + 1); 
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
						firstDay: 1,
						monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    				monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
    				dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    				dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
            defaultDate: currentDate,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                
                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title').val(event.title);
										$('#ModalEdit #descripcion').val(event.descripcion);
										$('#ModalEdit #relevancia').val(event.relevancia);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position
                edit(event);
            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                edit(event);
            },
            events: [
            <?php foreach ($events as $event) :
                $start = explode(" ", $event['fechaInicio']);
                $end = explode(" ", $event['fechaFin']);
                if ($start[1] == '00:00:00') {
                    $start = $start[0];
                } else {
                    $start = $event['fechaInicio'];
                }
                if ($end[1] == '00:00:00') {
                    $end = $end[0];
                } else {
                    $end = $event['fechaFin'];
                }
            ?>
                {
                    id: '<?php echo $event['id']; ?>',
                    title: '<?php echo $event['titulo']; ?>',
										descripcion: '<?php echo $event['descripcion']; ?>',
										relevancia: '<?php echo $event['relevancia']; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    color: '<?php echo $event['color']; ?>',
                },
            <?php endforeach; ?>
            ]
        });
        
        function edit(event){
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }
            
            id =  event.id;
            
            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;
            
            $.ajax({
             url: '/calendar/editEventDate.php',
             type: "POST",
             data: {Event:Event},
             success: function(rep) {
                    if(rep == 'OK'){
                        $('#messages').append('' +
                            '<div id="alertdiv" class="alert alert-success">' +
                            '<a class="close" data-dismiss="alert">×</a>' +
                            '<span>Guardado</span>' +
                            '</div>');
                            setTimeout(function() { // this will automatically close the alert and remove this if the users doesnt close it in 5 secs


                            $("#alertdiv").remove();

                        }, 3000);

                    }else{
                        $('#messages').append('' +
                            '<div id="alertdiv" class="alert alert-danger">' +
                            '<a class="close" data-dismiss="alert">×</a>' +
                            '<span>Could not be saved. try again.'+rep+'</span>' +
                            '</div>');
                        setTimeout(function() { // this will automatically close the alert and remove this if the users doesnt close it in 5 secs


                            $("#alertdiv").remove();

                        }, 3000);



                    }
                }
            });
        }




    });

</script>

</body>

</html>
