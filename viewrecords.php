<?php
     $title = 'View Records';
     require_once 'include/header.php';
     require_once 'include/auth_check.php';
     require_once 'db/conn.php';

     //get all Attendees
     $results = $crud->getAttendees();
?>
    <table class="table">
       <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Specialty</th>
          <th>Actions</th>                
       </tr>
       <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
             <td><?php echo $r['attendee_id'] ?></td>
             <td><?php echo $r['firstname'] ?></td>
             <td><?php echo $r['lastname'] ?></td>           
             <td><?php echo $r['name'] ?></td>
             <td>
                <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure?');" 
                href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a>
               
               <img src="<?php echo empty($r['avatar_path']) ? "uploads/blank.png" : $r['avatar_path'] ?>" style="height:8vh; margin-left:50px; ">
         
            </td>
        </tr>
       <?php }?>

    </table>


<?php require_once 'include/footer.php'; ?>