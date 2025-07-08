<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$url = "http://d1.appzone.io:8080/qsystem/rest/managementinformation/v2/branches/18/queues";

$username = "superadmin";
$password = "ulan";

$options = [
    "http" => [
        "header" => "Authorization: Basic " . base64_encode("$username:$password")
    ]
];

$context = stream_context_create($options);
$response = @file_get_contents($url, false, $context);

if ($response === FALSE) {
    http_response_code(500);
    echo json_encode(["error" => "Unable to fetch data from Qmatic API"]);
} else {
    echo $response;
}
?>
