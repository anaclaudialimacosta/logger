<?php

namespace MyLogger\LoggerHandlers;

use MyLogger\Interfaces\MyLoggerInterface;
use MyLogger\Formatter\LogInFileFormatter;
use PHPUnit\Util\Exception;

class LoggerFileHandler implements MyLoggerInterface
{
    private LogInFileFormatter $logInFileFormatter;

    public function __construct(LogInFileFormatter $logInFileFormatter)
    {
        $this->logInFileFormatter = $logInFileFormatter;
    }

    public function log(string $log, array $logger)
    {
        if(empty($logger['file']))
        {
           throw new Exception("File's Path Not Defined");
        }
        $loggerPath = $logger['file'];
        $file = fopen($loggerPath, 'w');
        fwrite($file, $this->logInFileFormatter->formatLog($log));
        fclose($file);
    }
}
