<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper table-responsive" >
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb btn-warning">
        <div class="row align-items-center">
            <div class="col-xs-12">
            <H2>LISTA DE ESTUDIANTES DESHABILITADOS</H2>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
     <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                <?php echo form_open_multipart('Estudiante/index');?>
                <button type="submit" class="btn btn-primary">Ver Estudiantes habilitados</button>
                <?php echo form_close();?><br>

                    <table class="table table-hover table-responsive">
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Primer Apellido</th>
                                <th scope="col">Segundo Apellido</th>
                                <th scope="col">Fecha de Nacimiento</th>
                                <th scope="col">Bautizado (SI/No)</th>
                                <th scope="col">Padres</th>
                                <th scope="col">Nº de referencia</th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">FechaActualización</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $indice=1;
                                foreach ($estudiante->result() as $row) 
                                {
                                    ?> 
                                    <tr>
                                        <th scope="row"><?php echo $indice;?></th>
                                        
                                        <td>
                                        <?php
                                                    $foto=$row->foto;
                                                    if($foto=="")
                                                    {
                                                        ?>
                                                        <img src="<?php echo base_url();?>/uploads2/user.png" width="50px">
                                                        <?php
                                                    }
                                                    else {
                                                        ?>
                                                        <img src="<?php echo base_url();?>/uploads2/<?php echo $foto; ?>" width="50px">
                                                        <?php
                                                    }
                                                ?></td>

                                            <td><?php echo $row->nombre;?></td>
                                            <td><?php echo $row->primerApellido;?></td>
                                            <td><?php echo $row->segundoApellido;?></td>
                                            <td><?php echo formatearFecha($row->fechaNacimiento);?></td>
                                            <td><?php echo ($row->bautizado);?></td>
                                            <td><?php echo ($row->padres);?></td>
                                            <td><?php echo ($row->NumeroReferencia);?></td>
                                            <td><?php echo formatearFecha($row->fechaRegistro);?></td>
                                            <td><?php echo formatearFecha($row->fechaActualizacion);?></td>
                                            
                                            <td>
                                            <?php echo form_open_multipart('Estudiante/habilitarbd');?>
                                            <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante;?>">
                                            <input type="submit" name="buttonb" value="habilitar" class="btn btn-warning"></input>
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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
