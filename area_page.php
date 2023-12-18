<?php
	session_start();
	include "partials/connectDb.php";

	$goverChoice = $_SESSION["val"];
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

	<div data-role="page" id="areaPage">
		<!-- HEADER INCLUDE -->
		<?php include "partials/header.php"; ?>
		<div data-role="main" class="ui-content" align="center">
			<h2>Select an Area</h2>
			<form action="area_page.php" method="POST">
				<?php
					include "partials/connectDb.php";

					$q = "SELECT * FROM area_table WHERE governorate = '$goverChoice';";
					
					$run_sql = mysqli_query($conn, $q);

					$aId = "";

					echo "<ul data-role='listview' id='areaVal' name='areaVal'>";
					while ($row = mysqli_fetch_array($run_sql))
					{
						$aId = $row['a_id'];
						echo "<li data-value='{$aId}'><a href='pool_page.php'>$row[area_name]</a></li>";
					}
					echo "</ul>";
				?>
			</form>
		</div>
		<!-- FOOTER INCLUDE -->
		<?php include "partials/footer.php"; ?>
	</div>

	<script>
		$(document).ready(function(){
			var areaIdVar = <?php echo "{$aId}"; ?>;
			$('#areaVal').on("click", "li", function(){
			   $.ajax("update_session_2.php",{method:"post", data:{areaIdVar:$(this).attr("data-value")}});
			});
		});

	</script>
	</body>
</html>