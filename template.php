<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="http://code.getmdl.io/1.1.1/material.blue-red.min.css" />
	<link rel="stylesheet" href="ressources/css/animate.css">
	<link rel="stylesheet" href="ressources/css/style.css">
	
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="http://code.getmdl.io/1.1.1/material.min.js"></script>
	<script src="ressources/js/script.js"></script>
	
	<link rel="icon" type="image/jpg" href="ressources/img/icon.PNG">
	<title>GleTech</title>
</head>
<body>
	<div class="spacer"></div>
	
	<?php include "donnees/get_entete.php"; ?>
	
	<div class="menu">
		<div class="first">
			<i class="fa fa-cubes"></i>
			<span class="idcat">0</span>
		</div>
		<?php 
		$idcat=0;
		foreach ($tab_categorie as $name => $font) { 
		?>
				<div title="<?php echo $name; ?>"class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent <?php if($idcat==0){ echo "active";} ?>">
					<i class="fa fa-<?php echo $font; ?>"></i>
					<span class="name"><?php echo $name; ?></span>
					<span class="idcat"><?php echo $idcat; ?></span>
				</div>
		<?php 
			$idcat++;
		} 
		?>
	</div>
	
