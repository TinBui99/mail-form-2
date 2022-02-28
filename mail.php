<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Mail from localhost | TrongTin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 mail-form">
            <h2 class="text-center">Send Message</h2>
            <p class="text-center">Send mail to anyone from localhost.</p>
            <!-- starting PHP codes-->
            <?php
                // if user click on send button
            if(isset($_POST['send'])){
                // getting all user entered data
                $recipient = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                $sender = "From: trongtin30899@gmail.com";
                // if user leave empty field among one of them
                if(empty($recipient) || empty($subject)  || empty($message)){
                    ?>
                <!--display an alert message if one of them is empty -->
                    <div class="alert alert-danger text-center">
                        <?="All input fields are requried!"?>
                    </div>
            <?php
                }
                else{
                    // PHP function to send email
                    if(mail($recipient, $subject, $message,$sender)){
                        ?>
                        <!--display a sucess message if once mail sent sucessfully-->
                        <div class="alert alert-success text-center">
                            <?= "Your mail is sent successfully to $recipient" ?>
                        </div>
                        <?php
                    }else{
                        ?>
                        <!--display a alert message if somehow mail can't be sent-->
                        <div class="alert alert-danger text-center">
                            <?= "Failed while sening your mail" ?>
                        </div>
                        <?php
                    }
                }
            }
            ?>
            <!-- ending PHP codes           -->
            <form action="mail.php" method="post" autocomplete="off">
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="Recipients">
                </div>
                <div class="form-group">
                    <input name="subject" type="text" class="form-control" placeholder="Subjects">
                </div>
                <div class="form-group">
                    <textarea name="message" cols="30" rows="10" class="form-control" placeholder="Compose message..."></textarea>
                </div>
                <div class="form-group">
                    <button name="send" type="submit" class="form-control button btn-primary" value="Send">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
