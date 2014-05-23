
<?php include('header.php'); ?>	
		<header>Check Weather</header>
			<div class="container bg">
				<div class="jumbotron">
					<form class="form" action="getwoeid.php" method="get">
						<label for="zip">Type in the name of the place</label>
						<input type="text" id="getPlace" class="form-control" name="place" placeholder	="City, State"/><br>					
						<input type="submit" class="btn-block btn btn-primary form-control">
					</form>
				</div>
			</div>
		<div class="tables" id="tables">	</div>
	

		<footer></footer>
	</body>
</html>d