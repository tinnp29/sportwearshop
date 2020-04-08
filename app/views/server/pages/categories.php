<h2>Danh Mục Sản Phẩm</h2>
  
  <form action="<?php echo BASEURL; ?>/Categories/Add" method="POST" class="row justify-content-between">
      <div class="col-sm-4"> 
      <?php $this->flash("addCateParSuccess", "text-success"); ?>
        <div class="form-group row justify-content-between">
            <input type="text" name="category_par" class="form-control col-sm-8" placeholder="Danh mục cha..">
            <button type="submit" name="addParentBtn" class="col-sm-3 btn btn-outline-info">Thêm</button>
            <div class="col-sm-8"><?php $this->flash("addCateParErr", "text-danger"); ?></div>
        </div>
      </div>

      <div class="col-sm-5"> 
        <?php $this->flash("addCateChildSuccess", "text-success"); ?>
        <div class="form-group row justify-content-between">
          <label class="col-sm-4 col-form-label">Danh Mục Con :</label>
          <input type="text" name="category_child" class="form-control col-sm-8" placeholder="Danh mục con..">
          <div class="col-sm-12"><?php $this->flash("cateChildErr", "text-danger"); ?></div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Danh Mục Cha :</label>
            <select name="cate_par" class="form-control col-sm-8">
              <option value="">-- Chọn Danh Mục</option>
              <?php foreach($data["dataCatePar"] as $catePar): ?>
              <option value="<?php echo $catePar->category_id; ?>">
                <?php echo $catePar->category_name; ?>
              </option>
              <?php endforeach; ?>
            </select>
            <div class="col-sm-6"><?php $this->flash("selectErr", "text-danger"); ?></div>
        </div>

        <div class="form-group row justify-content-end">
          <button type="submit" name="addChildBtn" class="col-sm-3 btn btn-outline-info">Thêm</button> 
        </div>
      </div>
 
  </form>


<div class="row">
  <table class="table table-hover col-sm-12">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Loại Hàng</th>
      <th scope="col">Dành Cho</th>
      <th scope="col" colspan="2">Thao Tác</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data["categories"] as $category): ?>
    <tr class="table-active">
        <th scope="row"><?php echo $category->category_id; ?></th>
        <th scope="row"><?php echo $category->category_child; ?></th>
        <th scope="row"><?php echo $category->category_parent; ?></th>
        <th scope="row"><a href="" class="btn btn-outline-warning">Sửa</a></th>
        <th scope="row"><a href="" class="btn btn-outline-danger">Xóa</a></th>
    </tr>
    <?php endforeach; ?>
  </tbody>
  </table> 
</div>