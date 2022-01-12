<div class="container">
	 <div class="row">
		<h2>Vous êtes connecté(e) en tant que <?php echo $data['user']; ?></h2>
	 </div>
	 <div class="row">
	  	<h4>Vous discutez dans la room <?php echo $data['currentroom']; ?></h4>
	 </div>
	 <hr>
	 <div class="row">
		 <div class="col-3">
			 <?php
			 foreach($data['rooms'] AS $room) {
			?>
				<div>
					<a href="<?php echo $room['room_id']?>"><?php echo $room['room_name']?></a>
				</div>
			<?php
			 }
			 ?>
		 </div>
		<div class="col-9">
		<?php 
				foreach($data['messages'] as $msg) {
					if ($msg['user_name'] == $data['user']) {
						$css = "style='background:#e5f5f5'";
					} else {
						$css = "";
					}
					echo "<p ".$css.">".$msg['user_name']." : (". $msg['msg_date'].") - ". $msg['msg_text'] ."</p>";
				}
			?>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-3">
		<a href="../search">Recherche</a>
		</div>
		<div id="msg" class="col-9">
			<form action="" method="post">
				<textarea name="message" id="message" cols="70" rows="3" placeholder="Tapez votre message"></textarea>

				<div><input type="button" id="submit" value="Envoyer" /></div>
			</form>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$("#submit").click(function(){
		let msg = $("#message").val();
		
		if(msg != ''){
			$.post('',
				{
					message : msg
				},
				function(returnData){
					$("#msgpanel").append(returnData);
					$("#message").val('');
				}
			);
		}
	});
	
	let t;
	let message = $('#message');
	let submit = $('#submit');
	
	function timer() {
	    t = setTimeout(function() {
	        location.reload();
	    }, 2000);
	}
	
	timer();
	
	submit.click(function() {
		timer();
	});
	
	message.focus(function() {
		console.log('stop');
	    clearTimeout(t);
	});
});
</script>