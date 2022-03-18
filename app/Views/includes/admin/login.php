<body>
    <div class="page login-page">
        <div class="back-img" style="background-image: url(<?php echo IP_SERVER ?>public/images/intros/unihorizonte-convenio_NASA-2-o_e.jpg);">
            <div class="container ">
                <div class="form-outer text-center d-flex align-items-center">
                <div class="form-inner">
                    <img src="<?php echo IP_SERVER ?>assets/images/logo.png" alt="Logo" style="width: 150px; height: 150px;">
                    <div class="logo text-uppercase"><span></span><strong class="text-primary">NASA - UNIHORIZONTE</strong></div>
                    <p>Escuela de aprendizaje</p>
                    <form method="post" action="<?php echo IP_SERVER ?>login/iniciosesion" class="text-left form-validate">
                    <div class="form-group-material">
                        <input id="login-Username" type="text" name="loginUsername" required data-msg="Por favor ingrese su usuario" class="input-material">
                        <label for="login-Username" class="label-material">Usuario</label>
                    </div>
                    <div class="form-group-material">
                        <input id="login-password" type="password" name="loginPassword" required data-msg="Por favor ingrese su contraseña" class="input-material">
                        <label for="login-password" class="label-material">Contraseña</label>
                    </div>
                    <div class="form-group text-center"><input type="submit" name="Iniciar" value="Iniciar" class="btn btn-primary">
                        <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                    </div>
                    </form>
                    <a href="#" class="forgot-pass">Olvido su contraseña?</a>
                    <a href="<?php echo IP_SERVER ?>" class="forgot-pass">Volver</a>
                </div>
                </div>
            </div>
        </div>  
    </div>
    <!-- Default footer-->
<footer class=" main-footer">
        <div class="container-fluid"> 
          <div class="row">
            <div class="col-sm-6">
              <!-- Footer brand-->
              <div class="footer-brand"><a href="index.html"><img style='margin-top: -5px;margin-left: -15px;' width='178' height='31' src='<?php echo IP_SERVER ?>public/images/intense/logo-light.png' alt=''/></a></div>
            </div>                        
            <div class="col-sm-6 text-right">
              <p class="small text-darker">Desarrollado por Yadira Vargas - Gabriel Aguilera - Sebastian Diaz </a> &copy; <span class="copyright-year"></span>               
            </div>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html> 
