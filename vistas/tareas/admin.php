
	<title>Lista de Tareas</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- fullcalendar-->
    <link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='fullcalendar/lib/moment.min.js'></script>
     <script src='fullcalendar/lib/es-us.js'></script>
    <script src='fullcalendar/lib/jquery.min.js'></script>
    <script src='fullcalendar/fullcalendar.min.js'></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '<?= $fecha?>',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true,
      locale:'es', // allow "more" link when too many events
      events: [
      <?php foreach ($calendario as $cal ) { ?>
        
      
        {
          title: '<?= $cal->nombreTarea; ?>',
          start: '<?= $cal->fechaInicio; ?>',
          url: 'index.php?c=tareas&a=update&id=<?= $cal->id_tareas; ?>',
          
        },
      <?php } ?> 
      ]
    });

  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;


  }

  #calendar {
    max-width: 900px;
    margin: 3 auto;
     margin-top: 3%;
     background: 3334432;

  }

</style>
<?php include("header.php"); ?>
</head>

<body  style="   background: #fff; "  >
        <section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">
               <div class="container">
        <div class="row">
            <div class ="panel panel-primary">
                <div class="panel-heading" ><h2 align="center" style="padding: 0;margin: 0; color:#fff;">Tareas</h2></div>
                    <div class="panel-body">     
          <div style="background: #fff;" id="header_wrapper" class="header-xl  profile-header">
            <ul class="card-actions fab-action right">
              <li>
                <?php
                  if ($_SESSION["u"]->documento == 7181470) {
                ?>
                        <button class="btn btn-primary btn-fab"  data-toggle="modal" data-target="#basic_modal"><i class="zmdi zmdi-plus"></i><div class="ripple-container" ></div></button>
              <?php    }
                ?>
                
              </li>
            </ul>
          </div>     
     
 
            <div id='calendar'></div>
          </div>
        </div>
      </div>
   </div>
   </div>   


 <div class="row">
                <div class="col-xs-12">
                  <div class="card">
                    <header class="card-heading ">
                      <h2 class="card-title">Listado de Tareas</h2>
                      
                      <ul class="card-actions icons right-top">
                        <li>
                          <a href="javascript:void(0)" data-toggle="refresh">
                            <i class="zmdi zmdi-refresh-alt"></i>
                          </a>
                        </li>
                        <li class="dropdown">
                          <a href="javascript:void(0)" data-toggle="dropdown">
                            <i class="zmdi zmdi-more-vert"></i>
                          </a>
                          
                        </li>
                      </ul>
                    </header>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th align="center">Id</th>
                              <th align="center">Nombre de la tarea</th>
                              <th align="center">Cliente</th>
                              <th align="center">Fecha de Inicio</th>
                              <th align="center">Fecha de Finalizaciòn</th>
                              <th align="center">Estado</th>   
                              <th align="center">Trabajador Encargado</th>   
                              <th  colspan="2" align="center">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php foreach($tareas as $tarea) {?>
                                 <tr>
                               <td ><?= $tarea->id_tareas; ?></td>
                              <td align="center"><?= $tarea->nombreTarea; ?></td>
                             <td align="center">Nit: <?= $tarea->Clien->nit ?> &nbsp;<br><?= $tarea->Clien->razonSocial ?></td></td>

      
                             <td align="center"><?= $tarea->fechaInicio; ?></td>
                             <td align="center"><?= $tarea->fechaFin; ?></td>
                             <td align="center"><?= $tarea->estado; ?></td>
                            <td align="center"><?= $tarea->Trab->nombres ?>&nbsp;<?= $tarea->Trab->apellidos ?></td>
                       <td align="center" >
 
                     <button
                    style="height:20px; line-height:2px; margin-left; margin:  3%;" onclick="editar(<?= $tarea->id_tareas; ?>)">Editar</button>

                    <button class="btn btn-danger" style="height:20px; line-height:2px; margin-right:; margin-left: 10px;"  onclick="eliminar(<?= $tarea->id_tareas; ?>)">Eliminar</button>
                      </td>
                 </tr>
      <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<br>
   
</div>
<?php include("footer.php"); ?>
	</div>
</div>


            <script type="text/javascript" >
            function eliminar(id){
                swal({
                    title: "Esta seguro?",
                    text: "Este cita se eliminara!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                        swal("Muy bien!", "Se ha eliminado","success");
                        setTimeout(function(){
                        location.href="index.php?c=tareas&a=delete&id="+id;
                    }, 1000);
                    }
                  });
            }
             function editar(id,cita){
                swal({
                    title: "Quieres editar la Tarea:",
                    text: cita,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                  }).then((willDelete) => {
                    if (willDelete) {
                       // swal("Muy bien!", "Espera un momento","//success");
                       // setTimeout(function(){
                        location.href="index.php?c=tareas&a=update&id="+id;
                   // }, 1000);
                    }
                  });
            }
  </script>
<div class="modal fade" id="basic_modal" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel-2">Agregar Nueva Tarea..</h4>
              <ul class="card-actions icons right-top">
                
                <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                  <i class="zmdi zmdi-close"></i>
                </a>
              
            </ul>
          </div>
          <div class="modal-body">
            <form action="index.php?c=tareas&a=create" method="post" autocomplete="off"> 
              <div class="form-group label-floating is-empty">
                <div class="row">

         

              <div class="card">
                  <div class="card-body">
                    <div class="row">

                      <div class="">
                        <div class="form-group is-empty">
                          <div class="">
                            <span class=""><i class=""></i></span>
                            <label class="control-label" >Descripcion de la tarea</label>
                            <br>
                             <input type="text" class="form-control"  name="Tareas[nombreTarea]" 
                             required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"><i class=""></i></span>
                            
                             <label for="" class="control-label">Cliente</label>
                             <br>
                     
                        <select class="select form-control" required="" name="Tareas[id_clientes]">
                           <option>-Seleccion-</option>
                               <?php foreach ( $clientes as $cliente) {?>
                           <option value="<?= $cliente->id_clientes; ?>"><?=$cliente->id_clientes; ?> &nbsp; <?=$cliente->nit; ?> &nbsp;  <?=$cliente->razonSocial; ?> 

                             </option>
                                    <?php } ?>
                        </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"><i class=""></i></span>
                            <label for="" class="control-label">Responsable</label>
                            <br>
                        <select class="select form-control" required="" name="Tareas[id_trabajadores]">
                           <option>-Seleccion-</option>
                               <?php foreach ( $trabajadores as $trabajador) {?>
                           <option value="<?= $trabajador->id_trabajadores; ?>"><?=$trabajador->nombres; ?> &nbsp;<?=$trabajador->apellidos; ?>   </option>
                                    <?php } ?>
                        </select>
                            
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                            <input type="text" class="form-control datepicker" id="start_date" placeholder="Fecha inicio..." name="Tareas[fechaInicio]">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group is-empty">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                            <input type="text" class="form-control datepicker" id="end_date" placeholder="Fecha fin..." name="Tareas[fechaFin]" >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- modal-content -->
        </div>
      </form>
        <!-- modal-dialog -->
      </div>


