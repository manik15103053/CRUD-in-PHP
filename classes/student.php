<?php 
include "main.php";

class Student extends Main{

    protected $table = 'tbl_student';
    private $name;
    private $email;
    private $phone;
    private $skill;
    private $description;

    public function setName($name){

        $this->name = $name;
    }
    public function setEmail($email){

        $this->email = $email;
    }

    public function setPhone($phone){

        $this->phone = $phone;
    }
    public function setSkill($skill){

        $this->skill = $skill;
    }
    public function setDes($description){

        $this->description = $description;
    }

    public function insert()
    {
        $sql = "INSERT INTO $this->table (name, email,phone, skill,description) VALUES (:name, :email, :phone, :skill, :description)";       
        
        $stml = DB::prepare($sql);
        $stml->bindParam(':name', $this->name);
        $stml->bindParam(':email', $this->email);
        $stml->bindParam(':phone', $this->phone);
        $stml->bindParam(':skill', $this->skill);
        $stml->bindParam(':description', $this->description);
        return $stml->execute();
    }

    public function update($id)
    {
        $sql = "UPDATE $this->table SET name=:name, email=:email, phone=:phone,skill =:skill, description=:description where id=:id";
        $stml = DB::prepare($sql);
        $stml->bindParam(':name', $this->name);
        $stml->bindParam(':email', $this->email);
        $stml->bindParam(':phone', $this->phone);
        $stml->bindParam(':skill', $this->skill);
        $stml->bindParam(':description', $this->description);
        $stml->bindParam(':id', $id);
        return $stml->execute();
    }   
}

?>