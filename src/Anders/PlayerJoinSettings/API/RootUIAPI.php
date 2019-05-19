<?php

declare(strict_types=1);

namespace Anders\PlayerJoinSettings\API;

use pocketmine\network\mcpe\protocol\ModalFormRequestPacket;
use pocketmine\Player;
use function json_encode;

abstract class RootUIAPI {

    private $data = [];
    public $id;
    public $playerName;

    /**
     * @param String|int $id
     */
    public function __construct($id) {
        $this->id = $id;
    }

    public function sendToPlayer(Player $player): void {
        $pk = new ModalFormRequestPacket();
        $pk->formId = $this->id;
        $pk->formData = json_encode($this->data);
        $player->dataPacket($pk);
        $this->playerName = $player->getName();
    }

}
