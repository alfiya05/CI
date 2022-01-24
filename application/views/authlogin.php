<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login</title>
</head>

<body>
    <div class="header" align="right">
        <h1>
            <small> Not a user?</small><u> Register here</u>
        </h1>
        <a href="<?php echo base_url() . 'index.php/authController/authregister'; ?>"><button>Register</button></a>
    </div>
    <hr>
    <h1>
        Login
    </h1>

    <?php if ($this->session->tempdata('failure')) { ?>
        <div class="alert"> <?= $this->session->tempdata('failure') ?> </div>
    <?php }  ?>
    <?php if ($this->session->tempdata('success')) { ?>
        <div class="alert"> <?= $this->session->tempdata('success') ?> </div>
    <?php }  ?>
    <div class="container">
        <form method="post" action='authlogin'>
            <table align="center" width="50%">
                <th>Login</th>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" id="username" placeholder="username">
                    </td>
                    <td>
                        <h5 id="ucheck" style="color: red;">
                            **Userame is missing
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" id="password" placeholder="password">
                    </td>
                    <td>
                        <h5 id="pcheck" style="color: red;">
                            **Password is missing
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Login" id="login_btn">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        //    validating username
        $('#ucheck').hide();
        let uError = true;
        $('#username').keyup(function() {
            userNameValidation();
        })

        function userNameValidation() {
            let $uVal = $('#username').val();
            if ($uVal.length == 0) {
                $('#ucheck').show();
                uError = false;
                return false;
            } else {
                $('#ucheck').hide();
                return true;
            }
        }

        //    validating password
        $('#pcheck').hide();
        let pError = true;
        $('#password').keyup(function() {
            passValidation();
        })

        function passValidation() {
            let $pVal = $('#password').val();
            if ($pVal.length == 0) {
                $('#pcheck').show();
                pError = false;
                return false;
            } else {
                $('#pcheck').hide();
                return true;
            }
        }


        $('#login_btn').click(function() {
            userNameValidation();
            passValidation();

            if ((uError == true) && (pError == true)) {
                return true;
            } else {
                return false;
            }
        })
    })
</script>

</html>