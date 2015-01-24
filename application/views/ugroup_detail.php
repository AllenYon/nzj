<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <!--    <title>小饭桌列表</title>-->
    <style type="text/css">
        .action {
            margin-left: 10px;
            float: left;
            display: inline;
        }
    </style>
</head>
<body>

<!--<h1>小饭桌列表</h1>-->
<p>
    <?php echo '用户名Id: ' . $this->session->userdata('user_id'); ?>
</p>

<p>
    <?php echo '用户名: ' . $this->session->userdata('username'); ?>
</p>

<p>
    <?php echo '手机号码: ' . $this->session->userdata('phone'); ?>
</p>


<p>
    <?php echo form_open('ugroup/addUser'); ?>
    <?php echo form_label('用户名'); ?>
    <?php echo form_input('username', ''); ?><br>
    <?php echo form_label('手机号码'); ?>
    <?php echo form_input('phone', ''); ?><br>
    <?php echo form_hidden('group_id', $group_id); ?>
    <?php echo form_submit('submit', '添加用户'); ?>
    </form>
</p>


<p>
    <?php echo form_open('ugroup/createActivity'); ?>
    <?php echo form_hidden('group_id', $group_id); ?>
    <?php echo form_submit('submit', '发起活动'); ?>
    </form>
</p>


<h2>组员</h2>

<table>
    <tr>
        <th>用户Id</th>
        <th>用户名</th>
        <th>手机号</th>
    </tr>
    <?php foreach ($user_group as $item): ?>
        <tr>
            <td><?php echo $item->user_id; ?></td>
            <td><?php echo $item->username; ?></td>
            <td><?php echo $item->phone; ?></td>
            <!--            <td >-->
            <!--                <div class="action">-->
            <!--                --><?php //echo form_open('ugroup/detail?group_id='.$item->id) ?>
            <!--                --><?php //echo form_submit('submit','查看')?>
            <!--                --><?php //echo form_close()?>
            <!--                </div>-->
            <!--                <div class="action">-->
            <!---->
            <!--                --><?php //echo form_open('ugroup/add') ?>
            <!--                --><?php //echo form_submit('submit','加入')?>
            <!--                --><?php //echo form_close()?>
            <!--                </div>-->
            <!--            </td>-->
        </tr>
    <?php endforeach; ?>
</table>


<h2>活动列表</h2>
<table>
    <tr>
        <th>ID</th>
        <th>状态</th>
        <th>活动金额</th>
        <th>操作</th>
    </tr>
    <?php foreach ($activity as $item): ?>
        <tr>
            <td><?php echo $item->id; ?></td>
            <td><?php echo $item->status == 0 ? '进行中' : '已结束'; ?></td>
            <td><?php echo $item->amount; ?></td>
            <td>
                <?php
                if ($item->status == 0) {
                    echo anchor('activity/finish/' . $item->id, '结束活动');
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>


</body>
</html>