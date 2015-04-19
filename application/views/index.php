<!DOCTYPE html>
<html>
<head>
    <title>Login/Registration</title>
   	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <style>
    td {
      padding-top: 10px;
      padding-right: 20px;
    }
    h5 {
      padding-left: 20px;
    }
    table {
      margin-top: 20px;
      margin-left: 20px;
    }
    .input {
      height: 30px;
      width: 250px;
    }
    #button {
      margin: 30px 0px 30px 303px;
    }
    #register {
      display: inline-block;
      border: 1px solid black;
      width: 500px;
    }
    #login {
      display: inline-block;
      border: 1px solid black;
      vertical-align: top;
    }
    .wrong {
      color: red;
      margin: 0 auto;
      font-style: italic;
      text-align: center;
    }
    </style>
</head>
<body>
	<div class="container">
		<h2>Welcome!</h2>
    <br>
			<div id="register">
				<h5>Register</h5>
				<form action="/main/register" method="post">
					<table>
						<tr>
              <td>Full Name:</td>
              <td><input type="text" class="input" name="name" required></td>
            </tr>
            <tr>
              <td>Alias:</td>
              <td><input type="text" class="input" name="alias" required></td>
            </tr>
						<tr>
							<td>Email:</td>
							<td><input type="email" class="input" name="email" required></td>
						</tr>
            <table>
  						<td><p>*Password should be at least 8 characters</p></td>
            </table>
            <table>
            <tr>
              <td>Password:</td>
              <td><input type="password" class="input" minlength="8" required title="*Password should be at least 8 characters" name="password" required></td>
            </tr>
							<td>Confirm PW:</td>
							<td><input type="password" class="input" minlength="8" required title="*Password should be at least 8 characters" name="confirm" required></td>
            <tr>
              <td>Date of Birth</td>
              <td><input type="date" class="input" name="birthdate" required></td>
            </tr>
					</table>
          <?php
              if($this->session->flashdata('reg_error')) {
                  $error=$this->session->flashdata('reg_error'); ?>
                  <p class="<?= $error['class'] ?>"> <?= $error['error'] ?></p>
          <?php }  ?>
				  <input type="submit" id="button" value="Register">
				</form>
  			</div>
  			<div id="login">
  				<h5>Login</h5>
  				<form action="/main/login" method="post">
					<table>
						<tr>
							<td>Email:</td>
							<td><input type="email" class="input" name="log_email" required></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" class="input" name="log_password" required></td>
						</tr>
					</table>
          <?php
              if($this->session->flashdata('error')) {
                  $message=$this->session->flashdata('error'); ?>
                  <p class="<?= $message['class'] ?>"> <?= $message['error'] ?></p>
          <?php }  ?>
          <input type="submit" id="button" value="Login">
        </form>
        </div>
  		</div>

</body>
</html>