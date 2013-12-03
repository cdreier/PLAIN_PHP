<p>	Username and password: test </p>

<?php if($error ): ?>
<p style="color: red;"><?php echo $error ?></p>
<?php endif; ?>

<form action="<?php echo App::linkTo("auth"); ?>" method="POST">
	
	<label for="username">Username</label><input type="text" name="username" value="" id="username"/>
	<br>
	<label for="password">Password</label><input type="password" name="password" value="" id="password"/>
	<br>
	<input type="submit" value="Login" />
	
</form>