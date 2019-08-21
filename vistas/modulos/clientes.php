<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar mesas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar mesas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar mesa y datos del mesero que lo administra

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>No Mesa</th>
           <th>Mesero a Cargo </th>
         

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

          foreach ($clientes as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>
                    <td>'.$value["numero"].'</td>
                    <td>'.$value["nombre"].'</td>
                    
                    <td>
                      <div class="btn-group">                          
                        <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id_cliente"].'"><i class="fa fa-pencil"></i></button>                                             
                        <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id_cliente"].'"><i class="fa fa-times"></i></button>
                      </div>  
                    </td>
                  </tr>';
                  
            }

        ?>
   
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Mesa y mesero que atiende</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">              
              <div class="input-group">            
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                              
                <input type= "text" class = "form-control input-lg" name="nuevoCliente"  id="nuevoCliente"  

                 <?php

                 $item = null;
                 $valor= null;
                 $mediciones = ControladorClientes::ctrMostrarNumeroMesas($item, $valor);
                    foreach ($mediciones as $key => $value) {                    
                      echo ' value="'.$value["mesas"].'"';
                    }
                  ?>  
                 readonly  >
              </div>
            </div>       
            
          <!-- ENTRADA PARA SELECCIONAR MEDICIÓN-->

          <div class="form-group">              
                <div class="input-group">            
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <select class = "form-control input-lg" name="nuevoMesero" >                  
                  <option id="nuevoMesero">Seleccione al Mesero</option>
                 <?php

                 $item = null;
                 $valor= null;
                 $mediciones = ControladorClientes::ctrMostrarMeseros($item, $valor);
                    foreach ($mediciones as $key => $value) {                    
                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                    }
                  ?>  
                </select>
              </div>
            </div>           

           
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar mesa</button>

        </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
       $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Mesa</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA NUMERO -->
            <div class="form-group">              
              <div class="input-group">            
                <span class="input-group-addon"><i class="fa fa-th"></i></span>                                               
                <input type= "text" class = "form-control input-lg" name="editarCliente"  id="editarCliente"  readonly  >
              </div>
            </div>       
            
          <!-- ENTRADA PARA SELECCIONAR MESERO-->

          <div class="form-group">              
                <div class="input-group">            
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <select class = "form-control input-lg" name="editarMesero" > 
                  <option id="editarMesero"></option>
                 <?php

                 $item = null;
                 $valor= null;
                 $mediciones = ControladorClientes::ctrMostrarMeseros($item, $valor);
                    foreach ($mediciones as $key => $value) {                    
                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                    }
                  ?>  
                </select>
              </div>
            </div>           

            
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="editar" >Guardar Mesa</button>

        </div>

      </form>

      <?php

      $editarCliente = new ControladorClientes();
      $editarCliente -> ctrEditarCliente();

      ?>

    

    </div>

  </div>

</div>

<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>


