# Gist
PHP API wrapper for Gist.

<h3>Manage Gists at your Backend</h3>
<ul>
    <li>List all your Gists</li>
    <li>Create Gist</li>
    <li>View Gist</li>
    <li>Edit Gist</li>
    <li>Delete Gist</li>
    <li>View Public Gists</li>
</ul>

```
<?php

use myPHPnotes\Gist;
use myPHPnotes\GistObject;

require_once "../Gist.php";
require_once "../GistObject.php";

$gist = new Gist();


$authorisedGist = new Gist("AdnanHussainTurki", "ddbfd0fb1c955cc3aa7a539cff359ed43d5185ba");

$GistObject = new GistObject("TEST", true);
$GistObject->addContent("test.txt", "This is a dfdasf test");
$GistObject->addContent("test2.txt", "This is a dasfdasf test");
$GistObject->addContent("test.txt", "This is a adsfewwe test");
$authorisedGistObject->delete("4300707c03acbf96d570b2a70c871eb7");

?>
```


<div >
    <p  align="center">Built in <strong>India</strong></p>
</div>  
<hr>
<p>
    <strong>Just a helper project by Adnan Hussain Turki.</strong><br>
</p>  
<p><strong>Contributors are gratefully welcome.. :).</strong></p>
