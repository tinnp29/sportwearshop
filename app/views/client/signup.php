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
    
    <form action="<?php echo BASEURL; ?>/SignUp/signUp" method="POST" class="form container jumbotron">
        <div class="row justify-content-center">
            <fieldset class="col-6 col-sm-6 col-md-4">
                <div class="form-group row justify-content-center">
                    <span class="col-sm-5"><u><h3>Đăng Ký</h3></u></s>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="">Họ :</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Nhập họ.." 
                        value="<?php if(!empty($data['firstName'])): echo $data['firstName']; endif; ?>">
                        <div class="text-danger">
                            <?php if(!empty($data['firstNameErr'])): echo $data['firstNameErr']; endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Tên :</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Nhập tên.."
                        value="<?php if(!empty($data['lastName'])): echo $data['lastName']; endif; ?>">
                        <div class="text-danger">
                            <?php if(!empty($data['lastNameErr'])): echo $data['lastNameErr']; endif; ?>
                        </div>
                    </div>
                                           
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

                <div class="form-group">
                    <label for="">Nhập Lại Mật Khẩu :</label>
                    <input type="password" name="re_password" class="form-control" placeholder="Mật khẩu.."
                    value="<?php if(!empty($data['rePassword'])): echo $data['rePassword']; endif; ?>">
                    <div class="text-danger">
                        <?php if(!empty($data['rePasswordErr'])): echo $data['rePasswordErr']; endif; ?>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <button type="submit" name="signupBtn" class="col-sm-4 btn btn-outline-info">Đăng Ký</button>
                </div>
                <div class="form-group">
                    <span>Đã có tài khoản ? <a href="<?php echo BASEURL; ?>/Signin" class="text-success">Đăng Nhập</a></span>
                </div>
            </fieldset>
        </div>    
    </form>

    <!-- <img src="<?php echo BASEURL; ?>/assets/images/img1.jpg" alt=""> -->

    <?php linkJS("assets/js/app.js"); ?>
</body>
</html>
