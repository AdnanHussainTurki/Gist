<?php

namespace myPHPnotes;

/**
 *      
 */
class Gist
{
    protected $token;
    protected $username;
    protected $ssl;
    protected $host = "https://api.github.com";
    function __construct(string $username = null, string $token = null, $ssl = true)
    {
        $this->username = $username;
        $this->token = $token;
        $this->ssl = $ssl;
    }
    public function getPublicGists($page = 1, $perPage = 100)
    {   
        return $this->curl($this->host . "/gists", ["page" => $page, 'per_page' => $perPage]);
    } 
    public function getPublicStarred()
    {
        return $this->curl($this->host . "/gists");
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
    protected function curl($url, $parameters = [], $content_type = "application/json", $post = false)
    {
        $ch = curl_init();
        if ($post) {
            curl_setopt($ch, CURLOPT_POST, $post);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        } else {
            $http_parameters = http_build_query($parameters);
            $joiner = "?";
            if (stripos($url, "?")) {
                $joiner = "&";
            }
            $url.= $joiner . $http_parameters;
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->ssl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $headers = [];
        $headers[] = "Content-Type: {$content_type}";
        $headers[] = "user-agent: myPHPnotes PHP wrapper";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        return $result;
    }
}