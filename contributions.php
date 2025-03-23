<?php

// Get the username from the URL parameter
$username = isset($_GET['username']) ? $_GET['username'] : 'yyx990803'; // Default to 'yyx990803' if no parameter is provided
// Sanitize the username to prevent security risks
$username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

// Replace the hardcoded username in the URL
$url = "https://github.com/$username?action=show&controller=profiles&tab=contributions&user_id=$username";

// Initialize cURL session
$ch = curl_init($url);

// for testing
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'X-Requested-With: XMLHttpRequest', // Example of a custom header
]);

// Execute the request
$htmlContent = curl_exec($ch);

if ($htmlContent === false) {
  die("cURL Error: " . curl_error($ch));
}

// Close cURL session
curl_close($ch);

// Load the HTML into DOMDocument
$dom = new DOMDocument();
// Suppress warnings for invalid HTML
libxml_use_internal_errors(true);
$dom->loadHTML($htmlContent);
libxml_clear_errors();

// Extract the element with the class name 'graph-before-activity-overview'
$xpath = new DOMXPath($dom);
$elements = $xpath->query("//*[@class='border py-2 graph-before-activity-overview']");

header('Access-Control-Allow-Origin: *');

if ($elements->length === 0) {
  echo "No element contributions found.";
} else {
  // Display the contribution graph section
  echo $dom->saveHTML($elements->item(0));
}
?>