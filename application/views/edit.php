<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <table width="70%">
        <form method="post" class="edit_form" action="<?php echo base_url() . 'index.php/User/edit/' . $user['id']; ?>" align="center">

            <th>Update Details:</th>
            <tr>
                <td>

                    <label for="Name">Name:
                </td>
                <td>

                    <input type="text" name="name" id="name" value="<?php echo set_value('name', $user['name']); ?>">
                    </label>
                </td>
            </tr>

            <tr>
                <td>

                    <label for="Email">Email:
                </td>
                <td>

                    <input type="email" name="email" id="email" value="<?php echo set_value('email', $user['email']); ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td>

                    <label for="Age">Age:
                </td>
                <td>

                    <input type="number" name="age" id="age" value="<?php echo set_value('age', $user['age']); ?>"><br>
                    </label>
                </td>
            </tr>
            <tr float="right">
                <td>

                    <input type="submit" value="Update" id="save_btn">
                </td>
            </tr>
        </form>
    </table>

</body>

</html>