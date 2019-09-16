<?php



namespace myPHPnotes;

use JsonSerializable;

class GistObject implements JsonSerializable  
{
    protected $objectArray;
    function __construct(string $description, bool $public)
    {
        $this->objectArray['description'] = $description;
        $this->objectArray['public'] = $public;
    }
    public function addContent(string $file_name, string $file_content)
    {
        $this->objectArray['files'][$file_name] = ["content" =>$file_content];
    }
    public function removeContent(string $filename)
    {
        if (isset($this->objectArray['files'][$filename])) {
            unset($this->objectArray['files'][$filename]);
        } else {
            die("Content with this filename not found. File Name: " . $filename);
        }
    }
    public function jsonSerialize() {
        if ((!isset($this->objectArray['files'])) OR (count($this->objectArray['files']) === 0)) {
            die("Gist Object does not contains any content.");
        }
        return $this->objectArray;
    }
}