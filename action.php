<?php include('includes/header.php');
echo $uid = @$_GET['uid'];
$query = "SELECT * FROM request WHERE id='$uid'";
$sql = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($sql)) {
    $date = $row['date'];
    $email = $row['email'];
    $amount = $row['amount'];
    $status = $row['status'];
    $wallet_address = $row['wallet_address'];
    $chain = $row['chain'];
    if($status == "0") {
        $final_status = '<div class="badge badge-outline-warning">Pending</div>';
      } else if($status == "1") {
        $final_status = '<div class="badge badge-outline-success">Completed</div>';
      } else if($status == "2") {
        $final_status = '<div class="badge badge-outline-danger">Rejected</div>';
      }
}
?>
<title>Wallet Widthdraw - <?php echo $email; ?> - Admin</title>
<!-- partial -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Transaction History</h4>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Date</h6>
                        <p class="text-muted mb-0">26th August 2012</p>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Email - Username</h6>
                        <p class="text-muted mb-0">sidhuroh@outlook.com</p>
                      </div>
                    </div>

                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Amount</h6>
                        <p class="text-muted mb-0">100 RTN</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <?php echo $final_status ?>
                      </div>
                    </div>
                    <br>
                    <?php if($status == "0") {?>
                    <button data-toggle="modal" data-target="#exampleModalLong" class="btn btn-success btn-block"><div style='padding: 10px;'>Approve <i class='mdi mdi-checkbox-marked-circle'></i></div></button>
                    <?php
if (isset($_POST['reject_req'])) {
    $query3 = "UPDATE `request` SET `status`='2' WHERE id='$uid'";
    $sql3 = mysqli_query($conn, $query3);
    echo "<meta http-equiv=\"refresh\" content=\"0; url=action.php?uid=$uid\">";
    exit();
}
                    ?>
                    <br>
                    <form action='action.php?uid=<?php echo $uid;?>' method='POST'>
                    <button type="submit" name="reject_req" class="btn btn-danger btn-block"><div style='padding: 10px;'>Reject <i class='mdi mdi-close-circle'></i></div></button>
                    </form>
                        <?php
                    } else {};
                        ?>
                </div>
                </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Remarks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
        $remarks_text = @$_POST['remarks_text'];
        if (isset($_POST['remarks'])) {
            $query = "INSERT INTO `remarks`(`id`, `body`, `connection`) VALUES (null,'$remarks_text','$uid')";
            $sql = mysqli_query($conn, $query);
            
            $query2 = "UPDATE `request` SET `status`='1' WHERE id='$uid'";
            $sql2 = mysqli_query($conn, $query2);

            echo "<meta http-equiv=\"refresh\" content=\"0; url=action.php?uid=$uid\">";
            exit();
        }
      ?>
      <form action='action.php?uid=<?php echo $uid;?>' method='POST'>
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Remarks *</label>
            <textarea type="text" class="form-control" name="remarks_text" id="recipient-name" required="required" style="color: #fff;"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class='mdi mdi-close-circle'></i></button>
        <button type="submit" name="remarks" class="btn btn-primary">Approve <i class='mdi mdi-checkbox-marked-circle'></i></button>
</form>  
    </div>
    </div>
  </div>
</div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">User Withdraw Information</h4>
                      <p class="text-muted mb-1">Your data status</p>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                          <div class="preview-item">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-primary">
                                <i class="mdi mdi-file-document"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Wallet Address</h6>
                                <p class="text-muted mb-0"><?php echo $wallet_address; ?></p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-success">
                                <i class="mdi mdi-cloud-download"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Chain</h6>
                                <p class="text-muted mb-0"><?php echo $chain; ?></p>
                              </div>
                            </div>
                          </div>
                          <br>
                          <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Remarks</h4>
                    </div>
                    <?php
                        $query = "SELECT * FROM remarks WHERE connection='$uid' ORDER BY id DESC";
                        $sql = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($sql)) {
                            $body = $row['body'];
                            echo '<div class="preview-item border-bottom">
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Admin</h6>
                                <p class="text-muted mb-0">'.$body.'</p>
                              </div>
                            </div>
                          </div>';
                        }
                    ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php include('includes/footer.php'); ?> 