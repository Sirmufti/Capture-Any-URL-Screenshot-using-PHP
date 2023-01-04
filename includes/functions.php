<?php

function captureScreenshot($url)
{
    $apiKey = "YOUR API";
    $request = "https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url={$url}&key=" . $apiKey;
    $hit = file_get_contents($request);
    $json = json_decode($hit);

    return $json;
}

if (isset($_POST['submit'])) {
    $url = $_POST["url"];

    $response =  captureScreenshot($url);

    $image = $response->lighthouseResult->audits->{'full-page-screenshot'}->details->screenshot->data;
}
