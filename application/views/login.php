<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title></title>
</head>
<body>
<?php echo validation_errors(); ?>
<?php echo form_open('login/formsubmit'); ?>
<table>
    <tr>
        <td>手机号码</td>
        <td><input type="text" name="phone"></td>
    </tr>
    <tr>
        <td>密码</td>
        <td><input type="password" name="password"></td>
    </tr>
    <tr>
        <td>
            <input type="submit" name="submit" value="login">
        </td>
        <td>
            <input type="submit" name="submit" value="register">
        </td>
    </tr>
</table>
</form>
</body>
</html>