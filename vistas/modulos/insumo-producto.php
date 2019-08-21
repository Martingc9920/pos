<div class="content-wrapper">
  <section class="content-header">   
    <h1>Administrar Producto-insumos </h1>
    <ol class="breadcrumb">    
      <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>  
      <li class="active">Administrar producto-insumos</li>    <!-- Titulo -->
    </ol>
  </section>
  <section class="content">
    <div class="box">

      <div class="box-header with-border">  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarInsumoProducto">          
          Agregar relación <!--Boton-->
        </button>
      </div>
      <div class="box-body">        

         <!--Tabla-->
       <table class="table table-bordered table-striped dt-responsive tablas " width="100%">         
        <thead>         
         <tr>           
           <th style="width:10px">#</th>
           <th>id</th>
           <th>Producto</th>           
           <th>id</th>
           <th>insumo</th>
           <th>Relación</th>
           <th>Acción</th>
         </tr> 
        </thead>

        <tbody>         
          <!--Código php para hacer consultas a la BDD y llenar la tabla-->
          <?php
            $item = null;
            $valor = null;
            $insumo_producto = ControladorInsumoProducto::ctrMostrarInsumoProducto($item, $valor);
            foreach ($insumo_producto as $key => $value) {          
              echo  '<tr>
                      <td>'.($key+1).'</td>
                      <td class="text-uppercase">'.$value["id_producto"].'</td>
                      <td class="text-uppercase">'.$value["descripcion"].'</td>
                      <td class="text-uppercase">'.$value["id_insumo"].'</td>
                      <td class="text-uppercase">'.$value["nombre_insumo"].'</td>
                      <td class="text-uppercase">'.$value["gasto_de_insumo"].'</td>
                      <td>
                      <div class="btn-group">                            
                        <button class="btn btn-warning btnEditarInsumoProducto" idInsumo="'.$value["id_insumo"].'"  idProducto="'.$value["id_producto"].'" data-toggle="modal" data-target="#modalEditarInsumoProducto"><i class="fa fa-pencil"></i></button>                                                                                               
                        <button class="btn btn-danger btnEliminarInsumoProducto" idInsumo="'.$value["id_insumo"].'"  idProducto="'.$value["id_producto"].'"><i class="fa fa-times"></i></button>                          
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
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarInsumoProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar categoría</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          <div class="box-body">

             <!-- ENTRADA PARA SELECCIONAR MEDICIÓN-->

             <div class="form-group">              
              <div class="input-group">            
                <span class="input-group-addon"><i class="fa fa fa-lemon-o"></i></span> 
                <select class = "form-control input-lg" name="nuevoInsumo" id="nuevoInsumo">                  
                  <option value="">Selecionar Insumo</option>
                 <?php

                 $item = null;
                 $valor= null;
                 $mediciones = ControladorInsumos::ctrMostrarInsumos($item, $valor);
                    foreach ($mediciones as $key => $value) {                    
                      echo '<option value="'.$value["id_insumo"].'">'.$value["nombre_insumo"].'</option>';
                    }
                  ?>  
                </select>
              </div>
            </div>        

            

              <!-- ENTRADA PARA PRODUCTO-->

              <div class="form-group">              
              <div class="input-group">            
                <span class="input-group-addon"><i class="fa fa-cutlery"></i></span> 
                <select class = "form-control input-lg" name="nuevoProducto" id="nuevoProducto">                  
                  <option value="">Selecionar Producto</option>
                 <?php

                 $item = null;
                 $valor= null;
                 $orden = "id";
                 $mediciones = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
                 //echo("<script>console.log('PHP Controlador: " . $mediciones . "');</script>");
                    foreach ($mediciones as $key => $value) {                    
                      echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                    }
                  ?>  
                </select>
              </div>
            </div>        

            <!-- ENTRADA PARA CANTIDAD DE REALACION -->

            <div class="form-group row">
                <div class="col-xs-12">                
                  <div class="input-group">                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                    <input type="number" class="form-control input-lg" id="nuevaCantidad" name="nuevaCantidad" step="any" min="0" placeholder="Relación" required>
                  </div>
                </div>                                    
            </div>


          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar relación</button>
        </div>

        
         <!--Conexión con la BDD-->
        <?php
          $crearInsumoProducto = new ControladorInsumoProducto();
          $crearInsumoProducto -> ctrCrearInsumoProducto();
        ?> 

      </form>
    </div>
  </div>
</div>


<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarInsumoProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar categoría</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          <div class="box-body">

              <!-- ENTRADA PARA SELECCIONAR MEDICIÓN-->

              <div class="form-group">              
              <div class="input-group">            
                <span class="input-group-addon"><i class="fa fa fa-lemon-o"></i></span> 
                <select class = "form-control input-lg" name="editarInsumo" id="editarInsumo">                  
                  <option value="">Selecionar Insumo</option>
                 <?php

                 $item = null;
                 $valor= null;
                 $mediciones = ControladorInsumos::ctrMostrarInsumos($item, $valor);
                    foreach ($mediciones as $key => $value) {                    
                      echo '<option value="'.$value["id_insumo"].'">'.$value["nombre_insumo"].'</option>';
                    }
                  ?>  
                </select>
              </div>
            </div>        

            

              <!-- ENTRADA PARA PRODUCTO-->

              <div class="form-group">              
              <div class="input-group">            
                <span class="input-group-addon"><i class="fa fa-cutlery"></i></span> 
                <select class = "form-control input-lg" name="editarProducto" id="editarProducto">                  
                  <option value="">Selecionar Producto</option>
                 <?php

                 $item = null;
                 $valor= null;
                 $orden = "id";
                 $mediciones = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
                 //echo("<script>console.log('PHP Controlador: " . $mediciones . "');</script>");
                    foreach ($mediciones as $key => $value) {                    
                      echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                    }
                  ?>  
                </select>
              </div>
            </div>        

            <!-- ENTRADA PARA CANTIDAD DE REALACION -->

            <div class="form-group row">
                <div class="col-xs-12">                
                  <div class="input-group">                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                    <input type="number" class="form-control input-lg" id="editarCantidad" name="editarCantidad" step="any" min="0" placeholder="Relación" required>
                  </div>
                </div>                                    
            </div>


          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php
        
          $editarInsumoProducto = new ControladorInsumoProducto();
          $editarInsumoProducto -> ctrEditarInsumoProducto();
            
          

        ?> 

      </form>
    </div>
  </div>
</div>

<!--Conexión con la BDD-->
<?php    
  $borrarInsumoProducto = new ControladorInsumoProducto();
  $borrarInsumoProducto -> ctrBorrarInsumoProducto();

?>

