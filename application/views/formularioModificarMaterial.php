<div class=" page-wrapper container table-responsive">    
   <h2>modificar Material</h2><br>
    <div class="row">
         <div class="col-lg-3">
             <div class="card-body btn-warning">
          <?php
        foreach ($infomaterial->result() as $row) 
        {
        echo form_open_multipart('Material/modificarbd');?>
             
    <center>
        <input type="hidden" name="idMaterial" placeholder="Ingrese su id"value="<?php echo $row->idMaterial;?>"><br>
        <br><input type="text" name="nombreMaterial" placeholder="Ingrese su nombre" value="<?php echo $row->nombreMaterial;?>"><br> 
        <br><input type="text" name="stock" placeholder="Ingrese cantidad" value="<?php echo $row->stock; ?>"><br>
        <br><input type="text" name="unidadMedida" placeholder="Ingrese la unidad de medida" value="<?php echo $row->unidadMedida; ?>"><br>
        <br><input type="text" name="descripcion" placeholder="Descripcion"  value="<?php echo $row->descripcion; ?>"><br>
        <br><button type="submit" class=" btn btn-success">Modificar</button>
    </center>
 <?php echo form_close();           
                  
        }
        ?>
             </div> 
         </div>  

         <div class="col-lg-9">
                <table class="table table-hover table-responsive">
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre del Material</th>
                                <th scope="col"> Stock </th>
                                <th scope="col"> Unidad de Medida </th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">Fecha de Actualización</th>
                                <th scope="col">Modificar</th>
                                <th scope="col">Eliminar</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $indice=1;
                                foreach ($material->result() as $row) 
                                {
                                    ?> 
                                    <tr>
                                        <th scope="row"><?php echo $indice;?></th>
                                       
                                    
                                        <td><?php echo $row->nombreMaterial;?></td>
                                        <td><?php echo $row->stock;?></td>
                                        <td><?php echo $row->unidadMedida;?></td>
                                        <td><?php echo $row->descripcion;?></td>
                                        <td><?php echo formatearFecha($row->fechaRegistro);?></td>
                                        <td><?php echo formatearFecha($row->fechaActualizacion);?></td>
                        <td>   
                        <?php echo form_open_multipart('Material/modificar');?>
                         <input type="hidden" name="idMaterial" value="<?php echo $row->idMaterial;?>">
                         <input type="submit" name="buttony" value="Modificar" class="btn btn-success"></input>
                        <?php echo form_close();?>
                        </td>    
                       
                         <td>   
                        <?php echo form_open_multipart('Material/deshabilitarbd');?>
                         <input type="hidden" name="idMaterial" value="<?php echo $row->idMaterial;?>">
                         <input type="submit" name="buttonz" value="Deshabilitar" class="btn btn-danger"></input>
                        <?php echo form_close();?>
                         </td>              
                                   </tr>
                                    <?php
                                $indice++;
                                }
                            ?>
                        </tbody>

                    </table>
         </div> 




    </div>
</div>