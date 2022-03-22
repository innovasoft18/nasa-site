<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>adm">Banners Activos</a></li>
        </ul>
    </div>
</div>
<section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Banners Activos            </h1>
          </header>
          <div class="form-group row">
            <h6>Buscar</h6>
                <div class="col-sm-12">
                  <div class="form-group">
                    <div class="input-group">
                    <div class="input-group-prepend">                        
                        <div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg></span></div>
                      </div>                      
                      <input class="form-control" id="buscar" type="text" placeholder="Nombre, fecha publicación, fecha despublicación, descripción ....">&nbsp;&nbsp;&nbsp;
                      <a href="<?php echo IP_SERVER."Usuarios/UsuariosCrear"; ?>" type="button" class="btn btn btn-success text-white" data-toggle="tooltip" data-placement="bottom" title="Crear"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg></a>                                              
                    </div>
                  </div>
                </div>
          </div>
          <form action="" method="POST">  
            <div class="form-group row">            
              <div class="col-sm-12">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-prepend"><span class="input-group-text">Fecha Inicio</span></div>
                    </div>
                    <input type="date" name="fechaini" required class="form-control" id="fechaini">
                    <div class="input-group-prepend">
                    <div class="input-group-prepend"><span class="input-group-text">Fecha Fin</span></div>
                    </div>
                    <input type="date" name="fechafin" required class="form-control" id="fechafin">
                    <button class="btn btn-primary profile-button" type="submit">Actualizar</button>
                    <button type="sumbit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Buscar" id="buscarfecha"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg></button>
                  </div>                           
                </div>
              </div>
            </div>
            <div>
                <script src="<?php echo IP_SERVER ?>assets/js/banners/banners.js"></script>          
            </div>
          </form> 
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Fecha Publicación</th>
                            <th>Fecha Despublicación</th>
                            <th>Descripción</th>
                            <th>imagen</th>                            
                            <th colspan="2">Acción</th>
                        </tr>
                      </thead>
                      <tbody id="tabla">
                      <?php foreach ($banners as $b){ ?> 
                          <tr class="text-center">
                            <th class="table-active" scope="row"><?php echo $b->banner_id; ?></th>
                            <td class="table-active"><?php echo $b->banner_nombre; ?></td>
                            <td class="table-active datepicker"><?php $fecha = new DateTime($b->banner_ipublicacion); echo $fecha->format("d-m-Y");?></td>
                            <td class="table-active datepicker"><?php $fecha = new DateTime($b->banner_fpublicacion); echo $fecha->format("d-m-Y"); ?></td>
                            <td class="table-active"><?php echo $b->banner_descripcion; ?></td>
                            <td class="table-active"><img src="<?php echo IP_SERVER.$b->banner_path; ?>" alt="<?php echo $b->banner_nombre; ?>" style="height: 60px;"></td>
                            <td class="table-active text-left">
                            <a href="<?php echo IP_SERVER."Usuarios/UsuariosCrear/".$b->banner_id; ?>" type="button " class="btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="Modificar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg></a>
                            </td>
                            <td class="table-active text-left">
                                <a href="<?php echo IP_SERVER."Usuarios/DesactivarUsuario/".$b->banner_id; ?>" type="button" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Desactivar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg></a>
                            </td>                             
                          </tr> 
                        <?php } ?>                      
                        <div class="col-md-12 text-center">
                              <ul class="pagination pagination-lg pager" id="banners_page"></ul>
                      </div>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- <div>
        <script src="<?php echo IP_SERVER ?>assets/js/banners/banners.js"></script>          
    </div> -->