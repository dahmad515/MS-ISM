<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<div class="container">
  
  <div class="row">
    <div class="col-md-8 offset-md-2 shadow p-5 my-5">
      <form id="contact-form" method="post" action="" role="form">
        <h2 class="">Contact Now</h2>
        <div class="controls">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="form_name">Firstname *</label>
                <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="form_lastname">Lastname *</label>
                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="form_email">Email *</label>
                <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="form_phone">Phone *</label>
                <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your Phone *">
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="form_message">Message *</label>
                <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required data-error="Please,leave us a message."></textarea>
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-md-12">
              <input type="submit" name="submit" class="btn btn-primary btn-send" value="Send message">
            </div>
          </div>
          
        </div>
      </form>
    </div>
  </div>
</div>
  <?php
  if (isset($_POST['submit'])) {
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$messagebox = $_POST['message'];
$to = "danishiqbal66666@gmail.com";
$subject = "Book Shop Contact Form";

$message = "
<html>
<head>
<title>Book Shop Contact Form</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Phone</th>
<th>message</th>
</tr>
<tr>
<td>".$name."</td>
<td>".$surname."</td>
<td>".$email."</td>
<td>".$phone."</td>
<td>".$messagebox."</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$email.'>' . "\r\n";

mail($to,$subject,$message,$headers);
  }
?>
<?php include 'footer.php'?>
