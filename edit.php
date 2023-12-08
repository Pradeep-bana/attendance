<?php
     $title = 'Edit Record';
     require_once 'include/header.php';
     require_once 'include/auth_check.php';
     require_once 'db/conn.php';

     $results = $crud->getSpecialties();

     if (!isset($_GET['id'])) {
        //echo 'error';
        include 'include/errormessege.php';
        header("Location: viewrecords.php");
     } else {
         $id = $_GET['id'];
         $attendee = $crud->getAttendeeDetails($id);
  ?>

     <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
        <div class="form-group">
            <lable for="firstname">First Name</lable>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="form-group">
            <lable for="lastname">Last Name</lable>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
        </div>        
        <div class="form-group">
            <lable for="dob">Date Of Birth</lable>
            <input type="date" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob">
        </div>
        <div class="form-group">
             <lable for="specialty">Aria of Expertise</lable>
             <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialty_id'] ?>" <?php if ($r['specialty_id'] ==
                    $attendee['specialty_id']) echo 'selected' ?>>
                    <?php echo $r['name']; ?>
                </option>
                <?php }?>
             </select>
        </div>
        <div class="form-group">
            <lable for="email">Email address</lable>
            <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="email" name="email">
            <aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your
            email with anyone else.</small>
        </div>
        <div class="form-group">
            <lable for="phone">Contact Number</lable>
            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone">
            <aria-describedby="phoneHelp">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your
            number with anyone else.</small>
        </div>

        <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
            
    </form>
    <?php }?>

  <?php require_once 'include/footer.php'; ?>
         