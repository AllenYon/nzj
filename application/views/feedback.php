<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo base_url(); ?>">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="res/style.css">
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
    </script>
</head>
<body>

<img src="res/axiba2.png" style="width:20% ; margin: 10px"/>
<div>
    <?php echo form_open('feedback/feedback',array('onsubmit'=>'return validate_form(this)')) ?>
    <div>
        <label class="input_label float_left">建议：</label>
        <textarea type="text" name="content" value="" placeholder="" rows="2" ></textarea>
    </div>
    <div style="height: 10px"></div>
    <div class="center">
        <input class="btn_bi" type="submit" name="submit" value="发送">
    </div>
</div>
<?php echo form_close() ?>

</body>
</html>