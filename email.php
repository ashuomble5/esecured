

    <?php

    $from ="example@yourcompany.in";

    $fromname ="Name";

    //$to ="someone@yourcompany.in";//Recipients list (semicolon separated)
     $to = "ashuomble5@gmail.com"
    $api_key ="2d142aeac38dd631fa8c445b56b19ea9";//api key

    $subject ="Test Mail";

    $content ="This is my Mail Content";

    $data=array();

    $data['subject']= rawurlencode($subject);

    $data['fromname']= rawurlencode($fromname);

    $data['api_key']= $api_key;

    $data['from']= $from;

    $data['content']= rawurlencode($content);

    $data['recipients']= $to;

    $apiresult = callApi(@$api_type,@$action,$data);

    echo trim($apiresult);

    function callApi($api_type='', $api_activity='', $api_input=''){

        $data = array();

        $result = http_post_form("https://api.pepipost.com/api/web.send.rest", $api_input);

        return $result;

    }

    function http_post_form($url,$data,$timeout=20){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$url);

        curl_setopt($ch, CURLOPT_FAILONERROR,1);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,0);

        curl_setopt($ch, CURLOPT_POST,1);

        curl_setopt($ch, CURLOPT_RANGE,"1-2000000");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch,  CURLOPT_REFERER,@$_SERVER['REQUEST_URI']);

        $result = curl_exec($ch);

        $result = curl_error($ch)? curl_error($ch): $result;

        curl_close($ch);

        return $result;

    }

    ?>

