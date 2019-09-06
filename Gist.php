<?php

namespace myPHPnotes;

/**
 *      
 */
class Gist
{
    protected $token;
    protected $username;
    function __construct(string username, string $token)
    {
        $this->username = $username;
        $this->token = $token;
    }
}