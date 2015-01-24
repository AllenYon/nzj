<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<table>
    <?php foreach ($query as $item): ?>
        <tr>
            <td><?php echo $item->customerid; ?></td>
            <td><?php echo $item->name; ?></td>
            <td><?php echo $item->address; ?></td>
            <td><?php echo $item->city; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>