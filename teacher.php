<?php 
    include "index.php";
?>

<?php include "classes/teacher.php"?>


<div class="container" style="margin-top:40px ;">

<?php $teacher = new Teacher;

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $teacher->setName($name);
    $teacher->setEmail($email);
    $teacher->setPhone($phone);
    $teacher->setAddresss($address);
 

    if($teacher->insert()){
        echo "<span style='color:green'>Data Inserted Successfully.....</span>";
    }
}

if(isset($_POST['update'])){

    $id  = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $teacher->setName($name);
    $teacher->setEmail($email);
    $teacher->setPhone($phone);
    $teacher->setAddresss($address);

    if($teacher->update($id)){

        echo "<span style='color:green'>Data Updated Successfully.....</span>";

    }
}

?>

<?php 
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $id = (int)$_GET['id'];
        if($teacher->delete($id)){
            echo "<span style='color:green'>Data Deleted Successfully.....</span>";

        }
    }

?>
    <div class="row">
        <div class="col-md-4">
        <?php 
            if(isset($_GET['action']) && $_GET['action'] == 'update'){
                $id = (int)$_GET['id'];
                $result  = $teacher->editById($id);
            
        ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="hidden" name="id" value="<?php echo $result[0]['id']?>" class="form-control">
                    <input type="text" name="name" value="<?php echo $result[0]['name']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" value="<?php echo $result[0]['email']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" value="<?php echo $result[0]['phone']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" value="<?php echo $result[0]['address']?>" class="form-control">
                </div>
               
                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-info btn-sm">Update</button>
                </div>
            </form>
       <?php } else{?>  
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
                
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-info btn-sm">Save</button>
                </div>
            </form>
       <?php }?>   
        </div>
        <div class="col-md-8">
                <p>
                    <a href="studen.php">Student</a> ||
                    <a href="teacher.php">Teacher</a>
                </p>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                   
                foreach($teacher->readAll() as $key => $value) {?>
                    <tr>
                    <th scope="row"><?php echo $key + 1;?></th>
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['email'];?></td>
                    <td><?php echo $value['phone'];?></td>
                    <td><?php echo $value['address'];?></td>
                    
                    <td>
                        <?php echo "<a href='teacher.php?action=update&id=".$value['id']."'>Edit</a>" ?> ||
                        <?php echo "<a href='teacher.php?action=delete&id=".$value['id']."' onClick='return confirm(\"Are you sure yor went to delete data..\")' >Delete</a>" ?>
                    </td>
                    </tr>
                <?php }?>   
                </tbody>
            </table>
        </div>
    </div>

</div>