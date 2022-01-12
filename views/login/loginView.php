<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="header-line">LOGIN CHAT</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 offset-md-3" >

              <div class="form-group">
                <h3>Vous pouvez tester le chat en entrant les identifiants suivants :</h3>
                  Pseudo : Causeur1</br>
                  Mot de passe : Causeur1</br></br>

                  Pseudo : Causeur2</br>
                  Mot de passe : Causeur2</br>
              </div>

            <form role="form" method="post" action="login">
              <div class="form-group">
                <label>Entrez votre pseudo</label>
                <input class="form-control" type="text" name="pseudo" />
              </div>
              
              <div class="form-group">
                <label>Mot de passe</label>
                <input class="form-control" type="password" name="password" />
                <p class="help-block">
                	<!-- <a href="../chatmvc/login/forgotPassword">Mot de passe oublié ?</a> -->
                </p>
              </div>

              <button type="submit" name="login" class="btn btn-info">LOGIN </button>
              <!-- &nbsp;&nbsp;&nbsp;<a href="../chatmvc/login/signup">Je n'ai pas de compte</a> -->
            </form>
          </div>

    </div>
  </div>  