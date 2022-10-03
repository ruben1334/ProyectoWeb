<div class=" page-wrapper container table-responsive">    
   <h2>Agregar pedido</h2><br>
    <div class="row">
         <div class="col-lg-3">
             <div class="card-body btn-warning">
             <?php echo form_open_multipart('Pedido/agregarbd');?> 
                      <center>
                        <label for="nombre">Nombre del maestro</label>
                         <select name="listamaestros" class="form-control form-select from-select-lg" required>
                              <option value="" disabled selected> Seleccione una...</option>

                              <?php 
                              foreach($infomaestro->result() as $row)
                              {
                                ?>
                                <option value="<?php echo $row->idUsuario;?>"><?php echo $row->nombre;?></option>
                             <?php   
                              }
                              ?>
                         </select>
                    
                          <label for="nombre">Cantidad</label>
                          <input type="text" name="stock" placeholder="Cantidad" class="form-control"required>
                <br>
                          <label for="nombre">Unidad de medida</label>
                          <input type="text" name="unidadMedida" placeholder="Unidad de Medida" class="form-control" required>
                <br>
                          <label for="nombre">Descripción</label>
                          <input type="text" name="descripcion" placeholder="Descripción" class="form-control" required>
                 
                     <br><button type="submit" class=" btn btn-primary">Registrar</button>  <br>
           
                    </center>
                     <?php  echo form_close();?>
                     
             </div> 
         </div>   
         <div class="col-lg-9">
                <table class="table table-hover table-responsive">
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre del pedido</th>
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
                        <?php echo form_open_multipart('pedido/enviar');?>
                         <input type="hidden" name="idMaterial" value="<?php echo $row->idMaterial;?>">
                         <input type="submit" name="buttony" value="agregar" class="btn btn-success"></input>
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