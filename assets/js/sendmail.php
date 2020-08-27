<?php
    $request = $_GET['task'];

    function test($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    switch ($variable) {
        case 'sendmail':
            if($_SERVER['REQUEST_METHOD'] == POST){
                $name = test($_POST['name']);
                $email = test($_POST['email']);
                $subject = test($_POST['subject']);
                $message = test($_POST['message']);

                $header = "From:".$email."\r\n";
                $header .= "Cc:afgh@somedomain.com \r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type: text/html\r\n";
                $retval = mail ($to,$subject,$message,$header);
                if (empty($name) or empty($email) or empty($subject) or empty($message)){
                $res = array('status' => 0, 'message' => "Please fill up every field");
                }else{
                $message = $subject."\n from: ".$name." "."\n Email: ".$email."Message: ".$message;
                $to ="samuelonye080@gmail.com";
                if($retval == true){
                    $res = ['status' => 1, 'message' => "Message sent."];
                }else {
                    $res = ['status' => 0, 'message' => "Sorry, your message wasn't sent."];
                }
                }
            }
            
            echo json_encode($res);
            break;
        
        default:
            # code...
            break;
    }