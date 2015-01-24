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
<div class="rank">
    <p>您在全国年终奖排名<? echo $rank ?>位</p>

    <p>位列<? echo $rank_percent * 100 ?>%</p>

    <p>自己在自己公司的排名 击败了公司 <? echo $rank_percent_in_company * 100 ?>%的人</p>
</div>
<div class="line"></div>

<div>
    <p>自己公司排名Top10 详情数据</p>
    <?php foreach ($rank_in_company as $item): ?>
        <p><? echo $item->content ?></p>
    <?php endforeach; ?>
    </p>
</div>

<div class="line"></div>
<div>
    <p>自己公司在全部公司的排名的 详情数据</p>
</div>


<div class="line"></div>
<div>
    <p>转发并 热门吐槽</p>
    <?php foreach ($posts as $item): ?>
        <p><? echo $item->content ?></p>
    <?php endforeach; ?>
</div>

</body>
</html>