<?php
     $title = 'View Record';
     require_once 'include/header.php';
     require_once 'include/auth_check.php';
     require_once 'db/conn.php';

     //get Attendee by Id
     if(!isset($_GET['id'])){
           //echo "<h1 class='text-danger'>Please check details and try again</h1>";
           include 'include/errormessege.php';
     }else {
           $id = $_GET['id'];
           $result = $crud->getAttendeeDetails($id);
     
?>

<div class="img">
<img src="<?php echo empty($result['avatar_path']) ? "uploads/blank.png" : $result['avatar_path']; ?>">
</div>
<div class="card" style="width: 20rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $result['firstname'] ?>
            <?php " " ?> 
            <?php echo $result['lastname']; ?> 
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $result['name']; ?>
        </h6>
        <p class="card-text">
            Date of Birth: <?php echo $result['dateofbirth']; ?>
        </p>
        <p class="card-text">
            Email Address: <?php echo $result['emailaddress']; ?>
        </p>
        <p class="card-text">
            Contact Number: <?php echo $result['contactnumber']; ?>
        </p>
    </div>
</div>
        <br/>
        <a href="viewrecords.php" class="btn btn-primary">Back to List</a>
        <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are you sure?');" 
         href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
<?php } ?>


<?php require_once 'include/footer.php'; ?>