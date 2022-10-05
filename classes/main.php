<?php
    include "DB.php";

    abstract class Main{

        protected $table;

        abstract public function insert();
        abstract public function update($id); 

        public function readAll(){
            $sql = "SELECT * FROM $this->table";
            $stml = DB::prepare($sql);
            $stml->execute();
            return $stml->fetchAll();
        }

        public function editById($id){
            $sql = "SELECT * FROM $this->table WHERE id =:id";
            $stml = DB::prepare($sql);
            $stml->bindParam(':id', $id);
            $stml->execute();

            return $stml->fetchAll();
        }

        public function delete($id){

            $sql = "DELETE FROM $this->table where id = :id";
            $stml = DB::prepare($sql);
            $stml->bindParam(':id', $id);
            return $stml->execute();
        }

      
    }
?>