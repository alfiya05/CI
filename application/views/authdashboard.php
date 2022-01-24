<!DOCTYPE html>
<html lang="en">

<head>

    <title>Dashboard</title>
</head>

<body>


    <div class="header">
        <tr>
            <h1><a href="<?php echo base_url() . 'index.php/authController/authdashboard'; ?>"> <button>Home</button></a>

                <a href="<?php echo base_url() . 'index.php/authController/authlogout'; ?>"> <button>Logout</button></a>
            </h1>
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