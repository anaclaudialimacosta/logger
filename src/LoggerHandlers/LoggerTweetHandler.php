<?php

namespace MyLogger\LoggerHandlers;

use http\Exception\RuntimeException;
use Loggyfier\Interfaces\MyLoggerInterface;
use PHPUnit\Util\Exception;
use MyLogger\TwitterAPILib\TwitterAPIExchange;

require_once ('../../config.php');

class LoggerTweetHandler implements  MyLoggerInterface
{

    private string $requestMethod;

    private TwitterAPIExchange $twitterAPIExchange;

    public function __construct()
    {
        $this->twitterAPIExchange = new TwitterAPIExchange($this->defineTwitterSettings());
        $this->requestMethod = 'POST';
    }

    public function log(string $log, array $logger)
    {
        if(empty($logger['tweet']))
        {
            throw new Exception('Twitter Was Not Requested');
        }
        $apiData = array('status' => $log);
        $this->invokeTwitterAPI($apiData);
    }

    private function invokeTwitterAPI($apiData)
    {
        try
        {
            $this->twitterAPIExchange->buildOauth(TWITTER_URL_POST_TWEET, 'POST');
            $this->twitterAPIExchange->setPostfields($apiData);
            $this->twitterAPIExchange->performRequest(true, array(CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => 0));
        } catch (\Exception $e)
        {
            echo 'It was not possible to perform the request to Twitter';
        }
    }

    private function defineTwitterSettings()
    {
        return array(
            'oauth_access_token' => TWITTER_ACCESS_TOKEN,
            'oauth_access_token_secret' => TWITTER_ACCESS_TOKEN_SECRET,
            'consumer_key' => TWITTER_CONSUMER_KEY,
            'consumer_secret' => TWITTER_CONSUMER_SECRET
        );
    }
}
