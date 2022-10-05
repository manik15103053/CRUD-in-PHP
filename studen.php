<?php 
    include "index.php";
?>

<?php include "classes/student.php"?>


<div class="container" style="margin-top:40px ;">

<?php $student = new Student;

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $skill = $_POST['skill'];
    $description = $_POST['description'];

    $student->setName($name);
    $student->setEmail($email);
    $student->setPhone($phone);
    $student->setSkill($skill);
    $student->setDes($description);

    if($student->insert()){
        echo "<span style='color:green'>Data Inserted Successfully.....</span>";
    }
}

if(isset($_POST['update'])){

    $id  = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $skill = $_POST['skill'];
    $description = $_POST['description'];

    $student->setName($name);
    $student->setEmail($email);
    $student->setPhone($phone);
    $student->setSkill($skill);
    $student->setDes($description);

    if($student->update($id)){

        echo "<span style='color:green'>Data Updated Successfully.....</span>";

    }
}

?>

<?php 
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $id = (int)$_GET['id'];
        if($student->delete($id)){
            echo "<span style='color:red'>Data Deleted Successfully.....</span>";

        }
    }

?>
    <div class="row">
        <div class="col-md-4">
        <?php 
            if(isset($_GET['action']) && $_GET['action'] == 'update'){
                $id = (int)$_GET['id'];
                $result  = $student->editById($id);
            
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
                    <label for="">Skill</label>
                    <input type="text" name="skill" value="<?php echo $result[0]['skill']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" class="form-control" cols="30" rows="2"><?php echo $result[0]['description']?></textarea>
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
                    <label for="">Skill</label>
                    <input type="text" name="skill" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" class="form-control" cols="30" rows="2"></textarea>
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
                    <th scope="col">Skill</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                   
                foreach($student->readAll() as $key => $value) {?>
                    <tr>
                    <th scope="row"><?php echo $key + 1;?></th>
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['email'];?></td>
                    <td><?php echo $value['phone'];?></td>
                    <td><?php echo $value['skill'];?></td>
                    <td><?php echo $value['description'];?></td>
                    <td>
                        <?php echo "<a href='studen.php?action=update&id=".$value['id']."'>Edit</a>" ?> ||
                        <?php echo "<a href='studen.php?action=delete&id=".$value['id']."' onClick='return confirm(\"Are you sure yor went to delete data..\")' >Delete</a>" ?>
                    </td>
                    </tr>
                <?php }?>   
                </tbody>
            </table>
        </div>
    </div>

</div>