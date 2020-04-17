<div class="modal fade bd-example-modal-lg" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
            <form action="borrar.php" method="post">            
                <div class="row filaregis">
					Estas segur de borrar aquest pis?
                </div>
                <div class="row filamodal">
                    <div class="col-sm-2"><button type="submit" class="btn btn-enviar btn-modal btn-modal-enviar" formaction="borrar.php">Si</button></div>
                    <div class="col-sm-2"><button type="button" class="btn btn-danger btn-modal" data-dismiss="modal">No</button></div>
                </div>  
            </form>      
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="borrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
            <form action="php/login.php" method="post">            
                <div class="container">
                    <form action="borrar.php" method="post">            
                    <div class="row filaregis">
						Estas segur de borrar aquest pis?
                    </div>
                    <div class="row filamodal">
                        <div class="col-sm-2"><button class="btn btn-enviar btn-modal btn-modal-enviar" a href="#" onclick="prova('.$valor['id'].')">Si</button></div>
                        <div class="col-sm-2"><button type="button" class="btn btn-danger btn-modal" data-dismiss="modal">No</button></div>
                    </div>  
                    </form>          
                </div>
            </form>          
        </div>
    </div>
  </div>
</div>