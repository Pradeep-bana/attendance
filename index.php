  <?php
     $title = 'Index';
     require_once 'include/header.php';
     require_once 'db/conn.php';

     $results = $crud->getSpecialties();
  ?>

     <h1 class="text-center" style="color: white;">MADHAV SCIENCE COLLEGE</h1>

    <form method="post" action="success.php" enctype="multipart/form-data">
        <div class="form-group">
            <lable for="firstname">First Name</lable>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="form-group">
            <lable for="lastname">Last Name</lable>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>        
        <div class="form-group">
            <lable for="dob">Date Of Birth</lable>
            <input required  type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="form-group">
             <lable for="specialty">Aria of Expertise</lable>
             <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialty_id'] ?>">
                         <?php echo $r['name']; ?>
                    </option>
                <?php }?>
             </select>
        </div>
        <div class="form-group">
            <lable for="email">Email address</lable>
            <input required type="email" class="form-control" id="email" name="email">
            <aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your
            email with anyone else.</small>
        </div>
        <div class="form-group">
            <lable for="phone">Contact Number</lable>
            <input required type="text" class="form-control" id="phone" name="phone">
            <aria-describedby="phoneHelp">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your
            number with anyone else.</small>
        </div>
        <div>
        <input type="file" name="avatar" accept="image/*">
        <small class="form-text text-danger">File Upload is Optional</small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </form>

  <?php require_once 'include/footer.php'; ?>
         