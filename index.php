
<!DOCTYPE html>
<html>
    <head>
        <title>Contact Form</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body{
                margin: 20px 0;
                background: #ccc;
            }

            form{
                background: #fff;
                padding: 25px;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <form action="" method="POST">
                        <h3>Contact form</h3>
                        <div class="form-group">
                            <input type="text" name="name" id="name"  class="form-control" placeholder="name..">
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" maxlength="255" class="form-control" placeholder="Email..">
                        </div>
						
						 <div class="form-group">
                            <input type="text" name="subject" id="subject"  class="form-control" placeholder="subject..">
                        </div>

                        <div class="form-group">
                            <textarea type="text" cols="30" rows="8" name="msg" id="msg" placeholder="Your question" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="sendmail"> send</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

    </body>
</html>


<?php
require 'vendor/autoload.php';
$API_KEY="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";
if(isset($_POST['sendmail']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['msg'];
	
	
	$email = new \SendGrid\Mail\Mail();
$email->setFrom("khaled.vertix@gmail.com", "Example User");
$email->setSubject($subject);
$email->addTo($email, $name);
$email->addContent("text/plain", $message);
//$email->addContent(
  //  "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
//);

$sendgrid = new \SendGrid($API_KEY);


if($sendgrid->send($email)){
	
	echo"email sent succefully";
}

}

?>