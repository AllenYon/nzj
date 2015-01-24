<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>小饭桌列表</title>
    <style type="text/css">
        .action{
            margin-left: 10px;
            float: left;
            display:inline;
        }
    </style>
</head>
<body>


<?php echo form_open('activity/update')?>
<table>
    <tr>
        <th>id</th>
        <th>user_id</th>
        <th>username<th>
        <th>phone</th>
        <th>is_join</th>
    </tr>
    <?php foreach ($data->result() as $item): ?>
        <tr>
            <th><?php echo $item->id;?></th>
            <td><?php echo $item->user_id; ?></td>
            <td><?php echo $item->username; ?></td>
            <td><?php echo $item->phone; ?></td>
            <td><?php echo form_checkbox("is_join[]",$item->user_id,$item->is_join==0?false:true); ?></td>
        </tr>
    <?php endforeach; ?>
    <?php echo form_hidden('activity_id',$activity_id);?>
    <?php echo form_submit('submit','确认')?>
</table>
<?php echo form_close()?>


</body>
</html>