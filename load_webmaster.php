<?php
require_once('classes/function.php');
require_once('classes/connect.php');
$order = $sonawap->query("SELECT * FROM webmasters order by id DESC") or die($sonawap->error.__LINE__);
while($row = $order->fetch_assoc()) :?>
<tr>
    <td><?php echo $row['staff_id'] ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['department'] ?></td>
    <td><?php echo $row['role'] ?></td>
    <td><?php echo $row['dateposted'] ?></td>
    <td><a href="editWebmaster.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">Edit</a></td>
    <td><a href="delete.php?page=webmaster&table=webmasters&id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
</tr>
<?php endwhile ?>