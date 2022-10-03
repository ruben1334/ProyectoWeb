<div class=" page-wrapper container table-responsive">    
   <h2>Solicitud de Pedido</h2><br>
    <div class="row">
         <div class="col-lg-3">
             <div class="card-body btn-warning">               
             <?php echo form_open_multipart('Pedido/agregarbd');?> 
                      <center>
                        <label for="nombre">Buscar Maestro</label>
                       <select name="idUsuario" class="form-control form-select from-select-lg " required>
                             <option value="" disabled selected>Selecione una opción</option>
                       </select>
                    
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
         <div class="col-lg-8">
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
                                <th scope="col">Acciones</th>
                            
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $indice=1;
                                foreach ($pedido->result() as $row) 
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
                        <?php echo form_open_multipart('Pedido/deshabilitarbd');?>
                         <input type="hidden" name="idMaterial" value="<?php echo $row->idMaterial;?>">
                         <input type="submit" name="buttony" value="Agregar" class="btn btn-success"></input>
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



<center>
    
         <div class="col-lg-4" >

                <table class="table table-hover table-responsive">
                        <thead >
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nombre del Material</th>
                                <th scope="col"> Cantidad </th>
                             
                                
                            
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach ($pedido->result() as $row) 
                                {
                                    ?> 
                                    <tr>
                             <td>   
                             <?php echo form_open_multipart('Pedido/habilitarbd');?>
                             <input type="hidden" name="idMaterial" value="<?php echo $row->idMaterial;?>">
                             <input type="submit" name="buttonD" value="X" class="btn-danger"></input>
                             <?php echo form_close();?>
                             </td> 
                                        
                                        <td><?php echo $row->nombreMaterial;?></td>
                                 
                                     
                                        
                                        
                                        
                         
                      
                            </tr>
                                    <?php
                                }
                            ?>
                        </tbody>

                    </table>
         </div> 
</center>
