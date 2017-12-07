<!DOCTYPE html>
<html>
    <head>
        <title>Test UIKit</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="static/img/poison.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="static/css/uikit.min.css" />
        <link rel="stylesheet" href="static/fonts/css/font-awesome.css" />
        <script src="static/js/uikit.min.js"></script>
        <script src="static/js/uikit-icons.min.js"></script>
        <script>
        function setInputsEdit(id_user,typeAction) {
            
            if(typeAction == "delete"){
                document.getElementById("typeAction").innerHTML = "Are you sure to delete this user ?!!";
                document.getElementById("btn-action").innerHTML = "Delete";
                document.getElementById('id_to_delete').value = document.getElementById('id_'+id_user).value;
                document.getElementById('id_modal').value = '';
            }else if(typeAction == "edit"){
                document.getElementById("typeAction").innerHTML = "Edit user!";
                document.getElementById("btn-action").innerHTML = "Edit";
                document.getElementById('id_to_delete').value = '';
                document.getElementById('id_modal').value = document.getElementById('id_'+id_user).value;
            }
               
            
            document.getElementById('firstname_modal').value = document.getElementById('firstname_'+id_user).value;
            document.getElementById('lastname_modal').value = document.getElementById('lastname_'+id_user).value;
            document.getElementById('email_modal').value = document.getElementById('email_'+id_user).value;
            document.getElementById('address_modal').value = document.getElementById('address_'+id_user).value;
        }

        function rsetInputs() {
            
            document.getElementById("typeAction").innerHTML = "Add new user";
            document.getElementById("btn-action").innerHTML = "Save";
            document.getElementById('id_modal').value = '';
            document.getElementById('firstname_modal').value = '';
            document.getElementById('lastname_modal').value = '';
            document.getElementById('email_modal').value = '';
            document.getElementById('address_modal').value = '';
            document.getElementById('id_to_delete').value = '';
        }
        </script>
    </head>
    <body>