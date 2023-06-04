<?php

/**
 *  _                               _ _
 * | |   _   _ _ __   __ _ _ __ ___| | |_   _
 * | |  | | | |  _ \ / _  |  __/ _ \ | | | | |
 * | |__| |_| | | | | (_| | | |  __/ | | |_| |
 * |_____\____|_| |_|\____|_|  \___|_|_|\___ |
 *                                      |___/
 *
 * @author Lunarelly
 * @link https://github.com/Lunarelly
 *
 */

declare(strict_types=1);

namespace lunarelly\platformtag;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class PlatformTagListener implements Listener
{
    public function __construct(private readonly PlatformTagPlugin $plugin)
    {
    }

    public function handlePlayerJoin(PlayerJoinEvent $event): void
    {
        $player = $event->getPlayer();

        $player->setScoreTag(str_replace(
            "{PLATFORM}",
            $this->plugin->getPlayerPlatform($player),
            $this->plugin->getConfig()->getNested("scoretag")
        ));
    }
}
