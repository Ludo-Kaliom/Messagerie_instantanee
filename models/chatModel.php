<?php
require_once 'Model.php';

class chatModel extends Model{

	public function __construct() {
		$this->getConnexion();
	}

	public function getRooms() :array {
		$results = [];

		$sql = "SELECT * FROM chat_rooms";
		$query = $this->_connexion->prepare($sql);
		$query->execute();

		$results = $query->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	public function getMessages($roomId) : array {
		$results = [];

		$sql = "SELECT msg_text, msg_date, user_name FROM chat_messages
				JOIN chat_users ON msg_user_id = user_id
				WHERE msg_room_id = :msg_room_id
				ORDER BY msg_id ASC
				LIMIT 250";
		$query = $this->_connexion->prepare($sql);
		$query->bindParam(':msg_room_id', $roomId);
		$query->execute();

		$results = $query->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	public function getUserName(int $id) : string {
		$arrResult = [];

		$sql = "SELECT user_name FROM chat_users WHERE user_id = :id";
		$query = $this->_connexion->prepare($sql);
		$query->bindParam(':id', $id);
		$query->execute();

		$arrResult = $query->fetch(PDO::FETCH_ASSOC);

		return $arrResult['user_name'];
	}

	public function getRoomName(int $id) : string {
		$arrResult = [];
		$sql = "SELECT room_name FROM chat_rooms WHERE room_id = :id";
		$query = $this->_connexion->prepare($sql);
		$query->bindParam(':id', $id);
		$query->execute();

		$arrResult = $query->fetch(PDO::FETCH_ASSOC);

		return $arrResult['room_name'];
	}

	public function inserer(int $userId, int $roomId, string $msg) {
		date_default_timezone_set('Europe/Paris');
		$date = date('Y-m-d H:i:s', time());
		$sql = "INSERT INTO chat_messages (msg_text, msg_user_id, msg_date, msg_room_id)
				VALUES (:msg_text, :msg_user_id, :msg_date, :msg_room_id)";
		$query = $this->_connexion->prepare($sql);
		$query->bindParam(':msg_text', $msg, PDO::PARAM_STR);
		$query->bindParam(':msg_user_id', $userId, PDO::PARAM_INT);
		$query->bindParam(':msg_date', $date, PDO::PARAM_STR);
		$query->bindParam(':msg_room_id', $roomId, PDO::PARAM_INT);
		$query->execute();
	}

	public function getFilteredMessages(string $kw) : array {
		$sql = "SELECT msg_text, msg_user_id, msg_date, user_name, room_name FROM chat_messages
				JOIN chat_users ON msg_user_id = user_id
				JOIN chat_rooms ON msg_room_id = room_id
				WHERE MATCH (msg_text) AGAINST (:kw IN BOOLEAN MODE)
				ORDER BY msg_id ASC";

		$query = $this->_connexion->prepare($sql);
		$query->bindParam(':kw', $kw, PDO::PARAM_STR);
		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

}


