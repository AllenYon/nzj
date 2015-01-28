<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo base_url(); ?>">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="res/style.css">
    <title>年终奖比一比</title>
</head>
<body>
<img src="res/axiba2.png" style="width:20% ; margin: 10px"/>
<div class="center">
    <span style="color: #333333">系统为您随机生成的匿名身份是</span>
</div>
<div class="center">
    <a class="head"><?php echo $rand_name ?></a>

</div>

<div>
    <?php echo form_open('index/post') ?>
    <?php echo form_hidden('rand_name', $rand_name) ?><br>

    <div>
        <label class="input_label">厂名：</label>
        <input type="text" name="company" value="" placeholder="例：阿里巴巴"  style="width: 60%">
    </div>
    <div style="height: 15px"></div>
    <div>
        <label class="input_label">年终奖：</label>
        <input type="text" name="amount" value="" placeholder="例：50000"   style="width: 55%">
        <label>元</label>
    </div>
    <div style="height: 15px"></div>
    <div>
        <label class="input_label float_left">吐槽：</label>
        <textarea type="text" name="content" value="" placeholder="例：我要吐槽老板" rows="2" ></textarea>
    </div>
    <div style="height: 15px"></div>
    <div class="center">
        <input class="btn_bi" type="submit" name="submit" value="比一比">
    </div>
</div>
<?php echo form_close() ?>

<div style="height: 10px"></div>
<div class="center">
    <a style="font-size: 1.2em;color: #945000 " href="<?php echo site_url('index/anymous') ?>">围观土豪</a>
</div>
</body>
</html>