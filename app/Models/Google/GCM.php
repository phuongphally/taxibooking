<?php
 namespace App\Models\Google;




 class GCM  {


   // constructor
   function __construct() {

   }

 // sending push message to single user by gcm registration id
   public function send($to, $message) {
    $fields = array(
        'to' => $to,
        'data' => $message,
    );
    return $this->sendPushNotification($fields);
   }

   // Sending message to a topic by topic id
   public function sendToTopic($to, $message) {
    $fields = array(
        'to' => '/topics/' . $to,
        'data' => $message,
    );
    return $this->sendPushNotification($fields);
   }

   // sending push message to multiple users by gcm registration ids
   public function sendMultiple($registration_ids, $message) {
    $fields = array(
        'registration_ids' => $registration_ids,
        'data' => $message,
    );

    return $this->sendPushNotification($fields);
  }

   // function makes curl request to gcm servers
   private function sendPushNotification($fields) {

    // Set POST variables
    $url = 'https://gcm-http.googleapis.com/gcm/send';

    $headers = array(
        'Authorization: key=' . 'AIzaSyCiac3IcSQMc5Uex0FdTgcr9L4nGLGf-dk',
        'Content-Type: application/json'
    );
    // Open connection
    $ch = curl_init();

    // Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Disabling SSL Certificate support temporarly
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    // Execute post
    $result = curl_exec($ch);
    if ($result === FALSE) {
     dd('Curl failed: ' . curl_error($ch));
    }

    // Close connection
    curl_close($ch);

    return $result;
   }


 }