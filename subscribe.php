<div id="login-box" style="position: fixed;">
    <i class="fa fa-remove login-toggle"></i>
    <!-- Login from -->
    <form class="user-form login-form form-active text-center">
        <h1 class="form-heading">Log in to your account</h1>
        <a href="##" class="btn btn-login w-facebook"><i class="fa fa-facebook"></i>Facebook</a>
        <a href="##" class="btn btn-login w-twitter"><i class="fa fa-twitter"></i>Twitter</a>
        <p class="or-login">or</p>
        <div class="form-group">
            <input type="email" name="email" class="form-control" id="login-email" required="">
            <i class="fa fa-envelope input-icon"></i>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" id="login-password" required="">
            <i class="fa fa-key input-icon"></i>
        </div>			
        <button type="submit" value="login" class="btn btn-block btn-login text-uppercase">
            Login
        </button>
        <p class="forgot-password">
            Forgot your password? <a href="##">Click here</a>
        </p>
        <p class="no-account">
            Don't have an account yet? <a id="signUp-frm-button" href="##">Sign Up</a>
        </p>
    </form>

    <!-- SignUp form -->
    <form class="user-form signUp-form text-center">
        <h1 class="form-heading">Sign Up</h1>
        <a href="#" class="btn btn-login w-facebook"><i class="fa fa-facebook"></i>Facebook</a>
        <a href="#" class="btn btn-login w-twitter"><i class="fa fa-twitter"></i>Twitter</a>
        <p class="or-login">or</p>
        <div class="form-group">
            <input type="email" name="email" class="form-control" id="signUp-email" required="">
            <i class="fa fa-envelope input-icon"></i>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" id="signUp-password" required="">
            <i class="fa fa-key input-icon"></i>
        </div>			
        <button type="submit" value="login" class="btn btn-block btn-login text-uppercase">
            Sign Up
        </button>
        <p class="forgot-password">
            Forgot your password? <a href="##">Click here</a>
        </p>
        <p class="no-account">
            You have an account allready? <a id="login-frm-button" href="##">Login</a>
        </p>
    </form>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        $('.send-form').validate({
            submitHandler: function () {
                var curForm = $('.send-form');
                $("<div />").addClass("formOverlay").appendTo(curForm);

                $.ajax({
                    url: 'mail.php',
                    type: 'POST',
                    data: curForm.serialize(),
                    success: function (data) {
                        var res = data.split("::");
                        curForm.find("div.formOverlay").remove();
                        curForm.prev('.expMessage').html(res[1]);
                        if (res[0] == 'Success')
                        {
                            curForm.remove();
                            curForm.prev('.expMessage').html('');
                        }
                    }
                });
                return false;
            }
        });
        $('#slimtest1').slimScroll({
            height: '400px'
        });
        $('#slimtest2').slimScroll({
            height: '800px'
        });
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>