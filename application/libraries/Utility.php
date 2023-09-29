<?php

class Utility
{
    
    /*
     * REFERENCE BY :
     * http://stackoverflow.com/questions/27633584/php-fatal-error-call-to-undefined-function-mcrypt-get-iv-size-in-appserv
     */
    public $skey = "SHAREMYPET_PRODUCT-CRTD16092016\0";
                    
    function encodeText($value, $removeTags = false)
    {
        if (is_array($value)) {
            foreach ($value as $k => $v) {
                $val = $removeTags ? strip_tags($v) : $v;
                $val = addslashes($val);
                $value [$k] = $val;
            }
        }
        else {
            $value = $removeTags ? strip_tags($value) : $value;
            $value = addslashes($value);
        }
        return $value;
    }

    function decodeText($value, $htmlEntity = true)
    {
        if (is_array($value)) {
            foreach ($value as $k => $v) {
                $val = stripslashes($v);
                $value [$k] = $htmlEntity ? htmlentities($val) : $val;
            }
        }
        elseif (is_object($value)) {
            foreach ($value as $k => $v) {
                $val = stripslashes($v);
                $value->$k = $htmlEntity ? htmlentities($val) : $val;
            }
        }
        else {
            $value = stripslashes($value);
            $value = $htmlEntity ? htmlentities($value) : $value;
        }
        return $value;
    }

    public function safe_b64encode($string)
    {
        $data = base64_encode($string);
        $data = str_replace(array(
            '+',
            '/',
            '='
        ), array(
            '-',
            '_',
            ''
        ), $data);
        return $data;
    }

    public function safe_b64decode($string)
    {
        $data = str_replace(array(
            '-',
            '_'
        ), array(
            '+',
            '/'
        ), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public function encode($value)
    {
        if (! $value) {
            return false;
        }
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext));
    }

    public function decode($value)
    {
        if (! $value) {
            return false;
        }
        $crypttext = $this->safe_b64decode($value);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return (trim($decrypttext));
    }

    public function setFlashMessage($type, $message)
    {
        $CI = & get_instance();
        $template = '<div class="alert alert-' . $type . ' alert-dismissible text-center" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						   <span aria-hidden="true">&times;</span>
							</button>' . $message . '</div>';
        
        $CI->session->set_flashdata("myMessage", $template);
    }

    public function sendMailSMTP($data)
    {
        $config ['protocol'] = "smtp";
        $config ['smtp_host'] = SMTP_HOST;
        $config ['smtp_port'] = SMTP_PORT;
        $config ['smtp_user'] = SMTP_USER;
        $config ['smtp_pass'] = SMTP_PASS;
        $config ['smtp_timeout'] = 20;
        $config ['priority'] = 1;
        
        $config ['charset'] = 'utf-8';
        $config ['wordwrap'] = TRUE;
        $config ['crlf'] = "\r\n";
        $config ['newline'] = "\r\n";
        $config ['mailtype'] = "html";
        
        $CI = & get_instance();
        $message = $data ["message"];
        $CI->load->library('email', $config);
        $CI->email->initialize($config);
        $CI->email->clear();
        $CI->email->from($config ['smtp_user'], PROJECT_NAME);
        $CI->email->to($data ["to"]);
        if (isset($data ["bcc"])) {
            $CI->email->bcc($data ["bcc"]);
        }
        $CI->email->reply_to($config ['smtp_user'], '<noreply@stagegator.com>');
        $CI->email->subject($data ["subject"]);
        $CI->email->message($message);
        $response = $CI->email->send();
        
        return true;
    }
      
    /**
     * fbShareButton()
     * This function is used to facebook share button
     *
     * Developer - Pravin Dabhi
     * Datetime - 7-11-2016 03:44
     *
     * @param : $content: String content to share
     * @return : Google plus share button
     */
    public function fbShareButton($image = null, $title = null, $description = null, $url = null)
    {
        $description = urldecode($description);
        $description = str_replace([
            "</br>",
            "<br/>",
            "</p>"
        ], [
            "\r\n",
            "\r\n",
            "</p>\r\n"
        ], $description);
        $description = strip_tags($description);
        $description = urlencode($description);
        ?>
<a
	href="https://www.facebook.com/sharer/sharer.php?u=<?=$url?>&title=<?php echo trim($title); ?>
        		<?php if($image != ""){?>&picture=<?php echo $image; ?> <?php } ?>&description=<?php echo $description; ?>"
	onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
	target="_blank" title="Share on Facebook"><img
	src="<?php echo EXTERNAL_PATH ?>images/fb_share_s.png" /> </a>

<?php
    }
    
    
    function sendNotification($deviceToken,$jsonData=null,$type=null,$unread=null){
        
        $message = array(
            'message' => $deviceToken['message'],
        );
            if($deviceToken['type'] == 'ios'){
                $this->notificationForIOS($deviceToken['device_id'], $message,$jsonData,$type,$unread);
            }else if($deviceToken['type'] == 'android'){
                $this->notificationForAndroid($deviceToken['device_id'],$message,$jsonData,$type,$unread);
            }
       
        return TRUE;
    }
    
    function notificationForIOS($deviceId,$msg,$jsonData,$type,$unread){
//            echo "enter";
            $passphrase = '1234';
            $ctx = stream_context_create();
            stream_context_set_option($ctx, 'ssl', 'local_cert', 'ck.pem');
            stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

            $fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 30, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

            if (!$fp)
                exit("Failed to connect: $err $errstr" . PHP_EOL);

            
            $message = $msg;

            // Create the payload body
            $body ['aps'] = array(
                'alert' => $message['message'],
                'badge' => (int)$unread,
                'sound' => 'default',
                'type' => $type,
                'data' => $jsonData,
            );

            // Encode the payload as JSON
            $payload = json_encode($body);

            // Build the binary notification
            $msg = chr(0) . pack('n', 32) . pack('H*', $deviceId) . pack('n', strlen($payload)) . $payload;

            // Send it to the server
            $result = fwrite($fp, $msg, strlen($msg));
//            var_dump($result); die;
            fclose($fp);
            
    }
    
    function notificationForAndroid($deviceId,$msg,$jsonData,$type , $unread) {
            $message = $msg;
            
            $url = 'https://fcm.googleapis.com/fcm/send';
            $fields = array(
                'to' => $deviceId,
                'notification' => array(
                    "body" => $message['message'],
                    "title" => "Sports",
                    
                ),
                "data" => array(
                    "body" => $message['message'],
                    "title" => "Sports",
                    "notify" => "notification",
                    'type' => $type,
                    'data' => $jsonData,
                    'badge' => $unread,
                )
            );
            
            $fields_json = json_encode($fields);
            
            $headers = array(
                'Authorization: key= AAAAN7pGzqM:APA91bGjSoksYAJHdxtvBaNqt2VCqKuNiBzJiYsMwvNVuyGAJ8Iuj1HNEClo_VkzgdGuTHWoHp7O9FYP7Et_l2eI_iNNEEePeao3Q5qlVNNMIsp93_60xvxAAPMvIspLzQ3nsFM6_9n7',
                'Content-Type: application/json'
            );
           
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_json);
            $result = curl_exec($ch);
            curl_close($ch);
            
        }
        // set Response for api /

    function sentResponse($array) {
        $arrayCount = count($array);

        if ($arrayCount == 2) {
            $setResponse = array(
                'success' => $array[0],
                'message' => $array[1],
            );
        } else {
            $setResponse = array(
                'success' => $array[0],
                'message' => $array[1],
                $array[3] => $array[2],
            );
        }

        return $setResponse;
    }
}

?>