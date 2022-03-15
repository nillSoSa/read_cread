<?php
$db= mysqli_connect("localhost", "root", "", "curd");
if($db){
  // echo 'database connection estabilshed!';
} else{
  echo 'database connect error!';
};

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD in PHP</title>
    <style>
      .card{
        width:100%;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>CURDin  PHP</h1>
      <div class="row">
        <div class="col-md-4 offset-2">
          <!-- form -->
          <form action="" method="POST">
            <div class="form-grup my-3">
              <input type="text" name="username" placeholder="Username" class="form-control" required>
            </div>  
            <div class="form-grup my-3">
              <input type="email" name="email" placeholder="email" class="form-control" required>
            </div>
            <div class="form-grup my-3">
              <input type="password" name="password" placeholder="password" class="form-control" required>
            </div>
            <div class="form-grup my-3">
              <input type="password" name="re_password" placeholder="confirm Passward" class="form-control" required>
            </div>
            <div class="form-grup my-3">
              <input type="submit" name="btn_click" value="submit" class="btn btn-primary">
            </div>
          </form>
              <?php
              
                if(isset($_POST['btn_click'])){
                  //echo "cina moktadir very happy person becuse he is lover man";
                  $username=$_POST['username'];
                  $email=$_POST['email'];
                  $password=$_POST['password'];
                  $re_password=$_POST['re_password'];
                  if($password){
                    $pass=sha1($password);
                  }
                  if($password==$re_password){
                    $query="INSERT INTO curdinfo (Username, Email, password) VALUES ('$username','$email', '$pass')";
                    $res1=mysqli_query($db,$query);
                    if($res1){
                      echo " data inserted !";
                    }else{
                      echo "data not inserted !";
                    }
                  }else{
                    echo '<span class="alert alert-danger">password does not match !</span>';
                  }
                }
              

              ?>
        </div>
        <div class="col-md-5">
          <!-- table -->
        <div class="card1">
          <h3>All Information</h3>
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">User Namet</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                </tr>
              </thead>
              <tbody>
              <?php
                        // setup 01 sql 
                        $sql ="SELECT * FROM curdinfo";
                      $res= mysqli_query($db, $sql);

                        while($row = mysqli_fetch_assoc($res)){
                          ?>
                          <tr>
                          <th scope="row"><?php  echo $row['id'];?></th>
                          <td><?php echo $row['Username'];?></td>
                          <td><?php echo $row['Email'];?></td>
                          <td><?php echo $row['password'];?></td>
                        </tr>
                        <?php

                          
                        }

                        ?>
                
              </tbody>
      </table>
        </div>
      </div>
    </div>

    
  </body>
</html>