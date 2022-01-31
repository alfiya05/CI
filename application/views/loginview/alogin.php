<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin-Login</title>
</head>

<body>

    <div class="container-fluid bg-dark text-light" align="right">
        <div class="row py-3">
            <div class="col-sm-11">
                <h1>
                    <small> Not a user?</small><u> Register here</u>
                </h1>
            </div>
            <div class="col-sm-1">
                <a href="<?php echo base_url() . 'index.php/Authentication/Acontroller/aregister'; ?>" class="btn btn-primary">Register</a>
            </div>
        </div>
    </div>
    <hr>
    <h1>
        Login
    </h1>

    <?php if (!is_null($this->session->flashdata('failure'))) {
    ?>
        <div class="alert alert-danger"> <?php echo $this->session->flashdata('failure'); ?> </div>
    <?php
        $this->session->unset_userdata('failure');
    } ?>
    <?php if (!is_null($this->session->flashdata('success'))) { ?>
        <div class="alert alert-success"> <?php echo $this->session->flashdata('success'); ?> </div>
    <?php
        $this->session->unset_userdata('success');
    } ?>
    <div class="container">
        <form method="post" action='alogin'>
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
                        <input type="submit" value="Login" id="login_btn" class='btn btn-primary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php include "bs-script.php"; ?>

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
</body>

</html>