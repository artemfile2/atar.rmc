<form method="post" class="form-signin">
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" name="login" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Enter login">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
    </div>
    <div class="form-check">
        <label class="form-check-label" for="remember">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            Remember me
        </label>
    </div>

    <input type="submit" class="btn btn-primary" value="Войти">

    <?=$msg?>
</form>