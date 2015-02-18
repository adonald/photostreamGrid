<?php
/* photostreamGrid v1.0.0
 * Copyright 2015 Alex Donald
 * Licensed under MIT
 * https://www.adonald.co.uk/projects/photostreamgrid/
--------------------------------------------------------------------*/

/* Change these variables to suit your preferences
--------------------------------------------------------------------*/
// your API key, get one here:
// https://www.flickr.com/services/apps/create/apply/
$apiKey = "INSERT_YOUR_API_KEY_HERE";

// the ID of the user who's photstream you want to display; usually yours
$userID = "INSERT_USER_ID_HERE";

// how many photos you want returned - the API returns a maximum of 100
$perPage = 40;

/* Set other API parameters
--------------------------------------------------------------------*/
$apiURL = "https://api.flickr.com/services/rest/";
$apiMethod = "flickr.people.getPublicPhotos";
$page = 1;
$returnFormat = "json";

// Concatenate parameters into API request URL
$jsonURL = $apiURL . "?api_key=" . $apiKey . "&user_id=" . $userID
           . "&method=" . $apiMethod . "&per_page=" . $perPage
           . "&page=" . $page . "&format=" . $returnFormat;

// Fetch API response
$json = file_get_contents($jsonURL);

// Strip callback function from response, and remove trailing parenthesis
$json = str_replace('jsonFlickrApi(', '', $json);
$json = substr($json, 0, strlen($json) - 1);

// Import json into array
$jsonArray = json_decode($json, true);

// Simplify array to just include list of photos
$photosArray = $jsonArray['photos']['photo'];

$photosHTML = "\t<div class=\"photos\">\n";

foreach ($photosArray as $photo) {
    // Create image URL
    $thumbURL = 'https://farm' . $photo['farm'] . '.staticflickr.com/'
              . $photo['server'] . '/' . $photo['id'] . '_'
              . $photo['secret'] . '_n.jpg';

    $imgURL = 'https://farm' . $photo['farm'] . '.staticflickr.com/'
              . $photo['server'] . '/' . $photo['id'] . '_'
              . $photo['secret'] . '_b.jpg';

    $photosHTML .= "\t\t<a href=\"".$imgURL."\" data-lightbox=\"portfolio\" data-title=\"".$photo['title']."\">\n";
    $photosHTML .= "\t\t\t<img src=\"".$thumbURL."\" />\n";
    $photosHTML .= "\t\t</a>\n";
}

$photosHTML .= "\t</div>\n";
