<?php

namespace ModnarLluf\DiscBot\Handler;

use ModnarLluf\DiscBot\MessageHandler;

/**
 * Class TaGueule
 * @package ModnarLluf\DiscBot\Handler
 * @author Brice Sigura <brice@sigura.fr>
 */
class TaGueule implements MessageHandler
{
    const TAGUEULE_URL = 'http://i.imgur.com/3CKPQ4W.gif';

    /**
     * @param $message
     * @return bool
     */
    public function handle($message)
    {
        $message->channel->sendMessage(self::TAGUEULE_URL);

        return true;
    }

    /**
     * @param $message
     * @return bool
     */
    static public function isHandlingMessage($message)
    {
        return $message->content === '!tagueule' || $message->content === '!tg';
    }

    /**
     * @return string
     */
    static public function getHelp()
    {
        return '!tg !tagueule: sends an outrageous gif.';
    }
}