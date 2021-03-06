<?php

#______           _    _____           _                  
#|  _  \         | |  /  ___|         | |                 
#| | | |__ _ _ __| | _\ `--. _   _ ___| |_ ___ _ __ ___   
#| | | / _` | '__| |/ /`--. \ | | / __| __/ _ \ '_ ` _ \  
#| |/ / (_| | |  |   </\__/ / |_| \__ \ ||  __/ | | | | | 
#|___/ \__,_|_|  |_|\_\____/ \__, |___/\__\___|_| |_| |_| 
#                             __/ |                       
#                            |___/

namespace pocketmine\event\player;

use pocketmine\event\Cancellable;
use pocketmine\Player;
use pocketmine\Server;

class PlayerTalkEvent extends PlayerEvent implements Cancellable{
	
	public static $handlerList = null;
	
	protected $message;
	protected $format;
	protected $recipients = [];

	public function __construct(Player $player, $message, $format = "chat.type.text", array $recipients = null){
		$this->player = $player;
		$this->message = $message;
		$this->format = $format;
		if($recipients === null){
			$this->recipients = Server::getInstance()->getPluginManager()->getPermissionSubscriptions(Server::BROADCAST_CHANNEL_USERS);
		}else{
			$this->recipients = $recipients;
		}
	}
	
	public function getMessage(){
		return $this->message;
	}
	
	public function setMessage($message){
		$this->message = $message;
	}
	
	public function setPlayer(Player $player){
		$this->player = $player;
	}

	public function getFormat(){
		return $this->format;
	}

	public function setFormat($format){
		$this->format = $format;
	}

	public function getRecipients(){
		return $this->recipients;
	}

	public function setRecipients(array $recipients){
		$this->recipients = $recipients;
	}
	
}