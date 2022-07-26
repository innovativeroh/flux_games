<?php include('includes/header.php'); ?>
<title>Dashboard - Admin</title>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> #ID </th>
                            <th> Player ID </th>
                            <th> Balance </th>
                          </tr>
                        </thead>
                        <tbody>
<?php
  $query = "SELECT * FROM users ORDER BY id DESC";
  $sql = mysqli_query($conn, $query);
  while($row = mysqli_fetch_assoc($sql)) {
    $id = $row['id'];
    $email = $row['email'];
    $amount = $row['balance'];
    echo '                        <tr>
    <td> #'.$id.' </td>
    <td>
    '.$email.'
    </td>
    <td> '.$amount.' Coins </td>
</center>';
  }
?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
</div>
          <?php include('includes/footer.php'); ?> 