<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $data["title"]; ?></title>
    <?php linkCSS("assets/css/inup.css"); ?>
    <?php linkCSS("assets/css/bootstrap.min.css"); ?>
</head>
<body>

    <?php $this->flash("signupSuccess", "text-success"); ?>
    <form action="<?php echo BASEURL; ?>/SignIn/signIn" method="POST" class="form container jumbotron">
        <div class="row justify-content-center">
            <fieldset class="col-6 col-sm-6 col-md-4">
                <div class="form-group row justify-content-center">
                    <span class="col-sm-6"><u><h3>Đăng Nhập</h3></u></s>
                </div>
                
                <div class="form-group">
                    <label for="">Email :</label>
                    <input type="text" name="email" class="form-control" placeholder="Email.." 
                    value="<?php if(!empty($data['email'])): echo $data['email']; endif; ?>">
                    <div class="text-danger">
                        <?php if(!empty($data['emailErr'])): echo $data['emailErr']; endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Mật Khẩu :</label>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu.."
                    value="<?php if(!empty($data['password'])): echo $data['password']; endif; ?>">
                    <div class="text-danger">
                        <?php if(!empty($data['passwordErr'])): echo $data['passwordErr']; endif; ?>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <button type="submit" name="signinBtn" class="col-sm-4 btn btn-outline-success">Đăng Nhập</button>
                </div>
                <div class="form-group">
                    <span>Chưa có tài khoản ? <a href="<?php echo BASEURL; ?>/SignUp" class="text-info">Đăng Ký</a></span>
                </div>
            </fieldset>
        </div>    
    </form>

    <?php linkJS("assets/js/app.js"); ?>
</body>
</html>
