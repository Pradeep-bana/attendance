<?php
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("ps5456284@gmail.com","Pradeep Singh");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain",$content);

            $senderid = new \SendGrid($key);

            try {
                $response = $senderid->send($email);
                return $response;
            } catch (Exception $e) {
                echo 'Email exception Caught :'.$e->getMessage()."\n";
                return false;
            }
        }
    }
?>