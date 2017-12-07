<?php

class UserDB{

    private $Connection;

    public function __construct($Connection){

        $this->Connection = $Connection;


    }

    public function create($firstname,$lastname,$email,$address){

        try{
            $statment = $this->Connection->prepare("INSERT INTO `users`( `firstname`, `lastname`, `email`, `address`) VALUES (:firstname,:lastname,:email,:address)");
            $statment->bindParam(":firstname",$firstname);
            $statment->bindParam(":lastname",$lastname);
            $statment->bindParam(":email",$email);
            $statment->bindParam(":address",$address);
            $statment->execute();

            return true;
        }catch(PDOException  $e){
            echo 'Err : '.$e->getMessage();
        }

        return false;
    }

    public function getUser($id_user){
        
        $statment = $this->Connection->prepare("SELECT * FROM `users` WHERE id=:id");
        $statment->execute(array(":id"=>$id_user));
        return  $statment->fetch(PDO::FETCH_ASSOC);


    }

    public function update($id_user,$firstname,$lastname,$email,$address){
        
        //try{
            $statment = $this->Connection->prepare("UPDATE `users` SET `firstname`=:firstname,`lastname`=:lastname,`email`=:email,`address`=:address WHERE `id`=:id");
            $statment->bindParam(":firstname",$firstname);
            $statment->bindParam(":lastname",$lastname);
            $statment->bindParam(":email",$email);
            $statment->bindParam(":address",$address);
            $statment->bindParam(":id",$id_user);
            $statment->execute();
           // exit();
            return true;
        /*}catch(PDOException  $e){
            echo 'Err : '.$e->getMessage();
        }

        return false;*/
    }

    public function delete($id_user){

        $statment = $this->Connection->prepare("DELETE FROM `users` WHERE `id`=:id");
        $statment->bindParam(":id",$id_user);
        $statment->execute();

        return true;
    }

    public function viewData(){

        $query = "SELECT `id`, `firstname`, `lastname`, `email`, `address` FROM `users` ";
        $statment = $this->Connection->prepare($query);
        $statment->execute();
        if($statment->rowCount() > 0){
            while($row = $statment->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td>".$row['id']."<input  id='id_".$row['id']."'  type='hidden' value='".$row['id']."'></td>";
                echo "<td><i class=\"fa fa-user-circle\" aria-hidden=\"true\"></i> ".$row['firstname']."<input id='firstname_".$row['id']."' type='hidden' value='".$row['firstname']."'></td>";
                echo "<td>".$row['lastname']."<input id='lastname_".$row['id']."'   type='hidden' value='".$row['lastname']."'></td>";
                echo "<td>".$row['email']."<input id='email_".$row['id']."'   type='hidden' value='".$row['email']."'></td>";
                echo "<td>".$row['address']."<input id='address_".$row['id']."'  type='hidden' value='".$row['address']."'></td>";
                echo "<td><a  href='#'  onclick=\"setInputsEdit('".$row['id']."','edit')\"  uk-toggle=\"target: #modal-example\" ><i class=\"fa fa-pencil-square-o fa-x3\" aria-hidden=\"true\"></i></a></td>";
                echo "<td><a   href='#'  onclick=\"setInputsEdit('".$row['id']."','delete')\"  uk-toggle=\"target: #modal-example\"><i class=\"fa fa-trash fa-x2\" aria-hidden=\"true\"></i></a></td>";
                echo "</tr>";


            }
        }else{
            echo "<tr>";
            echo "<td>no records :( </td>";
            echo "</tr>";
        }


    }

    public function ActionCreateUser($id_to_delete,$id_edit,$firstname,$lastname,$email,$address){

        

        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($address)){
            if(empty($id_edit) && empty($id_to_delete)){
                $result = $this->create($firstname,$lastname,$email,$address);
            }elseif(!empty($id_edit) && empty($id_to_delete)){
                $result = $this->update($id_edit,$firstname,$lastname,$email,$address);
            }else{
                $result = $this->delete($id_to_delete);   
            }
           

            if($result){
                echo "<script>window.location = 'index.php';</script>";
            }else{
                echo 'Failed !! ';
            }
        }
    }



}
