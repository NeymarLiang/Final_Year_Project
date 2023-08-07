<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style type="text/css">
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #241d33;
    }

    .form{
      --angle: 0deg;
      padding: 15px;
      border: 1vmin solid;
      border-image: conic-gradient(from var(--angle), red, yellow, lime, aqua, blue, magenta, red) 1;
      animation: 10s rotate linear infinite;
      width: 250px;
      height: auto;
      border-radius: 5px;
      color: white;
    }

    @keyframes rotate {
      to {
        --angle: 360deg;
      }
    }

    @property --angle {
      syntax: '<angle>';
      initial-value: 0deg;
      inherits: false;
    }

    .username{
      border-radius: 5px;
      padding: 5px;
    }
  </style>
</head>
<body>
  <?php
  session_start();
  include 'fypDatabase.php';

  if (isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
      echo '<script>alert("Fill in the Blank")</script>';
    } else {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM account WHERE UserName ='$username' AND Password ='$password'";
      $result = mysqli_query($mysqli, $sql);

      if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin'] = $username;
        header('location: fypAdminSalesRecord.php');
        exit;
      } else {
        echo "<script>alert('Invalid username or password')</script>";
      }
    }
  }
  ?>
  <center>
    <div class="form">
      <h1 style="margin: 0px;margin-bottom: 10px;font-family: Arial;color: white;">Admin Login</h1>
      <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required class="username"><br>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required class="username"><br>
        <br>
        <input type="submit" name="login" value="Login">
      </form>
    </div>
  </center>

</body>
</html>
