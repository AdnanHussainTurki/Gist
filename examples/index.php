<?php

require_once "../src/Gist.php";
require_once "../src/GistObject.php";

use myPHPnotes\Gist;
use myPHPnotes\GistObject;


$unauthenticatedgist = new Gist();


$authenticatedGist = new Gist("AdnanHussainTurki", "ddbfd0fb1c955cc3aa7a539cff359ed43d5185ba");

$GistObject = new GistObject("TEST", true);
$GistObject->addContent("test.txt", "This is a dfdasf test");
$GistObject->addContent("test2.txt", "This is a dasfdasf test");
$GistObject->addContent("test.txt", "This is a adsfewwe test");
$authorisedGistObject->delete("4300707c03acbf96d570b2a70c871eb7");

?>