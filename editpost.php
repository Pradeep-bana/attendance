<?php
require_once 'db/conn.php';
//Get values from post opration
if(isset($_POST['submit'])){
        //extract values from the $POST array
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        //call crud function
        $result = $crud->editAttendee($id,$fname, $lname, $dob, $email, $contact, $specialty);
        //Redirect to index.php
        if($result){
            header("Location: viewrecords.php");
        }else {
           // echo 'error';
           include 'include/errormessege.php';
           
        }
}
else {
   // echo 'error';
   include 'include/errormessege.php';
}
?>