<?php

namespace MyLogger\LoggerHandlers;

use http\Exception\RuntimeException;
use Loggyfier\Interfaces\MyLoggerInterface;
use PHPUnit\Util\Exception;

require_once ('../../config.php');

class LoggerTweetHandler implements  MyLoggerInterface
{
    public function log(string $log, array $logger)
    {
        if(empty($logger['tweet']))
        {
            throw new Exception('Twitter Was Not Requested') ;
        }

    }
}
