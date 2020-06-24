<?php

namespace Peppa\AdvJoinUI;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

//Warning: Don't Edit Anything Here Unless You Know What Your Doing!

class Main extends PluginBase implements Listener {
  
  public function onEnable() {
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
//The Next Part Is The Join Message And UI Part! 

//JOINMESSAGE(ONLY SENT TO YOU): [$player->sendMessage("This is what displays when you join the server \nOnly you can see this message btw.")] 

//JOINMESSAGEPART: The next part is the join message part which everyone can see, You can just put [$event->setJoinMessage("§e[+]". $player->getName());] Where $player->getName is the part where the plugin gets your name and displays it.

//Quick Tip: "\n can be used to go to the next line for example: ("First Message That Displays On Top\n Second Message That Displays Below The First One");

  public function onJoin(PlayerJoinEvent $event){
    $player = $event->getPlayer();
    
    $player->sendMessage("--------------------\nWelcome To YourServerName .".$name.".\nYourTextHere\n--------------------");
    $event->setJoinMessage("§e[+]". $player->getName());
    
    $this->openMyForm($player);
  }

//Form Part/UI Part:

//Form Title Part: Basically $form->setTitle("This Is The Title");
//You Can Edit This To Change It, Just Dont Remove The "" And The Brackets () Or Anything Basically!

//Form Inner Content Part: Basically $form->setContent("This is the content displayed inside the form!");
//You Can Edit This To Change It, Just Dont Remove The "" And The Brackets () Or Anything Basically!

//Form Button Part: Basically $form->addButton("This Is The Button Name"); You Don't Really Need To Edit This But If You Want You Can!
//You Can Edit This To Change It, Just Dont Remove The "" And The Brackets () Or Anything Basically!

  public function openMyForm($player){ 
          $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
          $form = $api->createSimpleForm(function (Player $player, int $data = null){
              $result = $data;
              if($result === null){
                  return true;
              }             
              switch($result){
                  case 0:                    
                  break;                     
              }


              });
              $form->setTitle("§l§eAdvJoinUI");
              $form->setContent("§l§eWelcome to My Server\n§bHave Fun!§r");
              $form->addButton("§l§cExit");

}


//Leave/Quit Message Part:
//Pretty Much Identical To The Join Part.
//The [$event->setQuitMessage("§c[-]".$player->getName());] Part Will Be Displayed When A Player Leaves.
//You can edit the part in the brakets ("[-]")!
  public function onQuit(PlayerQuitEvent $event){
    $player = $event->getPlayer();
    $event->setQuitMessage("§c[-]". $player->getName());
  }
  

}
