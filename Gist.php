<?php

namespace myPHPnotes;

/**
 *      
 */
class Gist
{
    protected $token;
    protected $username;
    function __construct(string username = null, string $token = null)
    {
        $this->username = $username;
        $this->token = $token;
    }
    public function myGists()
    {
        # code...
    }
    public function view()
    {
                
    }
    public function delete()
    {
                
    }
    public function edit()
    {
                    
    }
    
}