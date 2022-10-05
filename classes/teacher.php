<?php 
include "main.php";

class Teacher extends Main{

    protected $table = 'teacher';
    private $name;
    private $email;
    private $phone;
    private $address;
 

    public function setName($name){

        $this->name = $name;
    }
    public function setEmail($email){

        $this->email = $email;
    }

    public function setPhone($phone){

        $this->phone = $phone;
    }
    public function setAddresss($address){

        $this->address = $address;
    }
    

    public function insert()
    {
        $sql = "INSERT INTO $this->table (name, email,phone, address) VALUES (:name, :email, :phone, :address)";       
        
        $stml = DB::prepare($sql);
        $stml->bindParam(':name', $this->name);
        $stml->bindParam(':email', $this->email);
        $stml->bindParam(':phone', $this->phone);
        $stml->bindParam(':address', $this->address);
        return $stml->execute();
    }

    public function update($id)
    {
        $sql = "UPDATE $this->table SET name=:name, email=:email, phone=:phone,address =:address where id=:id";
        $stml = DB::prepare($sql);
        $stml->bindParam(':name', $this->name);
        $stml->bindParam(':email', $this->email);
        $stml->bindParam(':phone', $this->phone);
        $stml->bindParam(':address', $this->address);
        $stml->bindParam(':id', $id);
        return $stml->execute();
    }   
}

?>