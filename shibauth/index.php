<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shibboleth Test</title>
</head>
<body>
    <h1>Shibboleth Test</h1>
<?php
// Include the Shibboleth attributes you intend to test here
$attributes = array(
   'displayName', 
   'MAIL', 
   'eduPersonPrincipalName',
   'REMOTE_USER',
   'Shib-EP-UnscopedAffiliation', 
   'organizationName', 
   'preferredLanguage', 
   'schacHomeOrganization'
);
//print_r($_SERVER);
foreach($attributes as $a){
    print "<p>";
    print "<strong>$a</strong> = ";
    print isset($_SERVER[$a]) ? $_SERVER[$a] : "<em>Undefined</em>";
    print "</p>";
}
?>
</body>
</html>
