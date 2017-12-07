<?php

include_once 'dbConnection.php';

include_once 'header.php';
?>

       
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-right">
    
            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="#" uk-toggle="target: #modal-example"  onclick="rsetInputs()"><font color="red"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></font></a></li>
                   
            </ul>
    
        </div>
    
    </nav>

    <div class="uk-padding">
    <div class="uk-grid-match">
    
        <div class="uk-card uk-card-secondary uk-card-hover uk-card-body uk-light">
            <h3 class="uk-card-title">Users :</h3>
            <table class="uk-table uk-table-hover uk-table-divider">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $Personn->viewData();
            ?>
            </tbody>
        </table>
        </div>
    </div>
  <div>
  </div>

<!-- This is the modal To add new user -->


<div id="modal-example" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title" id='typeAction'>Add new user</h2>
        <p>
            <?php
            if(isset($_POST['btn-save'])){

                $id_edit = '';
                $id_to_delete ='';
                if(isset($_POST['id_modal'])) $id_edit = $_POST['id_modal'];
                if(isset($_POST['id_to_delete'])) $id_to_delete = $_POST['id_to_delete'];
                $Personn->ActionCreateUser($id_to_delete,$id_edit,$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['address']); 
            }
            include_once 'editForm.php';
            
            ?>
         
    </div>
</div>


<?php
include_once 'footer.php';
?>