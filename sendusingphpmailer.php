<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once 'phpmailer/src/Exception.php';
    require_once 'phpmailer/src/PHPMailer.php';
    require_once 'phpmailer/src/SMTP.php';

    if (isset($_POST["submit"])) {
        $mail = new PHPMailer(true);
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username= 'jacksonsankara@gmail.com';
        $mail->Password = 'ccuepqrkgbqpesfk';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('jacksonsankara@gmail.com');
        $email1 = "jacksonsankara@gmail.com";


        $mail->addAddress($email1);

        $mail->isHTML(true);


         // Define the CSS styles
        $css = "
          body {
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.6;
    color: #333;
}

h1 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f7f7f7;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.header {
    background-color: #28a745;
    color: white;
    text-align: center;
    padding: 10px;
    border-radius: 5px 5px 0 0;
}

.header p {
    color: white;
}

.content {
    padding: 20px;
}

.content p {
    margin-bottom: 20px;
}

.content ul {
    margin-bottom: 20px;
    list-style: none;
    padding-left: 0;
}

.content ul li {
    margin-bottom: 10px;
    font-weight: bold;
}

.footer {
    text-align: center;
    margin-top: 20px;
    color: #666;
}

        ";



        $html = "
          <html>
            <head>
              <style>$css</style>
            </head>
            <body>
              <div class='container'>
                <div class='header'>
                  <h1>New Message from Onnext Website</h1>
                  <p>Names: {$_POST['name']}</p>
                  <p>From: {$_POST['email']}</p>
                  <p>phone: {$_POST['phone']}</p>
                  <p>message: {$_POST['message']}</p>
                </div>
                <div class='content'>
                  
                  <p>Message :</p>
                  <p>{$_POST['message']}</p>
                </div>
                <div class='footer'>
                  <p>&copy; " . date("Y-m-d") . " Onnext Rwanda | All Rights Reserved</p>
                </div>
              </div>
            </body>
          </html>
        ";

        $mail->Subject = 'New Message from Onnext Website';
        $mail->Body = $html;

        $mail->send();
        
    }
?>
