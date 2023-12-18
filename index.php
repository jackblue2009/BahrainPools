<?php
	session_start();
	include "partials/connectDb.php";
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
	<div data-role="page" id="homepage">
		<!-- HEADER INCLUDE -->
		<?php include "partials/header.php"; ?>
		<div data-role="main" class="ui-content" align="center">
			<h2>Select A Governorate</h2>
				<form action="index.php" method="POST">
					<ul data-role="listview" id="goverVal" name="goverVal">
					<?php
						include "partials/connectDb.php";

						$sql = "SELECT * FROM governorate_table;";
						$run_query = mysqli_query($conn, $sql);

						while ($row = mysqli_fetch_array($run_query))
						{
							$gId = $row['g_id'];
							echo "<li data-value='{$gId}'><a href='area_page.php' class='ui-btn'>$gId - $row[name]</a></li>";
						}
					?>
					</ul>
				</form>
		</div>
		<!-- FOOTER INCLUDE -->
		<?php include "partials/footer.php"; ?>
	</div>

	<script>
	$(document).ready(function(){
		$('#goverVal').on("click", "li", function(){
		   $.ajax("update_session.php",{method:"post", data:{val:$(this).attr("data-value")}});
		});
	});
	</script>
	</body>
</html>