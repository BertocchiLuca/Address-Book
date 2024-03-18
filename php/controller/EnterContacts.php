<!DOCTYPE html>
<html lang="en">

    

    <!-- Menu -->
    <div id = "#menu">
            <ul class="nav">
                <li class="nav-item">
                    <a href = "?action=Home"> Home Page </a>
                </li>
                <li class="nav-item">
                    <a href = "?action=ViewContacts"> View Contacts </a>
                </li>
                <li class="nav-item">
                    <a href = "?action=ModifyContacts"> Modify Contacts </a>
                </li>
            </ul>
        </div>  
        <!-- End Menu -->

        <!-- This Page -->

        <?php
            // This is the first cycle, this means that all the values won't be set. So I basically do nothing
            if(isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['desc'])
            && isset($_POST['tel']) && isset($_POST['DOB'])){
                // This is from the second cycle on, this means I have to check If data is valid and I must communicato to the user
                /*Checks if the data has been entered properly*/
                
                if(trim($_POST['name']) == ""  || is_numeric($_POST['name']) || strlen($_POST['name']) > 15 ||
                    trim($_POST['lastname']) == ""  || is_numeric($_POST['lastname']) || strlen($_POST['lastname']) > 15){
                        echo '<span class = "errorE">The name and/or the lastname field are null or they are numeric. Please, enter valid data</span>';
                    }
                else if($_POST['DOB'] < '1930-1-1' || $_POST['DOB'] >'2010-1-1'){
                    echo '<span class = "errorE">The date you have entered is improbable or does not exist. Please, enter valid data</span>';
                } 
                else if($_POST['tel'] == "" || !is_numeric($_POST['tel']) || strlen($_POST['tel']) > 12){
                    echo '<span class = "errorE">Please, enter a valid phone number</span>';
                }
                /* From here I have to save the values in arrays, then serialize those arrays and put them into
                    the $_COOKIE global variable 
                */
                else{
                    // Se c'è già la matrice di contatti la prendo e la deserializzo
                    if(isset($_SESSION['contacts'])){
                        $contacts = $_SESSION['contacts'];
                        $contacts[count($contacts)] = array('name' => $_POST['name'], 
                        'lastname' => $_POST['lastname'],
                        'DOB' => $_POST['DOB'], 'tel' => $_POST['tel'], 
                        'desc' => $_POST['desc']);
                        $_SESSION['contacts'] = $contacts;
                    }
                else{
                    // Altrimenti se non c'è, devo crearla per la prima volta
                    $contacts = [];
                    $contacts[count($contacts)] = array('name' => $_POST['name'], 
                        'lastname' => $_POST['lastname'],
                        'DOB' => $_POST['DOB'], 'tel' => $_POST['tel'], 
                        'desc' => $_POST['desc']);
                    $_SESSION['contacts'] = $contacts;
                }
                echo '<span class = "rightE">You have added a new contact!</span>';
            }
            
        }
 
        ?>
        
        <form id = "enter" method = "POST" action = "">
            <span class = "title">Enter the new contact's information</span> <br/><br/>
            <input type = "text" name = "name" value = "<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" placeholder = "Name: *"></input><br/><br/>
            <input type = "text" name = "lastname" value = "<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>" placeholder = "Lastname: *"></input> <br/><br/>
            <input type = "text" class = "date" value = "<?php if(isset($_POST['DOB'])) echo $_POST['DOB']; ?>" name = "DOB" placeholder = "Date Of Birth: *" onfocus = "this.type='date'"></input> <br/><br/>
            <input type = "tel" name = "tel" value = "<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>" placeholder = "Tel: *"></input> <br/><br/>
            <textarea id = "desc" cols = "50" rows = "5" name = "desc" value = "<?php if(isset($_POST['desc'])) echo $_POST['desc']; ?>"  placeholder = "Description:"></textarea><br/><br/>
            <button type = "submit" value = "submit">Submit</button>
        </form>

        <?php 
            // Termine if sovrastante
        ?>




</html>