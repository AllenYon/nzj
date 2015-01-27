<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo base_url(); ?>">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="res/style.css">
    <title>年终奖比一比</title>
    <style type="text/css">
        body {
            background: #2a211a;
        }

        .logo {
            color: #ffffff;
            font-size: 0.8em;
            margin-left: 8px;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .rank {
            background: rgba(255, 255, 255, 0.1);
            width: 85%;
            border: 0px;
            border-radius: 6px;
            padding: 10px;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .top10_user_in_company {

        }


    </style>
</head>
<body>

<span class="logo">阿西吧团队出品</span>

<?php if ($anymous == false): ?>
    <div class="rank">
        <p>您的年终奖击败了全国<?php echo $urank_in_all ?>的土豪~厉害厉害</p>
    </div>
    <div class="rank">
        <p>您的年终奖击败了公司<?php echo $urank_in_company ?>的土豪~继续加油</p>
    </div>
    <div class="line"></div>
    <div class="top10_user_in_company">
        <p><img src="res/moneybag.png" width="35px" height="30px" style="margin-left: 15px"/>公司排名Top10土豪</p>

        <?php $index = 0 ?>
        <?php foreach ($top10_user_in_company as $item): ?>
            <div style="background: #ffffff;height: 1px"></div>
            <?php $index++ ?>
            <p><span style="margin-left: 15px"><?php echo $index ?></span>
                <span><?php echo $item['rand_name'] ?></span>
                <span style="float: right;margin-right: 15px"><img src="res/coin" height="18px" width="18px" ><?php echo $item['amount'] ?></span>
            </p>
        <?php endforeach; ?>
        <div style="background: #ffffff;height: 1px"></div>
    </div>
<?php endif ?>

<div class="line"></div>
<div class="rank">
    <p>您的公司击败了全国<? echo $crank_in_all ?>的土豪公司~继续加油</p>
</div>
<div>
    <p><img src="res/moneybag.png" width="35px" height="30px" style="margin-left: 15px"/>土豪公司Top10</p>
    <?php $index = 0 ?>
    <?php foreach ($top10_company_in_all as $item): ?>
        <div style="background: #ffffff;height: 1px"></div>
        <?php $index++ ?>
            <p><span style="margin-left: 15px"><?php echo $index ?></span>
                <span><?php echo $item['company'] ?></span>
                <span style="float: right;margin-right: 15px"><img src="res/coin" height="18px" width="18px" ><?php echo $item['amount'] ?></span>
            </p>
    <?php endforeach; ?>
    <div style="background: #ffffff;height: 1px"></div>
</div>

<div class="line"></div>
<div>
    <p><img src="res/argue.png" width="35px" height="30px" style="margin-left: 15px"/>热门吐槽</p>
    <?php foreach ($posts as $item): ?>
        <div class="rank">
            <p><span><?php echo $item->rand_name?></span>
                <span>@<?php echo $item->company?>:</span>
                <span><? echo $item->content ?></span>
            </p>
            <div style="background: #ffffff;height: 1px"></div>
            <div style="float: right">
                <span>赞</span>
                <span>踩</span>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>