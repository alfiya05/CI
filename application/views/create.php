<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="header">

        <h2>Create Record</h2>
    </div>
    <hr>
    <table width="70%">
        <form method="post" class="create_form" align="center">

            <th>Enter Details:</th>
            <tr>
                <td>

                    <label for="Name">Name:
                </td>
                <td>

                    <input type="text" name="name" id="name" required>
                    </label>
                </td>
            </tr>

            <tr>
                <td>

                    <label for="Email">Email:
                </td>
                <td>

                    <input type="email" name="email" id="email" required>
                    </label>
                </td>
            </tr>
            <tr>
                <td>

                    <label for="Age">Age:
                </td>
                <td>

                    <input type="number" name="age" id="age" required><br>
                    </label>
                </td>
            </tr>
            <tr float="right">
                <td>

                    <input type="submit" value="Save" id="save_btn">
                </td>
            </tr>
    </table>
    </form>
</body>

</html>