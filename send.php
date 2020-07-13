   <?php
   $url = "https://fcm.googleapis.com/fcm/send";
    $token = "dsj7dh8dumemsrM9xTQAlX:APA91bGTabPqD7HUmMR_A3bCTG8zn28O-YL59GvHtVkkg7C1wc1STrYrdZDe_t3ZzOBRUGt7rANAhpiVdeYLWp0kNVQMTQjw7F3Bg7486zw950lLj41nRXSKMcNLBGYjgERmL-Bx81cn";
    $serverKey = 'AAAAHWPex4U:APA91bENZtucyCIyg0fW5wCyiyvppHMXOOU_lWK3tsWgrkShay8WF_-Rad_HtUlCxUt0sjdhkqjRjoiLI1Zy6ac7CotaOfA36I7AoD_xWonTu6yN3TgkehiurhWypjqr4nyOGZCefjze';
    $title = "Notification title";
    $body = "Hello I am from Your php server";
    $notification = array('title' =>$title , 'text' => $body, 'sound' => 'default', 'badge' => '1');
    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array(
        "authorization: key=".$serverKey,
        "content-type: application/json"
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    if ($response === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);