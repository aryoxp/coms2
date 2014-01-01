<div class="container">

    <div class="well" style="max-width: 450px; margin: 5em auto; ">

    <form id="logon-form" name="auth" method="post" action="<?php echo $this->location("auth/logon/"); ?>">
        <h3 class="form-signin-heading" style="text-align: center">User Authentication</h3>

        <hr>

        <div id="notification-container"></div>

        <input type="text" class="form-control" name="username" id="username" value="" placeholder="Username" required autofocus />
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
        </label>

        <hr>

        <button type="submit" data-theme="a" class="btn btn-lg btn-primary btn-block" style="max-width: 200px; margin: 0 auto; ">Sign In</button>
    </form>

    </div>

</div> <!-- /container -->