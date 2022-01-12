<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div style="float:right"><a href="../chat/chatIndex/1">Retour</a></div>
			<div>
				<h2>RECHERCHE DANS LE CHAT</h2>
				<h4>Vous êtes connecté en tant que <?php echo $data['user'] ?></h4>
			</div>
		</div>

	<hr>
    <div class="col-9">
		<form>
			<input type="text" id="keyword" placeholder="Saisir un mot clé">
			<input type="button" id="submit" value="Envoyer"/>
		</form>
	</div>
	<div class="row">
		<div id="filteredmsg"></div>
	</div>
</div>

<script>
// On attend que la page soit complètement chargée
$(document).ready(function(){
		// On écoute le clic sur le bouton de soumission du formulaire
		$("#submit").click(function(){
            // On récupère le mot clé
            let str = $("#keyword").val();
            // Si la chaine n'est pas vide, on fait l'appel AJAX
            if (str != '') {
                // Appel avec une méthode POST
                // La valeur passée au serveur sous forme d'un objet JSON
                // Les messages sont renvoyés dans la variable returnData
                $.post('', {keyword : str}, function(returnData) {
                    // On affiche les messages provenant de la réponse du serveur
                    //$("#filteredmsg").append(returnData);
										
				//remplace le contenu de filteredmsg au lieu de rajouter return data à sa suite
				$("#filteredmsg").html(returnData);
                }
			);
		}
	});
});
</script>