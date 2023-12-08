<?php
     $title = 'Success';
     require_once 'include/header.php';
     require_once 'db/conn.php';
     require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        //extract values from the $POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        $orig_file = $_FILES['avatar']['tmp_name'];
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file,$destination);

        //Call funtion to insert and track if success or not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty, $destination);
        $specialtyName = $crud->getSpecialtyById($specialty);

        if ($isSuccess) {
            SendEmail::SendMail($email,'Welcome to It Conference 2022','You have successfully registered for this year\'s IT Conference');
           // echo "<h1 class='text-success'>You Have Been Registered;</h1>";
           include 'include/successmessege.php';
            
        }
        else{
           // echo "<h1 class='text-danger'>You Have Been Not Registered;</h1>";
           include 'include/errormessege.php';
        }
    }
?>

<div class="img">
<img src="<?php echo $destination ?>">
</div>

<div class="card" style="width: 20rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $_POST['firstname'] ?>
            <?php " " ?> 
            <?php echo $_POST['lastname']; ?> 
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $specialtyName['name']; ?>
        </h6>
        <p class="card-text">
            Date of Birth: <?php echo $_POST['dob']; ?>
        </p>
        <p class="card-text">
            Email Address: <?php echo $_POST['email']; ?>
        </p>
        <p class="card-text">
            Contact Number: <?php echo $_POST['phone']; ?>
        </p>
    </div>
</div>

<?php require_once 'include/footer.php'; ?>