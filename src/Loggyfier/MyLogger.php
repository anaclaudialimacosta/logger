<?php

namespace MyLogger;

use MyLogger\Interfaces\MyLoggerInterface;

class MyLogger
{
    private MyLoggerInterface $nextLoggerHandler;

    public function loggerCOR(string $log, array $logger)
    {
        if(self::nextLoggerHandler)
        {
            return $this->nextLoggerHandler->log($log, $logger);
		}
    }
    
    private function setNextLoggerHandler(MyLoggerInterface $logger) : MyLoggerInterface
    {
        $this->nextLoggerHandler = $logger;
        return $logger;
    }

}
