<?php

/**
 * @Author: Adnan Hussain Turki
 * @Website: www.myphpnotes.com
 * @Email Address: adnanhussainturki@gmail.com
=====================================
 * @Creation Time:   2019-09-06 19:47:42
 * @Last Modified by:   Adnan
 * @Last Modified time: 2019-09-16 21:05:10
=====================================
   PROPERTY OF WWW.MYPHPNOTES.COM
 */
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
        // TO BE BUILT
    }

    public function myGists($page = 1, $perPage = 100)
    {
        $this->checkAuth();
        return $this->curl($this->host . "/users/{$this->username}/gists", ["access_token" => $this->token, "page" => $page, 'per_page' => $perPage]);
    }
    public function view(string $gist_id)
    {
        return $this->curl($this->host . "/gists/" . $gist_id, ["access_token" => $this->token]);       
    }
    public function viewPrivate(string $gist_id)
    {
        $this->checkAuth();
        return $this->curl($this->host . "/gists/" . $gist_id, ["access_token" => $this->token]);
    }
    public function create(GistObject $gist)
    {
        $this->checkAuth();
        return $this->curl($this->host . "/gists?access_token=" . $this->token, json_encode($gist, JSON_FORCE_OBJECT), "application/json", true);
    }
    public function delete(string $gist_id)
    {
      $this->checkAuth();
        return $this->curl($this->host . "/gists/{$gist_id}?access_token=" . $this->token, [], "application/json", false, false, true);      
    }
    public function edit(string $gist_id, GistObject $gist)
    {
       // PRIVACY OF THE GIST CANNOT BE CHANGED BY THIS
        $this->checkAuth();
        return $this->curl($this->host . "/gists/{$gist_id}?access_token=" . $this->token, json_encode($gist, JSON_FORCE_OBJECT), "application/json", false, true);
    }
    protected function curl($url, $parameters = [], $content_type = "application/json", $post = false, $patch = false, $delete = false)
    {
        $ch = curl_init();
        if ($post) {
            curl_setopt($ch, CURLOPT_POST, $post);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        } elseif($patch) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        } elseif($delete) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
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
        die($result);
        return $result;
    }
    protected function checkAuth() {
        if (!$this->username or !$this->token) {
            die("UNAUTHORISED");
        }
    }
}