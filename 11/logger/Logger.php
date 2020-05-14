<?php

namespace logger;

use Psr\Log\LoggerInterface;

class Logger implements LoggerInterface
{
    private $file;

    public function __construct($filename)
    {
        $this->file = fopen($filename, 'w');
    }

    public function log($level, $message, array $context = array())
    {
        $date = date("Y-m-d H:i:s");

        $json = json_encode([
            'type' => $level,
            'time' => $date,
            'context' => $context],
            JSON_PRETTY_PRINT);

        fwrite($this->file, $json);
    }

    function __destruct()
    {
        fclose($this->file);
    }

    /**
     * @inheritDoc
     */
    public function emergency($message, array $context = array())
    {
        // TODO: Implement emergency() method.
    }

    /**
     * @inheritDoc
     */
    public function alert($message, array $context = array())
    {
        // TODO: Implement alert() method.
    }

    /**
     * @inheritDoc
     */
    public function critical($message, array $context = array())
    {
        // TODO: Implement critical() method.
    }

    /**
     * @inheritDoc
     */
    public function error($message, array $context = array())
    {
        // TODO: Implement error() method.
    }

    /**
     * @inheritDoc
     */
    public function warning($message, array $context = array())
    {
        // TODO: Implement warning() method.
    }

    /**
     * @inheritDoc
     */
    public function notice($message, array $context = array())
    {
        // TODO: Implement notice() method.
    }

    /**
     * @inheritDoc
     */
    public function info($message, array $context = array())
    {
        // TODO: Implement info() method.
    }

    /**
     * @inheritDoc
     */
    public function debug($message, array $context = array())
    {
        // TODO: Implement debug() method.
    }
}