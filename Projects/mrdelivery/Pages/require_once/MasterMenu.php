 
 
 
   
 <nav>
		<div   class="logo">   
		<a  href="Home.php" ><img  src="../images/nav_logo.png" alt="logo"></a>
		</div> 
            <div class="openMenu"><i class="fa fa-bars"></i></div>
            <ul class="mainMenu">
                 
                 
                <li class="nameMenu"  >  <?php  echo  " מנהל ".$_SESSION['UserNow']->getUserName();?>  </a></li>
                
                <li><a   href="MasterInvitations.php">הזמנות לשיוך</a></li>
                <li><a   href="MasterTreatmentOrders.php">הזמנות לטיפול</a></li>
                <li><a   href="MasterAllinvitations.php"> כל ההזמנות</a></li>
                <li><a   href="MasterUsers.php">כל המשתמשים</a></li>
                <li><a   href="MasterCourier.php">כל השליחים</a></li>
                <li><a   href="MasterAddCourier.php">הוספת שליח</a></li> 
                <li><a   href="MasterAllMessage.php">הודעות</a></li> 
                <li><a   href="../PHP/logout.php" tite="Logout">יציאה</a></li>

        
         
                <div class="closeMenu"><i class="fa fa-times"></i></div>
             
            </ul>
        </nav>


    <script src="../JS/app.js"></script>
 