<?php

namespace MyLogger\LoggerHandlers;

use MyLogger\Interfaces\MyLoggerInterface;
use MyLogger\Formatter\LogInFileFormatter;

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
        fwrite($file, formatLog($log));
        fclose($file);
    }
}
