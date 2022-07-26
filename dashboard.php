<?php include('includes/header.php'); ?>  
<title>Dashboard - Admin</title>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Users</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">
  <?php
  $sql = "SELECT * FROM users";
  $query = mysqli_query($conn, $sql);
  echo $count = mysqli_num_rows($query);
  ?>
                          </h2>
                        </div>
                        <h6 class="text-muted font-weight-normal">Since July!</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Total Coins</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">
                          <?php
  $sql = "SELECT * FROM users";
  $query = mysqli_query($conn, $sql);
  while($rows = mysqli_fetch_assoc($query)) {
    @$amount += $rows['balance'];
  }
  echo $amount;
  ?>
                          </h2>
                        </div>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Total Widthdrawl</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php
  $sql = "SELECT * FROM request WHERE status='1'";
  $query = mysqli_query($conn, $sql);
  while($rows = mysqli_fetch_assoc($query)) {
    @$main_amount += $rows['amount'];
  }
  echo $main_amount;
  ?> RTN</h2>
                        </div>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Transfer Request's</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> #ID </th>
                            <th> Player Name </th>
                            <th> Balance </th>
                            <th> Date Time </th>
                            <th> Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
<?php
  $query = "SELECT * FROM request ORDER BY id LIMIT 10";
  $sql = mysqli_query($conn, $query);
  while($row = mysqli_fetch_assoc($sql)) {
    $id = $row['id'];
    $email = $row['email'];
    $date = $row['date'];
    $amount = $row['amount'];
    $status = $row['status'];
    if($status == "0") {
      $final_status = '<div class="badge badge-outline-warning">Pending</div>';
    } else if($status == "1") {
      $final_status = '<div class="badge badge-outline-success">Completed</div>';
    }
    echo '                        <tr>
    <td> #'.$id.' </td>
    <td>
      <span class="pl-2">'.$email.'</span>
    </td>
    <td> '.$amount.' RTN </td>
    <td> '.$date.' </td>
    <td>
      '.$final_status.'
    </td><center>
    <th><a href="action.php?uid='.$id.'"><button class="btn btn-primary">&nbsp;<i class="mdi mdi-folder-open"></i></button></th></a>
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