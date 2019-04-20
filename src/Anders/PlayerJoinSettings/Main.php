<?php
/**
 *     _                _                  
 *    / \    _ __    __| |  ___  _ __  ___ 
 *   / _ \  | '_ \  / _` | / _ \| '__|/ __|
 *  / ___ \ | | | || (_| ||  __/| |   \__ \
 * /_/   \_\|_| |_| \__,_| \___||_|   |___/
 * 
 * This a PocketMine-MP Plugin,There are many useful features
 * Open source, free,If you need help, please see the contact information below.
 * GitHub:"https://github.com/Anders233",Email: fox404@Foxmail.com,
 */
                 
declare(strict_types=1);                        

namespace Anders\PlayerJoinSettings;

use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\ModalFormRequestPacket;
use pocketmine\network\mcpe\protocol\ModalFormResponsePacket;
use pocketmine\form\Form;

class Main extends PluginBase implements Listener, Form{

	public function onEnable(){//Plugin enabled
	//I am not used to sending something that is useless to the background when the plugin is enabled.
        	$this->getServer()->getPluginManager()->registerEvents($this,$this);
	}
	
	public function onLoad(){//Plugin Load
        	@mkdir($this->getDataFolder(),0777,true);
        	$this->saveResource('config.yml', false);
        	$this->config = new Config($this->getDataFolder().'config.yml', Config::YAML);
	}
	
/*
 *  _____                     _     _      _       _                           
 * | ____|__   __ ___  _ __  | |_  | |    (_) ___ | |_  ___  _ __    ___  _ __ 
 * |  _|  \ \ / // _ \| '_ \ | __| | |    | |/ __|| __|/ _ \| '_ \  / _ \| '__|
 * | |___  \ V /|  __/| | | || |_  | |___ | |\__ \| |_|  __/| | | ||  __/| |   
 * |_____|  \_/  \___||_| |_| \__| |_____||_||___/ \__|\___||_| |_| \___||_|   
 */
 
	public function onPlayerJoin(PlayerJoinEvent $event):void{//Try to send a message to the player when they join.
		$player = $event->getPlayer();
		$name = $player->getName();
		$online = count($this->getServer()->getOnlinePlayers());
		$Max_online = $this->getServer()->getMaxPlayers();
		if($this->config->get("TitleSwitch") == true){//Add some switches
			$Title = str_replace("&", "§", strval($this->config->get("Title")));
			$Title = str_replace("{name}", $name, $Title);
			$Title = str_replace("{line}", "\n", $Title);
			$SubTitle = str_replace("&", "§", strval($this->config->get("SubTitle")));
			$SubTitle = str_replace("{name}", $name, $SubTitle);
			$SubTitle = str_replace("{line}", "\n", $SubTitle);
			$player->addTitle($Title, $SubTitle, 20, 60, 20);
		}
		if($this->config->get("MessageSwitch") == true){//Add some switches
			$message = str_replace("&", "§", strval($this->config->get("Message")));
			$message = str_replace("{name}", $name, $message);
			$message = str_replace("{line}", "\n", $message);
			$player->sendMessage($message);
		}
		if($this->config->get("UndoPlayerJoinMessage") == true){//Add some switches
			$event->setJoinMessage(NULL);
		}
		if($this->config->get("PlayerJoinMessageSwitch") == true){//Add some switches
			$PlayerJoinMessage = str_replace("&", "§", strval($this->config->get("PlayerJoinMessage")));
			$PlayerJoinMessage = str_replace("{name}", $name, $PlayerJoinMessage);
			$PlayerJoinMessage = str_replace("{line}", "\n", $PlayerJoinMessage);
			$PlayerJoinMessage = str_replace("{online}", $online, $PlayerJoinMessage);
			$PlayerJoinMessage = str_replace("{max_online}", $Max_online, $PlayerJoinMessage);
			$this->getServer()->broadcastMessage($PlayerJoinMessage);
		}
		if($this->config->get("PlayerJoinUIform") == true){// Pop up the UI form when the player joins? (true or false)
			$title = str_replace("&", "§", strval($this->config->get("UIformTitle")));
			$title = str_replace("{name}", $name, $title);
			$title = str_replace("{line}", "\n", $title);
			$title = str_replace("{online}", $online, $title);
			$title = str_replace("{max_online}", $Max_online, $title);
			$content = str_replace("&", "§", strval($this->config->get("UIformContent")));
			$content = str_replace("{name}", $name, $content);
			$content = str_replace("{line}", "\n", $content);
			$content = str_replace("{online}", $online, $content);
			$content = str_replace("{max_online}", $Max_online, $content);
			$button1 = str_replace("&", "§", strval($this->config->get("UIformbutton1")));
			$button2 = str_replace("&", "§", strval($this->config->get("UIformbutton2")));
			$data = ["type" => "modal","title" => $title,"content" => $content,"button1" => $button1,"button2" => $button2];
			$packet = new ModalFormRequestPacket();
			$packet->formId = 9527;
			$packet->formData = json_encode($data, JSON_PRETTY_PRINT | JSON_BIGINT_AS_STRING | JSON_UNESCAPED_UNICODE);
			$player->dataPacket($packet);
		}
	}

	public function onDataPacketReceive(DataPacketReceiveEvent $event): void{
		$packet = $event->getPacket();
		$player = $event->getPlayer();
		$name = $player->getName();
		if ($packet instanceof ModalFormResponsePacket) {
			$id = $packet->formId;
			$data = $packet->formData;
			$result = json_decode($data);
			echo $result;
			if($data == "null\n"){
			} else {
				if ($id === 9527) {
					if($result == true){
						if($this->config->get("ButtonCommand") == true){//Add some switches
							$ButtonCommand = $this->config->get("UIformbutton1cmd");
							$ButtonCommand = str_replace("{name}", '"' . $name . '"', $ButtonCommand);
							$this->getServer()->dispatchCommand(new consoleCommandSender(), $ButtonCommand);
						}
					}else{
						if($this->config->get("ButtonCommand") == true){//Add some switches
							$ButtonCommand = $this->config->get("UIformbutton2cmd");
							$ButtonCommand = str_replace("{name}", '"' . $name . '"', $ButtonCommand);
							$this->getServer()->dispatchCommand(new consoleCommandSender() ,$ButtonCommand);
						}
					}
				}
			}
		}
	}

	public function onPlayerQuit(PlayerQuitEvent $event):void{
		$player = $event->getPlayer();
		$name = $player->getName();
		$onlinePlayers = count($this->getServer()->getOnlinePlayers());
		$online = $onlinePlayers - 1;
		$Max_online = $this->getServer()->getMaxPlayers();
		if($this->config->get("UndoPlayerQuitMessage") == true){//Add some switches
			$event->setQuitMessage(NULL);
		}
		if($this->config->get("PlayerQuitMessageSwitch") == true){//Add some switches
			$PlayerQuitMessage = str_replace("&", "§", strval($this->config->get("PlayerQuitMessage")));
			$PlayerQuitMessage = str_replace("{name}", $name, $PlayerQuitMessage);
			$PlayerQuitMessage = str_replace("{line}", "\n", $PlayerQuitMessage);
			$PlayerQuitMessage = str_replace("{online}", $online, $PlayerQuitMessage);
			$PlayerQuitMessage = str_replace("{max_online}", $Max_online, $PlayerQuitMessage);
			$this->getServer()->broadcastMessage($PlayerQuitMessage);
		}
	}
/*
 *   ____                                                _ 
 *  / ___| ___   _ __ ___   _ __ ___    __ _  _ __    __| |
 * | |    / _ \ | '_ ` _ \ | '_ ` _ \  / _` || '_ \  / _` |
 * | |___| (_) || | | | | || | | | | || (_| || | | || (_| |
 *  \____|\___/ |_| |_| |_||_| |_| |_| \__,_||_| |_| \__,_|
 */
	public function onCommand(CommandSender $sender, Command $command, $label, array $args): bool{
		switch($command->getName()){
			case "joinset":
			if(isset($args[0])){
				switch($args[0]){
					case "reload":
					$this->config->reload();
					$sender->sendMessage(TextFormat::YELLOW . "Profile reloading completed!");
					$sender->sendMessage(TextFormat::YELLOW . "配置文件重新加载完成!");
					return true;
				}
			}else{
				$sender->sendMessage(TextFormat::RED . "Usage: /joinset reload");
				$sender->sendMessage(TextFormat::RED . "用法: /joinset reload");
				return true;
			}
		}
	}
}
