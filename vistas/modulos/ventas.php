<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar ventas 
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar ventas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">


      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           
           <th>Mesa</th>
           <th>id Mesero</th>
           <th>Mesero</th>           
           <th>Total</th> 
           <th>Fecha</th>
           

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);

          foreach ($respuesta as $key => $value) {
           

           echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["id_cliente"].'</td>

                  <td>'.$value["id_vendedor"].'</td>               

                  <td>'.$value["nombre"].'</td>                                    

                  <td>$ '.number_format($value["total"],2).'</td>

                  <td>'.$value["fecha"].'</td>

                </tr>';
            }

        ?>
               
        </tbody>

       </table>

       <?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();

      ?>
       

      </div>

    </div>

  </section>

</div>




