<div class="modal fade bd-example-modal-lg" id="login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
            <form action="php/login.php" method="post">            
                <div class="row">
                  <div class="col-sm-2">Usuari: </div>
                  <div class="col-sm-2 filamodal"><input type="text" name="id" pattern="[A-Za-z0-9]{3,20}" required></div>
                </div>
                <div class="row">
                  <div class="col-sm-2">Contrasenya: </div>
                  <div class="col-sm-1 filaregis"><input type="password" name="contrasenya" pattern="[A-Za-z0-9]{3,20}" required></div>
                </div>
                <div class="row filaregis">
                  <div class="col-sm-2"><button type="submit" class="btn btn-enviar btn-modal btn-modal-enviar">Enviar</button></div>
                  <div class="col-sm-2"><button type="reset" class="btn btn-warning btn-modal">Esborrar</button></div>
                  <div class="col-sm-2"><button type="button" class="btn btn-danger btn-modal" data-dismiss="modal">Tancar</button></div>
                </div>  
            </form>          
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="regist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
            <form action="php/login.php" method="post">            
                <div class="container">
                    <form action="php/registre.php" method="post">            
                    <div class="row">
                        <div class="col-sm-2">Usuari: </div>
                        <div class="col-sm-2 filamodal"><input type="text" name="id" pattern="[A-Za-z0-9]{3,20}" required></div>
                    </div>
                    <div class="row">
                      <div class="col-sm-2"></div>
                      <div class="col-sm-10 filainfo">Lletres i/o números. Mínim 3 Màxim 20</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">Contrasenya: </div>
                        <div class="col-sm-2 filamodal"><input type="password" name="contrasenya" pattern="[A-Za-z0-9]{3,20}" required></div>
                    </div>
                    <div class="row">
                      <div class="col-sm-2"></div>
                      <div class="col-sm-10 filainfo">Lletres i/o números. Mínim 3 Màxim 20</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">Email: </div>
                        <div class="col-sm-2 filaregis"><input type="email" name="email" required></div>
                    </div>
                    <div class="row filamodal">
                        <div class="col-sm-2"><button type="submit" class="btn btn-enviar btn-modal btn-modal-enviar" formaction="php/registre.php">Enviar</button></div>
                        <div class="col-sm-2"><button type="reset" class="btn btn-warning btn-modal">Esborrar</button></div>
                        <div class="col-sm-2"><button type="button" class="btn btn-danger btn-modal" data-dismiss="modal">Tancar</button></div>
                    </div>  
                    </form>          
                </div>
            </form>          
        </div>
    </div>
  </div>
</div>