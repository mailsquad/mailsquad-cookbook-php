<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Custom subscription example</title>
</head>
<body>

<?php

// Documentation reference: https://mailsquad.com/api-doc/#!/subscription/subscription_listid_post

require_once 'unirest-php/lib/Unirest.php';

// Set your API key here
Unirest::defaultHeader("Authorization", "Bearer YOUR_API_KEY");

// Set the destination listid here
$listid = "YOUR_LIST_ID"; // Exemple: 549336754da75c34efab4785

// Do the subscribe
$response = Unirest::post("https://api.inboxroute.com/api/subscription/" . $listid, array( "Accept" => "application/json" ),
  json_encode(array(
    "email" => "email@email.com",
    "fullname" => "FirstName LastName",
    "singleoptin" => true,
    "ip" => $_SERVER['REMOTE_ADDR'],
    "confirmed" => date("c") // ISO 8601 format
  ))
);

?>

<p>
You should get a 204 response code with an empty body.
</p>

<p>
<?php echo "Response code: " . $response->code; ?>
</p>

</body>
</html>
