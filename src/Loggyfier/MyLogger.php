<?php

namespace MyLogger;

use Loggyfier\Interfaces\MyLoggerInterface;

class MyLogger implements MyLoggerInterface
{
    private MyLoggerInterface $nextLoggerHandler;

    public function log(string $log, array $logger)
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
