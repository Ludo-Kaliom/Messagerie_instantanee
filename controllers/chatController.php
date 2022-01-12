<?php
require_once 'Controller.php';

class chatController extends Controller {
	private $userId;
	
	public function __construct() {
		$this->userId = $_SESSION['userid'];
	}

	public function chatIndex() {
		$oChatModel = $this->loadModel('chatModel');
		
		$data = [];
		$roomId = self::getRoomFromAction($_GET['action']);
		
		if (!empty($_POST['message'])) {
			$msg = htmlspecialchars(trim($_POST['message']));
			$oChatModel->inserer($this->userId, $roomId, $msg);
			$userName = $oChatModel->getUserName($this->userId);
			
			echo "<p>".$userName." (".date("d/m/Y H:i:s", time()).") : ".$msg . "</p>";

		} else {
			$data['rooms'] = $oChatModel->getRooms();
			$data['messages'] = $oChatModel->getMessages($roomId);
			$data['user'] = $oChatModel->getUserName($this->userId);
			$data['userid'] = $this->userId;
			$data['currentroom'] = $oChatModel->getRoomName($roomId);

			$this->render('chatView', $data);
		}
	}
	
	/**
	 * Renvoie l'id de la room a partir de l'url
	 * @param string $action
	 * @return int
	 */
	public static function getRoomFromAction(string $action) : int {
		$params = explode("/", $action);
		
		if (!empty($params[2])) {
			return (int) $params[2];
		} else {
			return 1;
		}
	}

	public function search() {
		$oChatModel = $this->loadModel('chatModel');
		$data = [];

		$data['user'] = $oChatModel-> getUserName($this->userId);
		
		if (!empty($_POST['keyword'])) {
			$kw = htmlspecialchars(trim($_POST['keyword']));
			$kw = strip_tags($kw);

			$data['messages'] = $oChatModel->getFilteredMessages($kw);

			if (!empty($data['messages'])) {
				foreach($data['messages'] AS $msg) {
					echo "<div>".$msg['user_name']. " @ ".$msg['room_name']. " le ".$msg['msg_date']. " a écrit :"."</div>"
					."<div>".$msg['msg_text']. "</div>";
				}
			} else {
				echo "Aucun élément trouvé";
			}
		}

		error_log(print_r($data, 1));
		
		/*si on accède à la page autrement qu'avec la methode post on affiche la page complète, dans le cas présent ça va nous permettre de n'afficher que le resultat de la recherche et d'ignorer $this->render('searchView', $data);
		*/
		if ($_SERVER['REQUEST_METHOD'] != 'POST'){
		$this->render('searchView', $data);
		}
	}
}
