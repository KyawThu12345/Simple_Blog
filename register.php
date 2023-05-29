<?php
         include_once "views/top.php";
         include_once "views/nav.php";
         include_once "systemGeneration/membership.php";
         if(isset($_POST['submit'])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $ret = registerUser($username,$email,$password);
            $message =" ";
            switch($ret){
                case "Register Success":
                    $message = "Register Success";
                    setSession("username",$username);
                    setSession("email",$email);
                    if($username === "minkyawthu" && $email === "minkyawthu@gmail.com"){
                        header("Location: admin.php");
                    }else{
                        header("Location: index.php");
                    }
                    break;
                case "Email is already.":
                    $message = "Email is already in use!";
                    break;
                case "Register Fail":
                    $message = "Register Fail";
                    break;
                case "Fail":
                    $message = "Authentication Fail";
                    break;
                default: "unknown";
                break;
            }
            echo"<div class='container'></divcontainer><div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            " . $message . "
          </div></div>";
        }
        ?>
<div class="container my-3">
    <div class="col-md-8 offset-md-2 border border-primary py-5">
        <h2 class="text-center text-danger english">Register Form</h2>
         <form action="register.php" class="form col-md-10 offset-md-1 py-5" method="post">
            <div class="form-group">
                <label for="username" class="english mb-2">Username</label>
                <input type="text" class="form-control english rounded-0 mb-2" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="email" class="english mb-2">Email</label>
                <input type="email" class="form-control english rounded-0 mb-2" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password" class="english mb-2">Password</label>
                <input type="password" class="form-control english rounded-0 mb-2" name="password" id="password" placeholder="Password">
            </div>
            <p></p>
            <div class="rows d-flex justify-content-end">
                 <button class="btn btn-info text-white english mt-3" type="submit" value="submit" name="submit">Login</button>
            </div>
         </form>
    </div>
</div>
<?php
         include_once "views/footer.php";
         include_once "views/base.php";
?> 