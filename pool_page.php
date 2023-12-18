<?php
	session_start();
	include "partials/connectDb.php";

	$areaChoice = $_SESSION["areaIdVar"];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Bahrain Pools</title>
		<!-- Include meta tag to ensure proper rendering and touch zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Include jQuery Mobile stylesheets -->
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<!-- Include the jQuery library -->
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<!-- Include the jQuery Mobile library -->
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script src="scripts/jquery-3.1.0.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<style type="text/css">
			body {
				text-transform: uppercase;
			}
			ul {
				list-style: none;
			}
			ul li {
				padding-bottom: 10px;
				text-align: center;
			}
		</style>
	</head>

	<body>

	<div data-role="page" id="poolPage">
		<!-- HEADER INCLUDE -->
		<?php include "partials/header.php"; ?>
		<div data-role="main" class="ui-content" align="center">
			<h2>Select a Pool</h2>
			<form action="pool_page.php" method="POST">
				<?php
					include "partials/connectDb.php";

					$query = "SELECT * FROM pool_table WHERE area = '$areaChoice';";
					
					$run_this_query = mysqli_query($conn, $query);

					$pId = "";

					echo "<ul data-role='listview' id='poolVal' name='poolVal'>";
					while ($row = mysqli_fetch_array($run_this_query))
					{
						$pId = $row['id'];
						echo "<li data-value='{$pId}'><a href='#'>$row[pool_name]</a></li>";
					}
					echo "</ul>";
				?>
			</form>
		</div>
		<!-- FOOTER INCLUDE -->
		<?php include "partials/footer.php"; ?>
	</div>

	<script>
	</script>
	</body>
</html>