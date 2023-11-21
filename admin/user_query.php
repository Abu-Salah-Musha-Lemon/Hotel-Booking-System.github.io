<?php
require_once './inc/essential.php';
require_once './inc/config.php';
adminLogin();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - User Query </title>
  <?php require_once './inc/link.php' ?>
</head>

<body class="bg-light">
  <?php require_once("inc/header.php"); ?>


  <div class="col-lg-10 ms-auto p-4 overflow-hidden">
    <div class="container-fluit" id="main-content">
      <div class="row">
        <h3 class="mb-4">User Query</h3>
          <?php
              // if(isset($_GET['seen'])){
              // $frm_data = filtration($_GET);
              // if ($frm_data['seen'] == 'all') {
              //   $q = "UPDATE `user_query` SET `sr_no` = ?";
              //   $value = [$frm_data];
              //   $res = update($q, $value, 'i');
              //   if ($res) {
              //     alert('success','Read all file');
              //   }else {
              //     alert('error', 'Operating failed');
              //   }
              // }else {
              //   $q = "UPDATE `user_query` SET `db_seen`=? WHERE `sr_no` = ?";
              //   $value = [1,$frm_data['seen']];
              //   $res = update($q, $value, 'ii');
              //   if ($res) {
              //     alert('success','Read file');
              //   }else {
              //     alert('error', 'Operating failed');
              //   }
              //   }
              // }
              // if(isset($_GET['del'])){
              //     $frm_data = filtration($_GET);
              //       if ($frm_data['del']== 'all') {
              //       // $del = $_GET['del'];
              //       // $q = "DELETE FROM `user_query`";
              //       // // $value = [1,$frm_data['del']];
              //       // // $res = update($q, $value, 'ii');
              //       // $res = mysqli_query($con, $q);
              //       // if ($res) {
              //       //   alert('success','Delete all  item ');
              //       // }else {
              //       //   alert('error', 'Operating failed');
              //       // }
              //     }
              //     else {
              //       $del = $_GET['del'];
              //       $q = "DELETE FROM `user_query` WHERE `sr_no`=?";
              //       $value = [$frm_data['del']];
              //       $res = update($q, $value, 'i');
                    
              //         if (delete($q,$value,'i')) {
              //           alert('error', 'Operating failed');
              //         }else {
              //           alert('success','Delete item ');
              //         }
              //       }
              // }

              if (isset($_GET['seen'])) {
                $frm_data = filtration($_GET);
            
                if ($frm_data['seen'] == 'all') {
                    // "See all" case
                    $q = "UPDATE `user_query` SET `db_seen` =?";
                    $value = [1];
                    $res = update($q,$value, 's');  // Assuming update function handles the query
                    if ($res) {
                        alert('success', 'Read all files');
                    } else {
                        alert('error', 'Operation failed');
                    }
                } else {
                    // Update individual case
                    $q = "UPDATE `user_query` SET `db_seen` = ? WHERE `sr_no` = ?";
                    $value = [1, $frm_data['seen']];
                    $res = update($q, $value, 'ii');
                    if ($res) {
                        alert('success', 'Read file');
                    } else {
                        alert('error', 'Operation failed');
                    }
                }
            }
            
            if (isset($_GET['del'])) {
                $frm_data = filtration($_GET);
            
                if ($frm_data['del'] == 'all') {
                    // "Delete all" case
                    $q = "DELETE FROM `user_query`";
                   
                    if (mysqli_query($con,$q)) {
                        alert('success', 'Delete all items');
                    } else {
                        alert('error', 'Operation failed');
                    }
                } else {
                    // Delete individual case
                    $q = "DELETE FROM `user_query` WHERE `sr_no` = ?";
                    $value = [$frm_data['del']];
                    $res = update($q, $value, 'i');
                    if ($res) {
                        alert('success', 'Delete item');
                    } else {
                        alert('error', 'Operation failed');
                    }
                }
            }
            

          
          ?>
        <div class="card rounded shadow-sm mb-4">
          <div class="card-body">
            <div class="text-end mb-4">
                <a href='?seen=all' class='btn btn-sm btn-success mx-2 '><i class='bi bi-bookmark-check-fill '></i></a>"
                <a href='?del=all' class='btn btn-sm btn-danger '><i class='bi bi-trash3'></i></a>"
            </div>
            <div class="table-responsive-md overflow-y:scrollbar" style="height:400px">
            <table class="table table-hover">
                <thead class="thead-dark sticky-top">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $q = "SELECT * FROM `user_query` ORDER BY `sr_no`DESC;";
                    $res = mysqli_query($con, $q);
                    
                   
                    while ($row = mysqli_fetch_assoc($res)) { 
                      $seen = '';
                      if ($row['db_seen']!=1) {
                        $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm btn-success mx-2 '><i class='bi bi-bookmark-check-fill '></i></a>";
                    }
                    $seen.="<a href='?del=$row[sr_no]' class='btn btn-sm btn-danger '><i class='bi bi-trash3'></i></a>";
                      echo <<< query

                              <tr>
                                <td>$row[sr_no]</td>
                                <td>$row[db_name]</td>
                                <td>$row[db_email]</td>
                                <td>$row[db_subject]</td>
                                <td>$row[db_message]</td>
                                <td>$row[db_date]</td>
                                <td>$seen</td>
                              </tr>

                      query;
                    }
                  
                  ?>
                </tbody>
              </table>
              </table>
            </div>
        </div>
        
        <?php //echo $_SERVER['DOCUMENT_ROOT'];?>

      </div>
    </div>
  </div>
  <?php require_once './inc/script.php' ?>


</body>

</html>