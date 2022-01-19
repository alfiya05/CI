<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View</title>
</head>

<body>
    <div class="header">
        <h2>CRUD Records</h2>
    </div>
    <hr />
    <div class="nav">
        <a href="<?php echo base_url() . 'index.php/User/create'; ?>"> <button>Create</button></a>
    </div>
    <hr />
    <div class="message">
        <div class="success">
            <?php

            // $success = $this->session->flashdata('success');
            if ($this->session->tempdata('success')) {
                echo $_SESSION['success'];
                // $this->session->unset_tempdata('success');
            } ?>
        </div>
        <div class="failure">
            <?php

            // $failure = $this->session->flashdata('failure');
            if ($this->session->tempdata('failure')) {
                echo $_SESSION['failure'];
                // $this->session->unset_tempdata('failure');
            } ?>
        </div>

    </div>
    <div class="view">
        <table border="striped" align="center" width="70%">
            <?php if (isset($users)) { ?>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr>
                    <?php foreach ($users as $user) : ?>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['age']; ?></td>
                        <td align="center">
                            <a href="<?php echo base_url() . 'index.php/User/edit/' . $user['id']; ?>"><button id="edit-{$user['id']}">Edit</button></a>
                        </td>
                        <td align="center">
                            <a href="<?php echo base_url() . 'index.php/User/delete/' . $user['id']; ?>"><button id="delete-{$user['id']}">Delete</button></a>
                        </td>
                </tr>
        <?php endforeach;
                } ?>
        </table>
    </div>
</body>

</html>