<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo base_url(); ?>">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="res/style.css">
    <link rel="shortcut icon" href="res/favicon.ico" type="image/x-icon">
    <script src="res/baidu.js" type="text/javascript"></script>
    <title>年终奖比一比</title>
    <script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        });
        function validate_required(field,alerttxt) {
            with (field) {
                if (value == null || value == "") {
                    $("#message").show().html(alerttxt);
                    return false
                }
                else {
                    return true
                }
            }
        }

        function validate_form(thisform) {
            with (thisform) {
                if (validate_required(company, "请输入厂名~") == false) {
                    company.focus();
                    return false
                }
                else if (validate_required(amount, "请输入年终奖~") == false) {
                    amount.focus();
                    return false
                }
                else if(amount.value>9999999999){
                    $("#message").show().html('您的年终奖...太夸张了...');
                    return false
                }
                else if(isNaN(amount.value)){
                    $("#message").show().html("年终奖只能是数字哦");
                    return false
                }
            }
        }
    </script>
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
    <?php echo form_open('index/post',array('onsubmit'=>'return validate_form(this)')) ?>
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
    <div style="height: 5px"></div>
    <div class="center">
        <span id="message" hidden="true" style="font-size: 0.9em;color: #FF4834"></span>
    </div>
    <div style="height: 5px"></div>

    <div class="center">
        <input class="btn_bi" type="submit" name="submit" value="比一比">
    </div>
</div>
<?php echo form_close() ?>

<div style="height: 10px"></div>
<!--<div class="center">-->
<!--    <a style="font-size: 1.2em;color: #945000 " href="--><?php //echo site_url('index/anymous') ?><!--">围观土豪</a>-->
<!--</div>-->

</body>
</html>