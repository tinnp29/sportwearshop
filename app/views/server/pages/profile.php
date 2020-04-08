<div class="personal-info col-sm-6">
    <form action="<?php echo BASEURL; ?>/Profile/Update" method="POST">
    <fieldset>
        <legend>Thông Tin Cá Nhân</legend>
        <?php $this->flash("updateSuccess", "text-success"); ?>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Họ : </label>
            <div class="col-sm-5">
                <input type="text" name="first_name" class="form-control-plaintext" value="<?php echo $data["dataAccount"]["firstName"]; ?>">
            </div>
            <div class="col-sm-5 text-danger">
                <?php $this->flash("firstNameErr", "text-danger"); ?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên : </label>
            <div class="col-sm-5">
                <input type="text" name="last_name" class="form-control-plaintext" value="<?php echo $data["dataAccount"]["lastName"]; ?>">
            </div>
            <div class="col-sm-5 text-danger">
                <?php $this->flash("lastNameErr", "text-danger"); ?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email : </label>
            <div class="col-sm-5">
                <input type="email" name="email" class="form-control-plaintext" value="<?php echo $data["dataAccount"]["email"]; ?>">
            </div>
        </div>

        <div class="form-group row">
            <button type="submit" name="updateBtn" class="btn btn-success col-sm-2">Cập Nhật</button>
        </div>
    </fieldset>
    </form>
</div>