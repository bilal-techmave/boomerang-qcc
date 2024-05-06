<?php
 function pushyNotification($title,$message,$token,$data1,$type){
    $data = array('title' => $title,'message' => $message,'data'=>$data1,'type'=>$type);
    $to = $token;
    $options = array(
        'notification' => array(
            'badge' => 1,
            'sound' => 'ping.aiff',
            'title' => $title,
            'body'  => $message,
            'content_avaliable' => true,
            'category' =>'invitation'
        ),
        'content_avaliable' => true
    );
    $content['content_avaliable'] = true;
    // Send it with Pushy
    PushyAPI::sendPushNotification($data, $to, $options,$content);
}



    public function ds()
    {
        $dataArr = [];
                    $type    = 'alert';

                    $inserted_data = DB::table('tbl_visitors')->orderBy('id','desc')->get();
                    $data1 = DB::table('tbl_visitors')->where('id','=',$inserted_data[0]->id)->where('society_id','=',$req->input('society_id'))->first();
                    if($data1->image!=''){
                        $data1->image_url = $this->url('public/uploads/visitor'.'/'.$data1->image);
                    }else{
                        $data1->image_url = '';
                    }
                    $dataArr = $data1;
                    $this->pushyNotification($title,$message,array($device_token),$dataArr,$type);
    }

static public function sendPushNotification($data, $to, $options,$content) {
    // Insert your Secret API Key here
    $apiKey = "b2ee87b3296fbf08fed68479260860f4c89e2391f61a2c3c034c3c77eff4d88d";
    // Default post data to provided options or empty array
    $post = $options ?: array();

    // Set notification payload and recipients
    $post['to'] = $to;
    $post['data'] = $data;
    $post['content_available'] = true;
    // $post['category'] ='invitation';
    // Set Content-Type header since we're sending JSON
    $headers = array(
        'Content-Type: application/json'
    );

    // Initialize curl handle
    $ch = curl_init();

    // Set URL to Pushy endpoint
    curl_setopt($ch, CURLOPT_URL, 'https://api.pushy.me/push?api_key=' . $apiKey);

    // Set request method to POST
    curl_setopt($ch, CURLOPT_POST, true);

    // Set our custom headers
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Get the response back as string instead of printing it
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Set post data as JSON
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post, JSON_UNESCAPED_UNICODE));

    // Actually send the push
    $result = curl_exec($ch);

    // Display errors
    if (curl_errno($ch)) {
        echo curl_error($ch);
    }
    // Close curl handle
    curl_close($ch);
    $response = @json_decode($result);

}

?>