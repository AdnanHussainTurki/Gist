# Gist
PHP API wrapper for Gist.

<h3>Manage Gists at your Backend</h3>
<ul>
    <li>List all your Gists ()</li>
    <li>Create Gist ()</li>
    <li>View Gist ()</li>
    <li>Edit Gist< ()/li>
    <li>Delete Gist ()</li>
    <li>View Public Gists (Can be viewed using unauthenticated Gist)</li>
</ul>
<hr>

```
<?php

use myPHPnotes\Gist;
use myPHPnotes\GistObject;

require_once "../Gist.php";
require_once "../GistObject.php";

$gist = new Gist();


$authorisedGist = new Gist("AdnanHussainTurki", "ddbfd0fb1c955cc3aa7a539cff359ed43d5185ba");


<!-- List All Public Gists -->
$page = 1;
$perPage = 100;
$gist->getPublicGists($page, $perPage);
<!-- All Public Gists Pulled as JSON -->


<!-- Creating Gist -->
$GistObject = new GistObject("TEST", true);
$GistObject->addContent("test.txt", "This is a dfdasf test");
$GistObject->addContent("test2.txt", "This is a dasfdasf test");
$GistObject->addContent("test.txt", "This is a adsfewwe test");
$authorisedGist->create($GistObject); // ID of the Gist will be returned in JSON
<!-- Gist Created -->

<!-- Editing Gist -->
$GistObject = new GistObject("TEST", true);
$GistObject->addContent("test.txt", "This is a edited dfdasf test");
$GistObject->addContent("test2.txt", "This is a edited dasfdasf test");
$GistObject->addContent("test.txt", "This is a edited adsfewwe test");
$authorisedGist->edit( "<--ID_OF_GIST_TO_BE_EDITED-->", $GistObject); // ID of the Gist will be returned in JSON
<!-- Gist Edited -->

<!-- Deleting Gist -->
$authorisedGistObject->delete("ID_OF_THE_GIST");
<!-- Gist Deleted -->

<!-- My Gists -->
$page = 1;
$perPage = 100;
$gist->myGists($page, $perPage); 
<!-- My Gist Pulled as JSON -->


?>
```

<hr>
<div >
    <p  align="center">Built in <strong>India</strong></p>
</div>  
<hr>
<p>
    <strong>Just a helper project by Adnan Hussain Turki.</strong><br>
</p>  
<p><strong>Contributors are gratefully welcome.. :).</strong></p>
