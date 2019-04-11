<div class="container">
    <h2>Sign in to your account</h2>
    <form method="post" action="/users/signin" role="form" class="form-horizontal">
        <div class="form-group">
            <label for="login" class="control-label col-sm-2">Login</label>	
            <div class="col-sm-10">
                <input type="text" name="login" placeholder="Your login" class="form-control"/>
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="control-label col-sm-2">Password</label>	
            <div class="col-sm-10">
                <input type="password" name="pass" placeholder="Your password" class="form-control"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-10">
                <input type="submit" value="Sign in" class="btn btn-success btn_auth">
            </div>
        </div>
    </form>

</div>

