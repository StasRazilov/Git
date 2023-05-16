 
 
   
 <nav>
		<div   class="logo">   
		<a  href="Home.php" ><img  src="../images/nav_logo.png" alt="logo"></a>
		</div> 
            <div class="openMenu"><i class="fa fa-bars"></i></div>
            <ul class="mainMenu">
                
                <li class="nameMenu" > <?php  echo  $_SESSION['UserNow']->getUserName();	 ?>  </li>
                
                <?php
                    if($_SESSION['UserNow']->getPermissionsField()==4)  //   VIP  user
                    {
                    ?>  
                        <li><a  href="UserManyInvitations.php">בהזמנות</a></li>
                        <li><a  href="UserViewingOrders.php">צפיה בהזמנות</a></li>
                        <li><a  href="UserLeavingMessage.php">השארת הודעה</a></li>

                        <li><a  href="../PHP/logout.php" tite="Logout">יציאה</a></li> 
                    <?php   
                    }
                    else     // user
                    {  
                    ?>
                        <li><a  href="UserInvitationOrder.php">הזמנת פעולה</a></li>
                        <li><a  href="UserViewingOrders.php">צפיה בהזמנות</a></li>
                        <li><a  href="UserUpdateDetails.php">עדכון פרטים</a></li>
                        <li><a  href="UserLeavingMessage.php">השארת הודעה</a></li>
                        
                        <li><a  href="../PHP/logout.php" tite="Logout">יציאה</a></li>  
                    <?php 
                    }
                    

                ?>

               

                <div class="closeMenu"><i class="fa fa-times"></i></div>
              
            </ul>
        </nav>


    <script src="../JS/app.js"></script>
 