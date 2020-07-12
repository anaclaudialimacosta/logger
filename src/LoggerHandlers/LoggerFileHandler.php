<?php

namespace MyLogger\LoggerHandlers;

use MyLogger\Interfaces\MyLoggerInterface;

class LoggerFileHandler implements MyLoggerInterface
{
    public function log(string $log, array $logger)
    {

        if(empty($logger['file']))
        {
           throw new \RuntimeException("File's Path Not Defined");
        }
        $loggerPath = $logger['file'];
        $file = fopen($loggerPath, 'w');
        fwrite($file, $log);
        fclose($file);
    }
}
