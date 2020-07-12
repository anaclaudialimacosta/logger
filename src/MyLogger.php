<?php

namespace MyLogger;

use MyLogger\Interfaces\MyLoggerInterface;

class MyLogger
{
    private MyLoggerInterface $nextLoggerHandler;

    public function loggerCOR(string $log, array $logger)
    {
        if($this->nextLoggerHandler)
        {
            return $this->nextLoggerHandler->log($log, $logger);
		}
    }
    
    private function setNextLoggerHandler(MyLoggerInterface $logger) : MyLoggerInterface
    {
        if(!empty($logger))
        {
            $this->nextLoggerHandler = $logger;
        }
        return $logger;
    }

}
