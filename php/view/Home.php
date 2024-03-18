<!DOCTYPE html>
<html lang="en">

<body>

        <!-- Menu -->
        <div id = "#menu">
            <ul class="nav">
                <li class="nav-item">
                    <a href = "?action=EnterContacts"> Enter Contacts </a>
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
        
        
        <div id = "welcome">
            <span class = 'title'>Welcome !</span><br/><br/>
            This is my address book website!
            It has been realized with sessions! <br/><br/>
            The contacts' information will be stored in the session file. <br/><br/>
            If you are new, please click <b>"Enter Contacts"</b> to start creating your own address book. Enjoy!
        </div>
        
        <form method = "POST">
            <input type = "hidden" name = "reset"></input>
            <button id ="restart" type = "submit" name = "reset">Click here to reset the address book</button>
        </form>

        <?php
            if(isset($_POST['reset'])){
                session_destroy();
                session_start();
                setcookie(session_name(), session_id(), strtotime("1 day"), '/', 'localhost', TRUE, TRUE);
                echo '<div id = "done">The session has been restarted</div>';
            }
            
        ?>
        
</body>





</html>