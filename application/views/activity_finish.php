<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>小饭桌列表</title>
    <style type="text/css">
        .action {
            margin-left: 10px;
            float: left;
            display: inline;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
    <script type="text/javascript">
        function update(id, num) {
            var total_price = document.getElementById(id).value
            var aa_price = total_price / num
            var label_total_price = document.getElementById('label_total_price')
            label_total_price.innerText = aa_price
        }
        //        $(document).ready(function () {
        //            $("button").click(function () {
        ////                var total_price=$("#total_price").value;
        ////                alert("total ");
        //                $("button").hide();
        //            });
        //        };
        function ci(id) {
//            var amount = document.getElementById(id).value;
            var amount = document.getElementById("total_price").value;
            $.ajax({
                url: "<?php echo site_url('activity/finishConfirm');?>",
                data: { 'activity_id':<?php echo $activity_id?>, 'amount': amount},
                type: 'POST',
                dataType: 'json',
                success: function (json) {
                    if (json.code == 1001) {
                        var detail_url = '';
                        detail_url = "<?php echo site_url('/ugroup/detail');?>";
                        self.location = detail_url + "?group_id=" + json.rst.group_id;
                    } else {

                    }

                    alert("ok");
                },
                error: function () {
                    alert('There was a problem');
                    return false;
                }
            });

        }

    </script>
</head>
<body>

<p>
    <?php echo '活动人数: ' . $num_rows ?>
</p>

<p>
    每人活动金额:<label id="label_total_price">0</label>
</p>

<p>
    <label>总金额 :</label>
    <input name="total_price" id="total_price" onchange="update(this.id,<?php echo $num_rows ?>)">
</p>

<p>
    <button id="btn_confirm" type="button" value="确认" onclick="ci(this.id)">确认</button>
</p>


</body>
</html>