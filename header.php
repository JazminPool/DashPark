<!-- Header estatico -->
<?php 
session_start();
if(!isset($_SESSION['Admin'])){
	header('Location:index.php');}
	else{?>
    <header class="header">
    <form action="acions.php" method="POST"></form>
        </form>
    </header>
    <?php }?>