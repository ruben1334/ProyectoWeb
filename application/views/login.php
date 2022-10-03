<section class="ftco-section" style="background:#581845;">
<div class="container" >
  <center> 
		<div class="row justify-content-center  col-md-4 " style="background:#900c3f">
			<div class="col-md-12" style="background:#ff9800">
				<div class="login-wrap p-0">
					<h1 class="mb-4 text-center">Login</h1>
					<?php
						switch($msg)
						{
							case '1':
							$mensaje="Gracias por usar el sistema";
							break;
							case '2':
							$mensaje="Usuario no identificado";
							break;	
							case '3':
							$mensaje="Acceso denegado - Favor inicie sesion";
							break;
							default:
							$mensaje="";
						}
						?>
						<h2 class="text-center"><?php echo $mensaje; ?></h2>

						<?php
						echo form_open_multipart('Usuarios/validar',array('id'=>'form1'))
						?>

						<div class="mb-3">
							<input type="text" name="login" class="form-control " placeholder="Login" style="background:#ffc305;" >
						</div>

						<div class="form-group" >
							<input type="password" name="password" class="form-control" placeholder="Contraseña" style="background:#ffc305;">
						</div>
            <br>
						<div class="form-group">
							<button type="submit" class=" btn btn-success  submit px-3 " style="background:#581545;">Iniciar Sesion</button>

					 
						</div>
					    <?php echo form_close();?>

					    <?php echo form_open_multipart('Registro/index');?>
                       <input type="submit"  class=" btn btn-success  submit px-3 " name="Registrarse" value="Registrarse" onClick="location.href='index'" style="background:#581545;" ></input>
                       <br>
                       <br>
                      <?php echo form_close();?>

				</div>
			</div>
		</div>
    </center>
</div>
	

     