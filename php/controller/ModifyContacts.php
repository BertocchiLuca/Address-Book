<!DOCTYPE html>
<html lang="en">


    <head>
        <script src = "web\js\ModifyContacts.js"></script>
        
    </head>

<body>
    <!-- Template -->
    <div id = "#menu">
            <ul class="nav">
                <li class="nav-item">
                    <a href = "?action=EnterContacts"> Enter Contacts </a>
                </li>
                <li class="nav-item">
                    <a href = "?action=ViewContacts"> View Contacts </a>
                </li>
                <li class="nav-item">
                    <a href = "?action=Home"> Home Page </a>
                </li>
            </ul>
        </div>  
        <!-- End Template -->

        <!-- This Page -->

        
        <?php
            
            // Da formattare poi, e da creare l'onclick con la visualizzazione del dettaglio
            if(!isset($_SESSION['contacts'])){
                echo '<div class = "error">The address book is empty</div>';
            } else{
                $contacts = $_SESSION['contacts'];
                // Se i contatti ci sono, effettuo i controlli necessari sul form, ed effettuo la modifica
                if(isset($_POST['pos']) && isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['desc'])
                && isset($_POST['tel']) && isset($_POST['DOB'])){
                    // This is from the second cycle on, this means I have to check If data is valid and I must communicato to the user
                    /*Checks if the data has been entered properly*/
                    if(trim($_POST['name']) == ""  || is_numeric($_POST['name']) || strlen($_POST['name']) > 15 ||
                        trim($_POST['lastname']) == ""  || is_numeric($_POST['lastname']) || strlen($_POST['lastname']) > 15){
                            echo '<div id = "Error">The name and/or the lastname field are null or they are numeric</div>';
                        }
                    else if($_POST['DOB'] < '1930-1-1' || $_POST['DOB'] >'2010-1-1'){
                        echo '<div id = "Error">The date you have entered is improbable or does not exist</div>';
                    } 
                    else if($_POST['tel'] == "" || !is_numeric($_POST['tel']) || strlen($_POST['tel']) > 12){
                        echo '<div id = "Error">Please, enter a valid phone number</div>';
                    } else{
                        $contacts[intval($_POST['pos'])]['name'] = $_POST['name'];
                        $contacts[intval($_POST['pos'])]['lastname'] = $_POST['lastname']; 
                        $contacts[intval($_POST['pos'])]['DOB'] = $_POST['DOB']; 
                        $contacts[intval($_POST['pos'])]['tel'] = $_POST['tel']; 
                        $contacts[intval($_POST['pos'])]['desc'] = $_POST['desc'];
                        // Riaggiorno la matrice nelle sessioni con il contatto modificato
                        $_SESSION['contacts'] = $contacts;
                        echo '<div id = "right">Contact Modified Correctly</div>';
                    }
                }
                // Dopo i controlli e la modifica (se c'è stata), stampo la lista
                echo '<div id = "list">';
                for($i = 0; $i < count($contacts); $i++){
                    $pos = strval($i);
                    $name = strval($contacts[$i]['name']);
                    $lastname = strval($contacts[$i]['lastname']);
                    $DOB = strval($contacts[$i]['DOB']);
                    $tel = strval($contacts[$i]['tel']);
                    $desc = strval($contacts[$i]['desc']);
                    $str = "'$pos', '$name', '$lastname', '$DOB', '$tel', '$desc'";
                    echo '<div id = "content" onclick = "modify('.$str.')">';
                // Si interrompe il php per l'immagine di mockup
        ?>
            <img id = "Img" src = "web/img/MockupSony.jpg"></img>
        <?php
                    echo strval($contacts[$i]['name']) . 
                    ' ' . strval($contacts[$i]['lastname']). '</div><br/>';

                   
                }
                echo '</div>';
            
            // Interrompo per segnale di modifica
            // Si interrompe il php per mostrare il form (nel caso in cui l'utente clicchi su un contatto nella lista)
        ?>

        <div id = "info">Click on a contact to change it</div>
        <div id = "mod">
            <form id = "modify" method = "POST" action = "">
                <span class = "title">Modify the contact</span> <br/><br/>
                <input type = "text" id = "name" name = "name" value = "<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" placeholder = "Name: *"></input><br/><br/>
                <input type = "text" id = "lastname" name = "lastname" value = "<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>" placeholder = "Lastname: *"></input> <br/><br/>
                <input type = text id = "DOB" class = date name = DOB placeholder = "Date Of Birth: *" value = "<?php if(isset($_POST['DOB'])) echo $_POST['DOB']; ?>"onfocus = "this.type='date'"></input> <br/><br/>
                <input type = "tel" id = "tel" name = "tel" value = "<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>" placeholder = "Tel: *"></input> <br/><br/>
                <textarea id = "desc" cols = "50" rows = "5" value = "<?php if(isset($_POST['desc'])) echo $_POST['desc']; ?>" name = "desc" placeholder = "Description:"></textarea><br/><br/> 
                <button type = "submit">Submit</button>
                <input type="hidden" id = "pos" name = "pos"></input>
            </form>
        </div>

        <!-- Riprendo php per terminare l'else-->
        <?php
        // Ultima parentesi else grande, cioè l'else in cui entro se la lista non è vuota
            }
        ?>
        

        
        
    
</body>
</html>