<?php

namespace Anders;

use pocketmine\utils\Config;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class Main extends PluginBase implements Listener{

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
		$Title = str_replace("&", "§", strval($this->config->get("Title")));
		$Title = str_replace("{name}", $name, $Title);
		$Title = str_replace("{line}", "\n", $Title);
		$SubTitle = str_replace("&", "§", strval($this->config->get("SubTitle")));
		$SubTitle = str_replace("{name}", $name, $SubTitle);
		$SubTitle = str_replace("{line}", "\n", $SubTitle);
		$player->addTitle($Title, $SubTitle, 20, 60, 20);
		$message = str_replace("&", "§", strval($this->config->get("Message")));
		$message = str_replace("{name}", $name, $message);
		$message = str_replace("{line}", "\n", $message);
		$player->sendMessage($message);
		$PlayerJoinMessage = str_replace("&", "§", strval($this->config->get("PlayerJoinMessage")));
		$PlayerJoinMessage = str_replace("{name}", $name, $PlayerJoinMessage);
		$PlayerJoinMessage = str_replace("{line}", "\n", $PlayerJoinMessage);
		$event->setJoinMessage($PlayerJoinMessage);
		if($player->isOp()){//If the player is OP.
			$player->setGamemode(1);//Set the game mode to Creative.
		}
	}
	public function onPlayerQuit(PlayerQuitEvent $event):void{
		$player = $event->getPlayer();
		$name = $player->getName();
		$PlayerQuitMessage = str_replace("&", "§", strval($this->config->get("PlayerQuitMessage")));
		$PlayerQuitMessage = str_replace("{name}", $name, $PlayerQuitMessage);
		$PlayerQuitMessage = str_replace("{line}", "\n", $PlayerQuitMessage);
		$event->setQuitMessage($PlayerQuitMessage);
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
			case "Hello":
			$sender->sendMessage("Hello, World!");
			return true;
		}
	}
	
	public function onDisable(){//Plugin disabled
	}
	//Very good, at least he can now function normally.
}
