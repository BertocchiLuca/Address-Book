<!DOCTYPE html>
<html lang="en">

    <head>
        <script src="web\js\ViewContacts.js"></script>
    </head>

<body>
     <!-- Template -->
     <div id = "#menu">
            <ul class="nav">
                <li class="nav-item">
                    <a href = "?action=EnterContacts"> Enter Contacts </a>
                </li>
                <li class="nav-item">
                    <a href = "?action=Home"> Home Page </a>
                </li>
                <li class="nav-item">
                    <a href = "?action=ModifyContacts"> Modify Contacts </a>
                </li>
            </ul>
        </div>  
        <!-- End Template -->

        <!-- This Page -->

        <?php
            // Da formattare poi, e da creare l'onclick con la visualizzazione del dettaglio
            if(!isset($_SESSION['contacts'])){
                echo '<div class = "error">The address book is empty</div>';
            }
            else{
                $contacts = $_SESSION['contacts'];
                echo '<div id = "list">';
                for($i = 0; $i < count($contacts); $i++){
                    $name = strval($contacts[$i]['name']);
                    $lastname = strval($contacts[$i]['lastname']);
                    $DOB = strval($contacts[$i]['DOB']);
                    $tel = strval($contacts[$i]['tel']);
                    $desc = strval($contacts[$i]['desc']);
                    $str = "'$name', '$lastname', '$DOB', '$tel', '$desc'";
                    echo '<div id = "content" onclick = "display('.$str.')">';        
        ?>
            <img id = "Img" src = "web/img/MockupSony.jpg"></img>
        <?php
                    echo strval($contacts[$i]['name']) . 
                    ' ' . strval($contacts[$i]['lastname']). '</div><br/>';
                }
                echo '</div>';
            
        ?>
            <div id = "info">
                <img id = "mockup" src = "web\img\MockupSony.jpg"></img><div>
                <div id = "text">Click on a contact to view the details
                </div>  
                <div id = "desc"></div>             
                
            </div>

        <?php
            }
        ?>
        
        
        

</body>
</html>