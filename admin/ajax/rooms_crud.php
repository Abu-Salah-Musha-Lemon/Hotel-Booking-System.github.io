<?php
require_once '../inc/config.php';
require_once '../inc/essential.php';
adminLogin();

if (isset($_POST['add_rooms'])) {
      $facilities = json_decode($_POST['facilities']);
      $features = json_decode($_POST['features']);

      $frm_data = filtration($_POST); // Assuming filtration function is defined
   $q = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `child`, `desc`) VALUES (?,?,?,?,?,?,?)";
   $value = [$frm_data['name'],$frm_data['area'],$frm_data['price'],$frm_data['quantity'],$frm_data['adult'],$frm_data['children'],$frm_data['desc']];

   if (insert($q, $value, 'siiiiis')) {
      $flag = 1;
      $room_id = mysqli_insert_id($con); // Retrieve the last inserted ID
   } else {
      echo 0; // Failed to insert into rooms table
      exit;
   }
   // rooms& features 
   $q2 = "INSERT INTO `rooms_facilities`(`rooms_id`, `facilities_id`) VALUES (?,?)";

   if ($stmt = mysqli_prepare($con, $q2)) {
   foreach ($facilities as $f) {
      if (mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f)) {
         // binding successful, proceed to execute
         mysqli_stmt_execute($stmt);
      } else {
         // binding failed, report error
         echo mysqli_stmt_error($stmt);
         exit;
      }
   }
   mysqli_stmt_close($stmt);
   } else {
   $flag = 0;
   echo 0; // Failed to prepare query for features
   exit;
   }

   $q3="INSERT INTO `rooms_features`( `rooms_id`, `features_id`) VALUES  (?,?)";
   if ($stmt = mysqli_prepare($con, $q3)) {
      foreach ($features as $f) {
        if (mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f)) {
          // binding successful, proceed to execute
          mysqli_stmt_execute($stmt);
        } else {
          // binding failed, report error
          echo mysqli_stmt_error($stmt);
          exit;
        }
      }
      mysqli_stmt_close($stmt);
    } else {
      $flag = 0;
      echo 0; // Failed to prepare query for features
      exit;
    }
   

}



if(isset($_POST['get_all_rooms'])){
   $res = selectAll('rooms');
   $i =1;
   $data ="";
   while ($row = mysqli_fetch_assoc($res)) {
      if ($row['status']==1) {
         $status = "<button onclick='toggle_status($row[sr_no],0)' class ='btn btn-dark btn-sm shadow-none'>active</button>";

      } else {
         $status = "<button onclick='toggle_status($row[sr_no],1)' class ='btn btn-warning btn-sm shadow-none'>inactive</button>";
      }
      

    echo"

         <tr class='alight-middle'>
            <td>$i</td>
            <td>$row[name]</td>
            <td>$row[area] sqf</td>

            <td > 
               <span class = 'badge rounded-pill bg-light text-dark'>Adult: $row[adult]</span><br>
               <span class = 'badge rounded-pill bg-light text-dark'>children's: $row[child]</span> 
            </td>
            <td>$ $row[price]</td>
            <td>$row[quantity]</td>
            <td>$status</td>
            
            <td>"?>
            <button type='button' onclick="edit_details(<?php echo $row['sr_no']; ?>)" class='btn btn-outline-dark shadow-none me-lg-3 me-3' 
            data-bs-toggle='modal' data-bs-target='#edit_rooms'>
            <i class='bi bi-pencil-square'>edit</i>
            </button>
            </td>
         </tr>
      <?php
      ;
      
    $i++ ;
   }
   echo $data;
}
if(isset($_POST['get_rooms'])){
   $frm_data = filtration($_POST); 
   $res = select("SELECT * FROM `rooms` WHERE `sr_no`=?",[$frm_data['get_rooms']],'i');
   $res2 = select("SELECT * FROM `rooms_features` WHERE `rooms_id`=?",[$frm_data['get_rooms']],'i');
   $res3 = select("SELECT * FROM `rooms_facilities` WHERE `rooms_id`=?",[$frm_data['get_rooms']],'i');

   $roomData = mysqli_fetch_assoc($res);

   $features  = [];
   $facilities = [];

   if(mysqli_num_rows($res2)>0){
      while($row = mysqli_fetch_assoc($res2)){
         array_push($features,$row['features_id']);
      }
   }

   if(mysqli_num_rows($res3)>0){
      while($row = mysqli_fetch_assoc($res2)){
         array_push($facilities,$row['facilities_id']);
      }
   }

   $data= ["roomData"=>$roomData,"features"=>$features,"facilities"=>$facilities];
   $data = json_encode($data);
   echo $data;

}

// toggle button
if(isset($_POST['toggle_status'])){

      $frm_data = filtration($_POST);
      $q = "UPDATE `rooms` SET `status`=? WHERE `sr_no`=?";
      $value = [$frm_data['value'],$frm_data['toggle_status']];
   if (update($q,$value,'ii')) {
      echo 1;
   }else{
      echo 0;
   }


}
















