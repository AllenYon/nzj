<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>年终奖比一比</title>
    <style type="text/css">
        .action {
            margin-left: 10px;
            float: left;
            display: inline;
        }

        .rank {
            background: rgba(55, 55, 55, 1);
            width: 100%;
            height: 100%;
            color: #ffffff;
        }

        a {
            color: #ffffff;

        }

        body {
            background: rgba(55, 55, 55, 1);
            width: 100%;
            height: 100%;
            color: #ffffff;

        }
    </style>
</head>
<body>
<p>
    匿名保密发表您的信息
</p>

<p>
    例子：<br>
    阿汤哥：@阿里 30k 3个月年终，敢不敢和我比一比？
</p>

<p>
    <?php echo form_open('index/post') ?>
    <?php echo form_hidden('rand_name', $rand_name) ?>
    <?php echo $rand_name ?>
    <input type="text" name="content" value="@">
    <br>
    <input type="submit" name="submit" value="比一比">
    <?php echo form_close() ?>
    </form>
</p>

<p>

    <a href="<?php echo site_url('index/anymos') ?>">围观土豪</a>
</p>
</body>
</html>