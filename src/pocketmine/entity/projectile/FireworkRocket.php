<?php

#______           _    _____           _                  
#|  _  \         | |  /  ___|         | |                 
#| | | |__ _ _ __| | _\ `--. _   _ ___| |_ ___ _ __ ___   
#| | | / _` | '__| |/ /`--. \ | | / __| __/ _ \ '_ ` _ \  
#| |/ / (_| | |  |   </\__/ / |_| \__ \ ||  __/ | | | | | 
#|___/ \__,_|_|  |_|\_\____/ \__, |___/\__\___|_| |_| |_| 
#                             __/ |                       
#                            |___/

namespace pocketmine\entity\projectile;

use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\entity\projectile;
use pocketmine\Player;

class FireworkRocket extends Projectile
{
    const NETWORK_ID = self::FIREWORK_ROCKET;
    
	public $width = 0.1;
	public $length = 0.2;
	public $height = 0;
	
    public function getName()
    {
        return "Firework";
    }
    
    public function initEntity(){
    	parent::initEntity();
    
		$this->setMaxHealth(1);
	}
	
	//TODO: Exploding
	
    public function spawnTo(Player $player)
    {
        $pk = new AddEntityPacket();
        $pk->eid = $this->getId();
        $pk->type = FireworkRocket::NETWORK_ID;
        $pk->x = $this->x;
        $pk->y = $this->y;
        $pk->z = $this->z;
        $pk->speedX = $this->motionX;
        $pk->speedY = $this->motionY;
        $pk->speedZ = $this->motionZ;
        $pk->yaw = $this->yaw;
        $pk->pitch = $this->pitch;
        $pk->metadata = $this->dataProperties;
        $player->dataPacket($pk);

        parent::spawnTo($player);
    }
}
