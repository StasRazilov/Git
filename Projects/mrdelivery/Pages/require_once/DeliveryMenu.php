 
 
  
 <nav>
		<div   class="logo">   
		<a  href="Home.php" ><img  src="../images/nav_logo.png" alt="logo"></a>
		</div> 
            <div class="openMenu"><i class="fa fa-bars"></i></div>
            <ul class="mainMenu">
             
             
            <li class="nameMenu" > <?php echo " שליח ". $_SESSION['UserNow']->getUserName(); ?> </li>
            
            <li><a  href="DeliveryTreatmentOrders.php">הזמנות לטיפול</a></li>
            <li><a    href="DeliveryAllinvitations.php">כל ההזמנות שלי</a></li> 
            <li><a  href="../PHP/logout.php" tite="Logout">יציאה</a></li> 
            

             
             
             
                <div class="closeMenu"><i class="fa fa-times"></i></div>
             
            </ul>
        </nav>


    <script src="../JS/app.js"></script>
  
 