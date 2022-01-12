
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="header-line">Création de compte</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 offset-md-3" >

            <form role="form" method="post" action="signup" >
              <div class="form-group">
                <label>Entrez votre pseudo</label>
                <input class="form-control" type="text" name="pseudo" />
              </div>

              <div class="form-group">
                <label>Entrez votre email</label>
                <input class="form-control" type="text" name="email" />
              </div>
              
              <div class="form-group">
                <label>Mot de passe</label>
                <input class="form-control" type="password" name="password" id="password" />
              </div>

              <div class="form-group">
                <label>Confirmer le nouveau mot de passe</label>
                <input class="form-control" type="password" name="check-password" id="check-password" required autocomplete="off" onkeyup="return valid()" />
                <span id="message"></span>
              </div>

              <button id="submit" type="submit" name="signup" class="btn btn-info">Enregistrer </button>
            </form>
          </div>
    </div>
  </div>  

  <script> function valid() {
        let password = document.getElementById("password");
        let checkPassword = document.getElementById("check-password");
        let message = document.getElementById("message");
        let button = document.getElementById("submit");

        if (password.value === checkPassword.value) {
            message.style.color = "green"
            message.innerHTML = "Les mots de passe sont identiques.";
            button.disabled = false;
            return true;
        } else {
            message.style.color = "red"
            message.innerHTML = "Les mots de passe ne sont pas identiques.";
            button.disabled = true;
            checkPassword.focus();
            return false;
    }
}
</script>
