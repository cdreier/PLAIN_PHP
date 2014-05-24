<?php if($error):  ?>
    <p class="error">
        <?php echo $error; ?>
    </p>
<?php endif; ?>

<form method="POST" action="<?php echo $action; ?>" >
    <p>
        <input type="text" name="username" placeholder="Username" value="<?php echo $username ?>" />
    </p>
    <p>
        <input type="password" name="password1" placeholder="Password" />
    </p>
    <p>
        <input type="password" name="password2" placeholder="retype Password" />
    </p>
    <p>
        <input type="submit" value="Register" />
    </p>
</form>