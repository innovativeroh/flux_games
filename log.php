<?php include('includes/header.php'); ?>
<?php
$log_no = "0";
$text = "Pending";
$text_status = '<div class="badge badge-outline-warning">Pending</div>';
$status = @$_GET['status'];
if($status == "pending") {
    $log_no = "0";
    $text = "Pending";
$text_status = '<div class="badge badge-outline-warning">Pending</div>';
} else if ($status == "approved") {
    $log_no = "1";
    $text = "Completed";
$text_status = '<div class="badge badge-outline-success">Completed</div>';
} else if ($status == "rejected") {
    $log_no = "2";
    $text = "Rejected";
$text_status = '<div class="badge badge-outline-danger">Rejected</div>';
}
?>
<title>Dashboard - Admin</title>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $text; ?> Log &nbsp;<?php echo $text_status ?></h4>
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
  $query = "SELECT * FROM request WHERE status='$log_no' ORDER BY id LIMIT 10";
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
    } else if($status == "2") {
      $final_status = '<div class="badge badge-outline-danger">Rejected</div>';
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