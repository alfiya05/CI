<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login</title>
</head>

<body>
    <div class="header">

    </div>
    <h1>
        Login
    </h1>

    <?php if ($this->session->tempdata('failure')) { ?>
        <div class="alert"> <?= $this->session->tempdata('failure') ?> </div>
    <?php } ?>
    <div class="container">
        <form method="post" action='login'>
            <table align="center" width="50%">
                <th>Login</th>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" id="username" placeholder="username">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" id="password" placeholder="password">
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

</html>