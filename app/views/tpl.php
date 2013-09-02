<!doctype html>
<html>
	<head>
	</head>
	
	<body>
		<?php echo $html->a("index", "about", "Link"); ?>
		
		<?php if ($test == 1): ?>
			<p>Hello, World! <?php echo $test; ?></p>
		<?php endif; ?>
	</body>
</html>
