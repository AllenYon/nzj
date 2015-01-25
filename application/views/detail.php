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

        .line {
            background: #ffffff;
            width: 100%;
            height: 1px;
        }
        a{

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
<!--
 'anymous' => false,
            'urank_in_all' => '80%',// 用户在全国排名 百分比
            'urank_in_company' => '12%',//用户在公司排名 百分比
            'top10_user_in_company' => $top10_user_in_company,
            'crank_in_all' => '49%', //公司在全国排名 百分比
            'top10_company_in_all' => $top10_company_in_all,
            'posts' => $posts,
            -->
<?php if($anymous==false):?>
<div class="rank">
    <p>您的年终奖在全国击败了<?php echo $urank_in_all ?>的土豪~厉害厉害</p>
    <p>击败了公司里 <?php echo $urank_in_company?>的土豪~继续加油</p>
</div>
<div class="line"></div>
<div>
    <p>公司排名Top10土豪</p>
    <?php foreach ($top10_user_in_company as $item): ?>
        <p><?php echo $item->content ?></p>
    <?php endforeach; ?>
    </p>
</div>
<?php endif?>

<div class="line"></div>
<div>
    <p>您的公司击败了全国<? echo $crank_in_all?>的土豪公司~继续加油</p>
    <p>全国Top10公司:</p>
    <?php foreach ($top10_company_in_all as $item): ?>
        <p><?php echo $item->content ?></p>
    <?php endforeach; ?>
</div>

<div class="line"></div>
<div>
    <p>转发并 热门吐槽</p>
    <?php foreach ($posts as $item): ?>
        <p><? echo $item->content ?><input ></p>
    <?php endforeach; ?>
</div>

</body>
</html>