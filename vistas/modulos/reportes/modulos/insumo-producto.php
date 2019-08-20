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
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">          
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
                      <td class="text-uppercase">'.$value["nombre_categoria"].'</td>
                      <td class="text-uppercase">'.$value["id_categoria"].'</td>
                      <td class="text-uppercase">'.$value["descripcion"].'</td>
                      <td>
                        <div class="btn-group">                            
                          <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id_categoria"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                     ';
                          if($_SESSION["administrador"] == 1){
                            echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id_categoria"].'"><i class="fa fa-times"></i></button>';  
                          }
                        echo '</div>  
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

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  
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

            <!-- ENTRADA PARA EL NOMBRE -->            

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" required>
              </div>
            </div>

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-align-center"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Descripción" required>
              </div>
            </div>

          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar categoría</button>
        </div>

        
         <!--Conexión con la BDD-->
        <?php
          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();
        ?> 

      </form>
    </div>
  </div>
</div>


<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
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

            <!-- ENTRADA PARA EL NOMBRE -->        
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span>                 
                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" placeholder="Título" required>                
                <input type="hidden"  name="idCategoria" id="idCategoria" required>                                
              </div>           
            </div>

            <!-- ENTRADA PARA EL NOMBRE --> 
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-align-center"></i></span> 
                <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" placeholder="Descripción" required>
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
        
          //$editarCategoria = new ControladorCategorias();
          //$editarCategoria -> ctrEditarCategoria();
            
          

        ?> 

      </form>
    </div>
  </div>
</div>

<!--Conexión con la BDD-->
<?php    
  //$borrarCategoria = new ControladorCategorias();
  //$borrarCategoria -> ctrBorrarCategoria();

?>
