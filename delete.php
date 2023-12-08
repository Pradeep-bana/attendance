<?php
    require_once 'include/auth_check.php';
    require_once 'db/conn.php';
    if (!$_GET['id']) {
      // echo 'error';
      include 'include/errormessege.php';
      header ('Location: viewrecords.php');
    }else {
        //Get ID values
        $id = $_GET['id'];

        //call Delete function
        $result = $crud->deleteAttendee($id);

        //Redirect to list
        if ($result) {
            header ('Location: viewrecords.php');
        }else {
            //echo 'error';
            include 'include/errormessege.php';
        }
    }
?>