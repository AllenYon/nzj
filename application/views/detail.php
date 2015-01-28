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
            padding: 0px;
            margin: 0px;
        }

        .logo {
            color: #ffffff;
            font-size: 0.8em;
            /*margin-left: 8px;*/
            /*margin-top: 10px;*/
            /*margin-bottom: 5px;*/
            margin: 10px;
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

        .comment {
            background: rgba(255, 255, 255, 0.1);
            width: 85%;
            height: auto;
            border: 0px;
            border-radius: 6px;
            padding-top: 10px;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .top10_user_in_company {

        }

        .talk_right {
            width: 144px;
            height: 110px;
            background: url("res/talk_right.png") no-repeat;
            background-size: 50%;
            float: right;
            position: absolute;
        }

        .top1 {
            width: 35px;
            height: 27px;
            background: url("res/top1.png") no-repeat;
            background-size: 35px;
            line-height: 35px;
            text-align: center;
            margin-left: 15px;
            display: inline-block;
        }

        .top2 {
            width: 35px;
            height: 27px;
            background: url("res/top2.png") no-repeat;
            background-size: 35px;
            line-height: 35px;
            text-align: center;
            margin-left: 15px;
            display: inline-block;
        }

        .top3 {
            width: 35px;
            height: 27px;
            background: url("res/top3.png") no-repeat;
            background-size: 35px;
            line-height: 35px;
            text-align: center;
            margin-left: 15px;
            display: inline-block;
        }

        .other {
            background: rgba(255, 255, 255, 0.1);
            width: 30px;
            height: 30px;
            background-size: 30px;
            border-radius: 15px;
            line-height: 30px;
            text-align: center;
            margin-left: 15px;
            display: inline-block;
        }

        a img {
            border: none
        }

        .middle * {
            vertical-align: middle;
        }


    </style>
</head>
<body>

<p class="logo">阿西吧团队出品</p>

<?php if ($anymous == false): ?>
    <div class="rank">
        <p style="text-align: center; ">您的年终奖击败了<span style="color: #e46d05">全国</span><br><br>
            <span style="color: #ffa200;font-size: 3em"><?php echo $urank_in_all ?></span>的土豪</p>
        <br>
        <br>
    </div>
    <div style="text-align: center;margin-left: auto;margin-right: auto;margin-top: -49px">
        <img src="res/money.png" width="134px" height="82px"
             style="text-align: center;margin-left: auto;margin-right: auto">
    </div>
    <div style="clear:both"></div>
    <div class="rank">
        <p style="text-align: center; ">您的年终奖击败了<span style="color: #e46d05">公司里</span><br><br>
            <span style="color: #ffa200;font-size: 3em"><?php echo $urank_in_company ?></span>的土豪</p>
        <br>
        <br>
    </div>
    <div style="text-align: center;margin-left: auto;margin-right: auto;margin-top: -49px">
        <img src="res/manshead.png" width="80px" height="100px"
             style="text-align: center;margin-left: auto;margin-right: auto">
    </div>
    <div class="line"></div>
    <div class="top10_user_in_company">
        <p class="middle"><img src="res/moneybag.png" width="35px" height="30px"
                               style="margin-left: 15px;margin-right: 4px"/>公司排名Top10土豪</p>

        <?php $index = 0 ?>
        <?php foreach ($top10_user_in_company as $item): ?>
            <div style="background: #ffffff;height: 1px"></div>
            <?php $index++ ?>
            <p>
                <?php if ($index == 1): ?>
                    <span class="top1"><?php echo $index ?></span>
                <?php elseif ($index == 2): ?>
                    <span class="top2"><?php echo $index ?></span>
                <?php
                elseif ($index == 3): ?>
                    <span class="top3"><?php echo $index ?></span>
                <?php
                else: ?>
                    <span class="other"><?php echo $index ?></span>
                <?php endif ?>

                <span><?php echo $item['rand_name'] ?></span>
                <span style="float: right;margin-right: 15px"><img src="res/coin.png" height="18px"
                                                                   width="18px"
                                                                   style="margin-right: 5px"><?php echo $item['amount'] ?></span>
            </p>
        <?php endforeach; ?>
        <div style="background: #ffffff;height: 1px"></div>
    </div>
<?php endif ?>

<div class="line"></div>
<div class="rank">
    <p style="text-align: center; ">您的公司击败了<span style="color: #e46d05">全国</span><br><br>
        <span style="color: #ffa200;font-size: 3em"><?php echo $urank_in_company ?></span>的土豪公司</p>
</div>
<div>
    <p class="middle"><img src="res/moneybag.png" width="35px" height="30px"
                           style="margin-left: 15px; margin-right: 4px"/>土豪公司Top10</p>
    <?php $index = 0 ?>
    <?php foreach ($top10_company_in_all as $item): ?>
        <div style="background: #ffffff;height: 1px"></div>
        <?php $index++ ?>
        <p>
            <?php if ($index == 1): ?>
                <span class="top1"><?php echo $index ?></span>
            <?php elseif ($index == 2): ?>
                <span class="top2"><?php echo $index ?></span>
            <?php
            elseif ($index == 3): ?>
                <span class="top3"><?php echo $index ?></span>
            <?php
            else: ?>
                <span class="other"><?php echo $index ?></span>
            <?php endif ?>
            <span><?php echo $item['company'] ?></span>
            <span style="float: right;margin-right: 15px"><img src="res/coin.png" height="18px"
                                                               width="18px"
                                                               style="margin-right: 5px"><?php echo $item['amount'] ?></span>
        </p>
    <?php endforeach; ?>
    <div style="background: #ffffff;height: 1px"></div>
</div>

<div class="line"></div>
<div>
    <p class="middle"><img src="res/argue.png" width="41px" height="25px" style="margin-left: 15px;margin-right: 3px"/>热门吐槽
    </p>
    <?php foreach ($posts as $item): ?>
        <div class="comment">
            <span><?php echo $item->rand_name ?></span>
            <span style="color: #ffa300">@<?php echo $item->company ?>:</span>
            <span><?php echo $item->content ?></span>
            <div style="background: #ffffff;height: 1px;margin-bottom: 10px;margin-top: 10px"></div>
            <div style="float: right">
                <a class="middle"><img src="res/zan_01.png" width="18px" height="17px"
                                       style="margin-left: 15px; margin-right: 4px"/>赞 2</a>
                <a class="middle"><img src="res/cai_01.png" width="18px" height="17px"
                                       style="margin-left: 15px; margin-right: 4px"/>踩 1</a>
            </div>
            <div style="clear: both">
                </div>
        </div>
    <?php endforeach; ?>
</div>

<div style="text-align: center;margin-top: 40px;margin-bottom: 100px"
    >

<a style="color: #ffffff;font-size: 1em; text-decoration: underline">分享给更多朋友 让数据更真实</a>
</div>

</body>
</html>