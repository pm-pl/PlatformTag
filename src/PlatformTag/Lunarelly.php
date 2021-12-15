<?php

declare(strict_types=1);

/*
 *  _                               _ _       
 * | |   _   _ _ __   __ _ _ __ ___| | |_   _ 
 * | |  | | | | '_ \ / _` | '__/ _ \ | | | | |
 * | |__| |_| | | | | (_| | | |  __/ | | |_| |
 * |_____\__,_|_| |_|\__,_|_|  \___|_|_|\__, |
 *                                      |___/ 
 * 
 * Author: Lunarelly
 * 
 * GitHub: https://github.com/Lunarelly
 * 
 * Telegram: https://t.me/lunarellyy
 * 
 */

namespace PlatformTag;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\event\player\PlayerJoinEvent;

final class Lunarelly extends PluginBase implements Listener {

    private $platform = array();

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function getPlatform(Player $player): string
    {
        $platform = match($player->getPlayerInfo()->getExtraData()["DeviceOS"])
        {
                1 => "Android",
                2 => "iOS",
                3 => "macOS\Linux",
                4 => "FireOS",
                5 => "GearVR",
                6 => "Hololens",
                7 => "Windows",
                8 => "Windows",
                9 => "Unknown",
                10 => "TV OS",
                11 => "PlayStation",
                12 => "Nintendo Switch",
                13 => "Xbox",
                14 => "Windows Phone",
                default => "Unknown"
        };
        return $platform;
    }

    public function onJoin(PlayerJoinEvent $event): void
    {
        $player = $event->getPlayer();
        $platform = $this->getPlatform($player);
        $player->setScoreTag("§7" . $platform);
    }
}