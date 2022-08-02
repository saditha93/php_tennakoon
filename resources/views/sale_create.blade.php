<html>
<head>
    <title>Student Management | Add</title>
</head>

<body>
<form action="/create" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <table>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name'/></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type='text' name='email'/></td>
        </tr>
        <tr>
            <td>Telephone</td>
            <td><input type='text' name='telephone'/></td>
        </tr>
        <tr>
            <td>Current Route</td>
            <td><input type='text' name='route'/></td>
        </tr>
        <tr>
            <td>Comment</td>
            <td><input type='text' name='comment'/></td>
        </tr>
        <tr>
            <td colspan='2'>
                <input type='submit' value="Save"/>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
