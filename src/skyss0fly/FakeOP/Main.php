<?php

namespace skyss0fly\FakeOP;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class Main extends PluginBase {

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        switch ($command->getName()) {
            case "fakeop":
                if (count($args) < 1) {
                    $sender->sendMessage("Usage: /fakeop <player>");
                    return false;
                }

                $player = $sender->getServer()->getPlayerExact($args[0]);
                if ($player === null) {
                    $sender->sendMessage("Player not found");
                    return false;
                } else {
                    $sender->sendMessage("You have FakeOP'd " . $player->getName());
                    $player->sendMessage(TEXTFORMAT::GRAY . TEXTFORMAT::ITALIC . "[" . $sender->getName() . "] Opped: " . $player->getName() . ".");
                }
                return true; // Make sure to return true to indicate command success
        }
        return false; // If the command is not recognized, return false
    }
}
