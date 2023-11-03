<?php

require("../class/db.php");

require("../class/class.phpmailer.php");
require("../../app/config.php");
$db = new Database();

$date = date("Y-m-d");
$dtime = date("Y-m-d H:i:s");
if($_POST){
    switch ($_POST["req"]) {
        case 'addVisitor':
            $arr = ["(",")","-", " "];
            $fullname = $_POST["fullname"];
            $company = $_POST["fullname"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $person = $_POST["person"];
            $reason = $_POST["reason"];
            $token = md5($phone.$email);
            $phone2 = "90".str_replace($arr, "",$phone);
            
            if($person == 0){
                echo json_encode(["type"=>"warning","msg"=>"Görüşülecek kişi seçin"]);
            }elseif(empty($fullname) || empty($company) || empty($email) || empty($phone) || empty($reason)){
                echo json_encode(["type"=>"warning","msg"=>"Lütfen boş alan bırakmayın"]);
            }else{

                $insert = $db->insert("visitors",[
                        "full_name" => $fullname,
                        "email" => $email,
                        "phone" => $phone,
                        "phone_masked" => $phone2,
                        "company" => $company,
                        "person" => $person,
                        "reason" => $reason,
                        "imza" => null,
                        "resim" => null,
                        "token" => $token,
                        "status" => 1,
                        "created_at" => $dtime
                ]);

                if($insert){
                    $mail = new PHPMailer();

                    $mail->IsSMTP();
                    $mail->SMTPDebug = 1;
                    $mail->SMTPAuth = true;

                    $mail->Host = $config["smtp_host"];

                    $mail->Port = $config["smtp_port"];

                    $mail->Username = $config["smtp_user"];

                    $mail->Password = $config["smtp_password"];

                    $mail->SetFrom($mail->Username, $config["smtp_sender"]);

                    $mail->AddAddress($email, $fullname);

                    $mail->CharSet = 'UTF-8';

                    $mail->Subject = 'Ziyaretçi Kaydınız Oluşturuldu';
                    $url = $config["url"]."showVisit/".$token;
                    $mail->MsgHTML('Merhaba, <br><br>'.$config["project_name"].' için giriş kartınız oluşturuldu. Giriş yapabilmek için oluşturulan qr kodunu okutmanız gerekmektedir. qr kodunuza aşağıdaki bağlantıya tıklayarak dilediğiniz zaman görüntüleyebilirsiniz.<br><br>
                    <a href="'.$url.'" style="border-radius:4px;text-decoration:none;padding-bottom:30px;margin-bottom:20px;margin-top:20px;padding:20px;background:green;color:#fff;font-weight:bold">QR KODU GÖRÜNTÜLE</a>
                    ');

                    if($mail->Send()) {

                        echo json_encode(["type"=>"success","msg"=>"Giriş oluşturuldu","ok"=>false,"last_id"=>$insert]);

                    } else {
                        echo json_encode(["type"=>"warning","msg"=>$mail->ErrorInfo]);

                    }




                }else{
                    echo json_encode(["type"=>"warning","msg"=>"Sistem Hatası!"]);
                }

            }
            break;
    }
}