<h2>Danh Sách Tài Khoản</h2>
<table class="table table-hover" width="100%">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Họ</th>
      <th scope="col">Tên</th>
      <th scope="col">Email</th>
      <th scope="col">Mật Khẩu</th>
      <th scope="col">Vị Trí</th>
      <th scope="col">Thao Tác</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data["data"] as $account): ?>
    <tr class="table-active">
        <th scope="row"><?php echo $account->account_id; ?></th>
        <td><?php echo $account->first_name; ?></td>
        <td><?php echo $account->last_name; ?></td>
        <td><?php echo $account->email; ?></td>
        <td><?php echo $account->password; ?></td>
        <td><?php echo $account->role_name; ?></td>
        <td><a href="" class="btn btn-outline-success"><i class="material-icons">import_export</i></a></td>
        <td><a href="" class="btn btn-outline-danger"><i class="material-icons">lock</i></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table> 
