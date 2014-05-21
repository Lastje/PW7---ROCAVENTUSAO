<?php 

if(isset($_SESSION['userId'])) {
$user = $database->getUserById($_SESSION['userId']);
?>
<div class="content">
 	<div class="header">
 		<h1 id="header_h1">Welkom <?php echo $user->getName(); ?></h1>
 	</div>

 	<div class="sideBar">
		<div id="header_inbox"><i class="fa fa-inbox"></i> Inbox</div>
	</div>

	<div class="innerContent">
		<div id="option_menu">
			<div class="option_item"><i class="fa fa-pencil"></i> Profiel</div>
			<div class="option_item"><a href="/PW7/logout/"><i class="fa fa-power-off"></i> Uitloggen</a></div>

		</div>


	</div>

	<div class="footer">
		<div id="footer_text"><i class="fa fa-info-circle"></i> Versie 1.0 </div>
	</div>

</div>

<?php } else {

	header('location:/PW7/inloggen/');

} ?>

