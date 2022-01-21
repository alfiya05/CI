<!DOCTYPE html>
<html lang="en">

<head>

    <title>Dashboard</title>
</head>

<body>


    <div class="header">
        <tr>
            <a href="<?php echo base_url() . 'index.php/loginController/dashboard'; ?>"> <button>Home</button></a>
            <hr>
            <a href="<?php echo base_url() . 'index.php/loginController/logout'; ?>"> <button>Logout</button></a>
            <hr>

        </tr>
    </div>
    <div class="main">
        <table>
            <th>User</th>

            <tr>
                <td>Name</td>
                <td><?php echo $user['firstname'] . " " . $user['lastname']; ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $user['username']; ?></td>
            </tr>

        </table>
    </div>

</body>

</html>