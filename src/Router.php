<?php

namespace ModnarLluf\DiscBot;

class Router
{
    /**
     * @var array
     */
    private $messageHandlers = [];

    /**
     * @param array $handlers
     */
    public function __construct($handlers = [])
    {
        $this->messageHandlers = $handlers;
    }

    /**
     * Loop on handlers and handle message for compatibles handlers
     *
     * @param $message
     */
    public function sendThroughHandlers($message)
    {
        foreach($this->listHandlers() as $handler) {
            /** @var MessageHandler $handler */
            if ($handler::isHandlingMessage($message)) {
                $handler->handle($message);
            }
        }
    }

    /**
     * @return \Generator
     */
    private function listHandlers()
    {
        foreach($this->messageHandlers as $messageHandler) {
            yield $messageHandler;
        }
    }

    /**
     * @param MessageHandler $messageHandler
     * @return $this
     */
    public function addHandler(MessageHandler $messageHandler)
    {
        $this->messageHandlers[] = $messageHandler;
        return $this;
    }

    /**
     * @param MessageHandler[] $messageHandlers
     * @return $this
     */
    public function addHandlers($messageHandlers)
    {
        $this->messageHandlers = array_merge($this->messageHandlers, $messageHandlers);
        return $this;
    }
}