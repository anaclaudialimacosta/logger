<?php

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use MyLogger\LoggerHandlers\LoggerFileHandler;

class LoggerFileHandlerTest extends TestCase
{
    public static function provideLogAndFilePath()
    {
        return [
            ["Testing Log", __DIR__."../FileForTestLogger/test.log"],
            ["", __DIR__."../FileForTestLogger/test.log"]
        ];
    }
    /** @dataProvider provideLogAndFilePath*/
    public function shouldLogInFileIfPathNotEmpty(string $log, string $filePath)
    {
        $fileHandler = new LoggerFileHandler();
        $fileHandler->log($log, $filePath);

        Assert::assertFileExists($filePath);
        Assert::assertFileIsWritable($filePath);
    }

}
