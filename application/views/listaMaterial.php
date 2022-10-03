<div class=" page-wrapper container table-responsive">    
   <h2>Agregar Material</h2><br>
    <div class="row">
         <div class="col-lg-3">
             <div class="card-body btn-warning">
             <?php echo form_open_multipart('Material/agregarbd');?> 
                      <center>
                        <label for="nombre">Nombre del material</label>
                         <input type="text" name="nombreMaterial" placeholder="Material" class="form-control" required><br>
                    
                          <label for="nombre">cantidad</label>
                          <input type="text" name="stock" placeholder="Cantidad" class="form-control"required>
                <br>
                          <label for="nombre">Unidad de medida</label>
                          <input type="text" name="unidadMedida" placeholder="Unidad de Medida" class="form-control" required>
                <br>
                          <label for="nombre">Descripción</label>
                          <input type="text" name="descripcion" placeholder="Descripción" class="form-control" required>
             
                 
                     <br><button type="submit" class=" btn btn-primary">Registrar

                     </button>  <br>
           
                    </center>
          
                     <?php  echo form_close();?>
                 
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