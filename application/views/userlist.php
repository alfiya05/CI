<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>

<body>
    <!-- user us the array of info from the database -->
    <?php if (isset($user)) {
    ?>
        <h2>User Details</h2>
        <small>From static data</small>
        <table border="bold">
            <tr>
                <td>Name</td>
                <td>Account</td>
            </tr>
            <tr>
                <!-- users is the array of info from static data -->
                <?php foreach ($users as $u) : ?>
                    <td><?php echo $u['Name']; ?></td>
                    <td><?php echo $u['Account']; ?></td>
            </tr>
        <?php endforeach; ?>
        </table>

        <br><br><br>
        <small>Data from database</small>
        <table border="BOLD">
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
            </tr>
            <tr>
                <?php foreach ($user as $n) : ?>
                    <td><?php echo $n['f_name']; ?></td>
                    <td><?php echo $n['l_name']; ?></td>
            </tr>
    <?php endforeach;
            } ?>
        </table>
</body>

</html>