<?php

namespace MyLogger\Formatter ;

class LogInFileFormatter
{
    public  function formatLog(string $log) : string
    {
        return "[" . date('d/m/Y H:i') . "]" . $log;
    }
}
