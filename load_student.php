<?php
require_once('classes/function.php');
require_once('classes/connect.php');
$order = $sonawap->query("SELECT * FROM students order by id DESC") or die($sonawap->error.__LINE__);
while($row = $order->fetch_assoc()) :?>
<tr>
    <td><?php echo $row['matric'] ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['department'] ?></td>
    <td><?php echo $row['year_enter'] ?></td>
    <td><?php echo $row['year_leave'] ?></td>
    <td><?php echo $row['dateposted'] ?></td>
    <td><a href="editStudent.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">Edit</a></td>
    <td><a href="delete.php?page=students&table=students&id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
</tr>
<?php endwhile ?>