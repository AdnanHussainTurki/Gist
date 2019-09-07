<?php

use myPHPnotes\Gist;

require_once "../Gist.php";

$gistObject = new Gist();

echo($gistObject->getPublicGists());