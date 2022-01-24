<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Register</title>
</head>

<body>
    <div class="header" align="right">
        <h1>
            <small> Already a user?</small><u> Login here</u>
        </h1>
        <a href="<?php echo base_url() . 'index.php/authController/authlogin'; ?>"><button>Login</button></a>
    </div>
    <hr>
    <h1>
        Register
    </h1>

    <?php if ($this->session->tempdata('failure')) { ?>
        <div class="alert"> <?= $this->session->tempdata('failure') ?> </div>
    <?php } ?>
    <div class="container">
        <form method="post" action='authregister'>
            <table align="center" width="50%">

                <th><small>Enter the Details</small></th>
                <tr>
                    <td>First Name:</td>
                    <td>
                        <input type="text" name="first_name" id="first_name" placeholder="firstname">
                    </td>
                    <td>
                        <h5 id="f_check" style="color: red;">
                            **First Name is missing
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td>
                        <input type="text" name="last_name" id="last_name" placeholder="lastname">
                    </td>
                    <td>
                        <h5 id="l_check" style="color: red;">
                            **Last Name is missing
                        </h5>
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="user_name" id="user_name" placeholder="username">
                    </td>
                    <td>
                        <h5 id="u_check" style="color: red;">
                            **Username is missing
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="pass_word" id="pass_word" placeholder="password">
                    </td>
                    <td>
                        <h5 id="p_check" style="color: red;">
                            **Password is missing
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="cpassword" id="cpassword" placeholder="confirm password">
                    </td>
                    <td>
                        <h5 id="cp_check" style="color: red;">
                            **Password field doesn't match
                        </h5>
                        <h5 id="cpp_check" style="color: green;">
                            **Password matched
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Register" id="reg_btn">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        //    validating firstname
        $('#f_check').hide();
        let fError = true;
        $('#first_name').keyup(function() {
            fNameValidation();
        })

        function fNameValidation() {
            let $fVal = $('#first_name').val();
            if ($fVal.length == 0) {
                $('#f_check').show();
                fError = false;
                return false;
            } else {
                $('#f_check').hide();
                return true;
            }
        }

        //    validating lastname
        $('#l_check').hide();
        let lError = true;
        $('#last_name').keyup(function() {
            lNameValidation();
        })

        function lNameValidation() {
            let $lVal = $('#last_name').val();
            if ($lVal.length == 0) {
                $('#l_check').show();
                lError = false;
                return false;
            } else {
                $('#l_check').hide();
                return true;
            }
        }

        //    validating username
        $('#u_check').hide();
        let uError = true;
        $('#user_name').keyup(function() {
            userNameValidation();
        })

        function userNameValidation() {
            let $uVal = $('#username').val();
            if ($uVal.length == 0) {
                $('#u_check').show();
                uError = false;
                return false;
            } else {
                $('#u_check').hide();
                return true;
            }
        }

        //    validating password
        $('#p_check').hide();
        let pError = true;
        $('#pass_word').keyup(function() {
            passValidation();
        })

        function passValidation() {
            let $pVal = $('#pass_word').val();
            if ($pVal.length == 0) {
                $('#p_check').show();
                pError = false;
                return false;
            } else {
                $('#p_check').hide();
                return true;
            }
        }

        //    validating confirm password
        $('#cp_check').hide();
        $('#cpp_check').hide();
        let cpError = true;
        $('#cpassword').keyup(function() {
            cpassValidation();
        })

        function cpassValidation() {

            let $pVal = $('#pass_word').val();
            let $cpVal = $('#cpassword').val();
            if ($cpVal != $pVal) {
                $('#cp_check').show();
                pError = false;
                return false;
            } else {
                $('#cp_check').hide();
                $('#cpp_check').show();
                return true;
            }
        }

        $('#reg_btn').click(function() {
            userNameValidation();
            fNameValidation();
            lNameValidation();
            passValidation();
            cpassValidation();

            if ((uError == true) && (pError == true) && (fError == true) && (lError == true) && (cpError == true)) {
                return true;
            } else {
                return false;
            }
        })
    })
</script>

</html>