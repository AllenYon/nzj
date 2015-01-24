<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
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


<div style="align-content: center">
    <?php echo form_open('index/post') ?>
    <?php echo form_hidden('rand_name', $rand_name) ?><br>

    <p style="align-content: center;text-align: center">
    <span style="font-size: 18px;">
    <?php echo $rand_name ?><br>
    </span>
    <span style="font-size: 10px">
    系统为您随机生成的匿名
    </span>
    </p>

    <div style="align-content: center">
        <label >厂名：</label>
        <input type="text" name="company" value="@阿里" style="align">
    </div>
    <div>

        <label >年终奖：</label>
        <input type="text" name="amount" value="10k">
    </div>
    <div>
        <label>吐槽：</label>
        <input type="text" name="content" value="吐槽~~">
    </div>
    <input type="submit" name="submit" value="比一比" style="width: 70%; height:100px ">
</div>
<?php echo form_close() ?>
</form>
</p>
</div>

<p>
    <a href="<?php echo site_url('index/anymos') ?>">围观土豪</a>
</p>
</body>
</html>