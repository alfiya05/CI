<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Dashboard</title>
</head>

<body>


    <div class="container-fluid bg-dark text-light py3">
        <div class="row bg-grey justify-content-between py-3 ">
            <div class=" col-sm-11">
                <a href="<?php echo base_url() . 'index.php/Authentication/Acontroller/home'; ?>" class='btn btn-primary'>Home </a>

                <a href="<?php echo base_url() . 'index.php/Authentication/Acontroller/adashboard'; ?>" class='btn btn-primary'>Account</a>
            </div>
            <div class="col-sm-1 ">
                <a href=" <?php echo base_url() . 'index.php/Authentication/Acontroller/alogout'; ?>" class='btn btn-danger '>Logout</a>
            </div>
            <hr>


        </div>
    </div>
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <ul class="list-group-flush">
                        <li class="list-group-item">
                            <a href="<?php echo base_url() . 'index.php/Authentication/Acontroller/home'; ?>">Home </a>
                        </li>

                        <li class="list-group-item">
                            <a href="<?php echo base_url() . 'index.php/Authentication/Acontroller/adashboard'; ?>">Account</a>
                        </li>

                    </ul>

                </div>

                <div class="col-sm-5">


                    <table class="table" width="50%">
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
            </div>
        </div>

    </div>

</body>

</html>