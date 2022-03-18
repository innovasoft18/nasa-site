<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>Home">Inicio</a></li>
        <li class="breadcrumb-item active">Perfil</li>
        </ul>
    </div>
</div>
<section>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?php echo IP_SERVER.$perfil[0]->foto;?>"><span class="font-weight-bold"><?php echo  $perfil[0]->Roles; ?></span><span class="text-black-50"><?php echo  $perfil[0]->correo;?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <form action="<?php echo IP_SERVER ?>Perfil/ActualizarP" method="post" enctype="multipart/form-data">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Perfil <?php echo  $perfil[0]->display_name;?></h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Usuario:</label><input type="text" class="form-control" readonly require name="usuario" placeholder="<?php echo  $perfil[0]->usuario;?>" value="<?php echo  $perfil[0]->usuario;?>"></div>
                    <div class="col-md-6"><label class="labels">Correo</label><input type="email" class="form-control" name="correo" require placeholder="<?php echo  $perfil[0]->correo;?>" value="<?php echo  $perfil[0]->correo;?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Display Name</label><input type="text" name="displayname" class="form-control" require placeholder="<?php echo  $perfil[0]->display_name;?>" value="<?php echo  $perfil[0]->display_name;?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Actualizar Foto</label>
                    <input id="actualizar-foto" type="file" name="foto" class="input-material"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Actualizar</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="col-md-12"><label class="labels">Contraseña</label>
                    <input type="text" name="contrasena" class="form-control">
                </div>
            <br>
                <div class="col-md-12"><label class="labels">Rol</label>
                    <input type="text" class="form-control" readonly value="<?php echo  $perfil[0]->Roles;?>">             
                    <input type="text" class="form-control" style="display: none;" readonly name="rol"  value="<?php echo  $perfil[0]->idRoles;?>">
                </div>
                <br>
                <div class="col-md-12"><label class="labels">Obra</label>
                    <input type="text" class="form-control" readonly value="<?php echo  $perfil[0]->Nombre;?>">
                    <input type="text" class="form-control" style="display: none;" readonly name="obra" value="<?php echo  $usuario[0]->idobras;?>">
                </div>
        </div>
    </div>
    </form>
</div>
</section>