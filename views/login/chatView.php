<div class="container">
            <div class="row">
                <div class="col-md-12 bg-info">
                   Info chat
                </div>
            </div>
            <div class="row mt-2">
                <div class="col col-md-3 bg-success">
                    <?php roomList(); ?>
                </div>
                <div class="col col-md-9 bg-light">
                    Messages
                </div>
                <div class="col col-md-3 bg-warning">
                    <!-- vide -->
                </div>

                <div class="col col-md-9 bg-warning">
                <form role="form" method="post" action="message" > 
                <div class="form-group">
                <textarea class="form-control" type="text" name="test" placeholder="envoyer un message"></textarea>
            </div>


              <button id="submit" type="submit" name="message" class="btn btn-info">Envoyer</button>
            </form>
          </div>
                </div>
            </div>
        </div>