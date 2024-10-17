<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EM SYSTEM | LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">
                    <h2>Welcome to</h2>
                    <p>Employee Management<br>System</p>
                </div>
            </div>

            <div class="col-right">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="" method="POST">
                        <p>
                            <label>Username<span>*</span></label>
                            <input type="text" class = "inputs" placeholder="Enter Your Username" minlength="1" maxlength="20" required>
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" class="inputs" id="password" placeholder="Enter Your Password" minlength= "1" maxlength="20" required>
                        </p>
                         <p>
                            <input type="checkbox" id="showPassword" onclick="showPass()"> Show Password
                        </p>
                            <label>Type<span>*</span></label>
                            <br>
                            <input type="radio" id="user" name="userType" value="User" required>
                            <label for="user">User</label>
                            <input type="radio" id="employee" name="userType" value="Employee" required>
                            <label for="employee">Employee</label>
                        <p>   
                            <input type="submit" value="Log In">
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

<script>
        function showPass() {
            var password = document.getElementById("password");
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>
</html>