<?php
require_once '../inc/config.php';
require_once '../inc/essential.php';
adminLogin();


//  add Features 
// if (isset($_POST['add_rooms'])) {
//    $facilities = filtration(json_decode('facilities'));
//    $features = filtration(json_decode('features'));

//   $frm_data = filtration($_POST); // Assuming filtration function is defined
//   $q = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `child`, `desc`) VALUES (?,?,?,?,?,?)";
//   $value = [$frm_data['name'],$frm_data['area'],$frm_data['price'],$frm_data['quantity'],$frm_data['adult'],$frm_data['children'],$frm_data['desc']];

//   $flag = 0;
//    if (insert($q, $value,'siiiiis')) {
//       $flag = 1;
//    }

//    mysqli_insert_id($con);
//    $q2="INSERT INTO `rooms_facilities`(`rooms_id`, `facilities_id`) VALUES (?,?)";

//    if ($stmt = mysqli_prepare($con,$q2)) {
//       foreach($features as $f){
//       mysqli_stmt_bind_param($stmt, 'ii',$room_id,$f);
//       mysqli_stmt_execute($stmt);
//    }
//    mysqli_stmt_close($stmt);
//    }
//    else{
//       $flag = 0;
//       die('query cannot be prepared -insert failed');
//    }
//    $q3="INSERT INTO `rooms_facilities`(`rooms_id`, `facilities_id`)   VALUES (?,?)";

//    if ($stmt = mysqli_prepare($con,$q3)) {
//       foreach($facilities as $f){
//       mysqli_stmt_bind_param($stmt, 'ii',$room_id,$f);
//       mysqli_stmt_execute($stmt);
//    }
//    mysqli_stmt_close($stmt);
//    }
//    else{
//       $flag = 0;
//       die('query cannot be prepared -insert failed');
//    }
//    if ($flag) {
//       echo 1;
//    } else {
//       echo 0;
//    }
   

// }

if (isset($_POST['add_rooms'])) {            
            $facilities = filtration(json_decode($_POST['facilities']));
            $features = filtration(json_decode($_POST['features']));

            $frm_data = filtration($_POST);
            $q = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `child`, `desc`) VALUES (?,?,?,?,?,?,?)";
            $value = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'], $frm_data['adult'], $frm_data['children'], $frm_data['desc']];

            $flag = 0;
            if (insert($q, $value, 'siiiiis')) {
               $flag = 1;
               $room_id = mysqli_insert_id($con); // Retrieve the last inserted ID
            } else {
               echo 0; // Failed to insert into rooms table
               exit;
            }

            // // rooms& features 
            // $q2 = "INSERT INTO `rooms_facilities`(`rooms_id`, `facilities_id`) VALUES (?,?)";

            // if ($stmt = mysqli_prepare($con, $q2)) {
            //    foreach ($features as $f) {
            //       mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
            //       mysqli_stmt_execute($stmt);
            //    }
            //    mysqli_stmt_close($stmt);
            // } else {
            //    $flag = 0;
            //    echo 0; // Failed to prepare query for features
            //    exit;
            // }

            $q2 = "INSERT INTO `rooms_facilities`(`rooms_id`, `facilities_id`) VALUES (?, ?)";

               if ($stmt = mysqli_prepare($con, $q2)) {
                  foreach ($features as $f) {
                     mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
                     if (!mysqli_stmt_execute($stmt)) {
                           $flag = 0;
                           echo "Error executing query for features: " . mysqli_stmt_error($stmt);
                           exit;
                     }
                  }
                  mysqli_stmt_close($stmt);
               } else {
                  $flag = 0;
                  echo "Error preparing query for features: " . mysqli_error($con);
                  exit;
               }


         // rooms & facilities
            $q3 = "INSERT INTO `rooms_features`(`rooms_id`, `features_id`) VALUES (?,?)";

            if ($stmt = mysqli_prepare($con, $q3)) {
               foreach ($facilities as $f) {
                  mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
                  mysqli_stmt_execute($stmt);
               }
               mysqli_stmt_close($stmt);
            } else {
               $flag = 0;
               echo 0; // Failed to prepare query for facilities
               exit;
            }

            if ($flag) {
               echo 1; // Successfully inserted into all tables
            } else {
               echo 0; // Failed to insert into one of the tables
            }
}

// if (isset($_POST['add_rooms'])) {
//    $facilities = filtration(json_decode($_POST['facilities']));
//    $features = filtration(json_decode($_POST['features']));

//    $frm_data = filtration($_POST);
//    $q = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `child`, `desc`) VALUES (?,?,?,?,?,?,?)";
//    $value = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'], $frm_data['adult'], $frm_data['children'], $frm_data['desc']];

//    $flag = 0;
//    if (insert($q, $value, 'siiiiis')) {
//        $flag = 1;
//        $room_id = mysqli_insert_id($con); // Retrieve the last inserted ID
//    } else {
//        echo 0; // Failed to insert into rooms table
//        exit;
//    }

//    $q2 = "INSERT INTO `rooms_facilities`(`rooms_id`, `facilities_id`) VALUES (?,?)";

//    if ($stmt = mysqli_prepare($con, $q2)) {
//        foreach ($features as $f) {
//            mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
//            if (!mysqli_stmt_execute($stmt)) {
//                echo "Error executing query: " . mysqli_stmt_error($stmt);
//                $flag = 0;
//                break;
//            }
//        }
//        mysqli_stmt_close($stmt);
//    } else {
//        $flag = 0;
//        echo "Error preparing query for features: " . mysqli_error($con);
//    }

//    $q3 = "INSERT INTO `rooms_facilities`(`rooms_id`, `facilities_id`) VALUES (?,?)";

//    if ($stmt = mysqli_prepare($con, $q3)) {
//        foreach ($facilities as $f) {
//            mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
//            if (!mysqli_stmt_execute($stmt)) {
//                echo "Error executing query: " . mysqli_stmt_error($stmt);
//                $flag = 0;
//                break;
//            }
//        }
//        mysqli_stmt_close($stmt);
//    } else {
//        $flag = 0;
//        echo "Error preparing query for facilities: " . mysqli_error($con);
//    }

//    mysqli_close($con); // Close the database connection

//    if ($flag) {
//        echo 1; // Successfully inserted into all tables
//    } else {
//        echo 0; // Failed to insert into one of the tables
//    }
// }



// if(isset($_POST['get_features'])){
//    $res = selectAll('features');
//    $i =1;
//    while ($row = mysqli_fetch_assoc($res)) {
//       echo <<<data

//          <tr class="alight-middle">
//             <td>$i</td>
//             <td>$row[db_fea_name]</td>
//             <td>
//                <button type="button" onclick='rem_feature($row[sr_no])' class="btn btn-danger btn-sm shadow-none"><i class="bi bi-trash3"></i></button>
//             </td>
//          </tr>
       
//       data;
//     $i++ ;
//    }
// }

// if (isset($_POST['rem_feature'])) {
//    $frm_data = filtration($_POST);
//    $value = [$frm_data['rem_feature']];

//    $pre_Q = "DELETE FROM `features` WHERE `sr_no` = ?";
//    echo $pre_Q;
//    $res = delete($pre_Q, $value, 'i');
//    echo $res;
// }

// //  add facilities
// if (isset($_POST['add_facilities'])) {
//    $frm_data = filtration($_POST); // Assuming filtration function is defined
 
//    $img_re = uploadSVGImage($_FILES['icon'], FACILITIES_US);
 
//    if ($img_re == 'inv_img') {
//       echo $img_re;
//    } else if ($img_re == 'inv_size') {
//       echo $img_re;
//    } else if ($img_re == 'upd_failed') {
//       echo $img_re;
//    } else {
//       // do not use colon in the question mark sine
//       $q = "INSERT INTO `facilities`(`db_name`, `db_icon`, `db_desc`) VALUES (?,?,?)";
//       $value = [$frm_data['name'], $img_re,$frm_data['desc']];
//       $res = insert($q, $value, 'sss');
//       echo $res;
//    }
// }
 
// if(isset($_POST['get_facilities'])){
//    $res = selectAll('facilities');
//    $path = FACILITIES_IMG_PATH;
//    $i=1;
//    while ($row = mysqli_fetch_assoc($res)) {
//       echo <<<data
//          <tr>
//             <td>$i</td>
//             <td>$row[db_name]</td>
//             <td><img src="$path$row[db_icon]" style="width:50px;height:50px" class="card-img"></td>
//             <td>$row[db_desc]</td>
//             <td>
//                <button type="button" onclick='rem_facilities($row[sr_no])' class="btn btn-danger btn-sm shadow-none"><i class="bi bi-trash3"></i></button>
//             </td>
//          </tr>
//       data;
//    $i++;
//    }
// }
  
// if (isset($_POST['rem_facilities'])) {
//    $frm_data = filtration($_POST);
//    $value = [$frm_data['rem_facilities']];
//    $pre_Q = " SELECT * FROM `facilities` WHERE `sr_no` = ?";
//    $res = select($pre_Q, $value,'i');
//    $img = mysqli_fetch_assoc($res);
//    if (deleteImage($img['db_icon'],FACILITIES_US)) {
//       $q = "DELETE FROM `facilities` WHERE `sr_no`=?";
//       $res = delete($q,$value,'i');
//       echo $res;
//    }else{ echo 0;}
// }
 

















