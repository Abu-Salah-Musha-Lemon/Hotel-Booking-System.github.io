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
          if(isset($_GET['seen'])){
          $frm_data = filtration($_GET);
          if ($frm_data['seen'] == 'all') {
            $q = "UPDATE `user_query` SET `sr_no` = ?";
            $value = [1];
            $res = update($q, $value, 'i');
            if ($res) {
              alert('success','Read all file');
            }else {
              alert('error', 'Operating failed');
            }
          }else {
            $q = "UPDATE `user_query` SET `db_seen`=? WHERE `sr_no` = ?";
            $value = [1,$frm_data['seen']];
            $res = update($q, $value, 'ii');
            if ($res) {
              alert('success','Read file');
            }else {
              alert('error', 'Operating failed');
            }
            }
          }
          if(isset($_GET['del'])){
              $frm_data = filtration($_GET);
            if ($frm_data['del']== 'all') {
                $del = $_GET['del'];
                $q = "DELETE FROM `user_query`";
                // $value = [1,$frm_data['del']];
                // $res = update($q, $value, 'ii');
                $res = mysqli_query($con, $q);
                if ($res) {
                  alert('success','Delete all  item ');
                }else {
                  alert('error', 'Operating failed');
                }
              }
              else {
                $del = $_GET['del'];
                $q = "DELETE FROM `user_query` WHERE `sr_no` = {$del}";
                // $value = [1,$frm_data['del']];
                // $res = update($q, $value, 'ii');
                $res = mysqli_query($con, $q);
                if ($res) {
                  alert('success','Delete item ');
                }else {
                  alert('error', 'Operating failed');
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

  <script>
      let general_data, contacts_data;
      let general_s_form = document.querySelector('.general_s_form'); 
      let contacts_s_form = document.querySelector('.contacts_s_form'); 
      let site_title_inp = document.getElementById('site_title_inp');
      let site_about_inp = document.getElementById('site_about_inp');

      let teams_s_from = document.querySelector(".teams_s_form");
      let member_name_inp= document.getElementById("member_name_inp")
      let member_picture_inp= document.getElementById("member_picture_inp")
      
      general_s_form.addEventListener('submit',function(e){
        e.preventDefault()
        upd_general(site_title_inp.value, site_about_inp.value)
      })

    function get_general() {
      let site_title = document.getElementById('site_title');
      let site_about = document.getElementById('site_about');
      let site_shutdown_toggle = document.getElementById('shutdown_toggle');
      let xhr = new XMLHttpRequest();

      xhr.open('POST', "ajax/setting_crud.php", true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onload = function() {
        general_data = JSON.parse(this.responseText);
        site_title.innerText = general_data.site_title_db;
        site_about.innerText = general_data.site_about_db;

        site_title_inp.value = general_data.site_title_db;
        site_about_inp.value = general_data.site_about_db;

        if (general_data.shutdown_db == 0) {
          site_shutdown_toggle.checked = false;
          site_shutdown_toggle.value = 0;
        } else {
          site_shutdown_toggle.checked = true;
          site_shutdown_toggle.value = 1;
        }
      }
      xhr.send('get_general')
    }

    function upd_general(site_title_inp_val, site_about_inp_val) {
      let xhr = new XMLHttpRequest();

      xhr.open('POST', "ajax/setting_crud.php", true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
      let myModal = document.getElementById('general_s')
      let modal = bootstrap.Modal.getInstance(myModal)
      modal.hide()
      console.log(this.responseText);
      if (this.responseText == 1) {
        alert('success', 'changes save!')
        get_general()
      } else {
        alert('error', 'No changes made!')
      }
      xhr.onload = function() {
        console.log(this.responseText);
      }

      xhr.send('site_title_inp=' + site_title_inp_val + '&site_about_inp=' + site_about_inp_val + '&upd_general')
    }

    function upd_shutdown(val) {
      let xhr = new XMLHttpRequest();

      xhr.open('POST', "ajax/setting_crud.php", true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onload = function() {
          if (this.responseText == 1 && general_data.shutdown_db == 0 ) {
          alert('success', ' Site has been  Shutdown!')
        } else {
          alert('Success', 'Shutdown off successfully !')
        }
        get_general()
        
      }

      xhr.send('upd_shutdown='+val)
    }

    // contacts data setting 

    function get_contacts() {

      let contacts_p_id = ['address', 'gmap', 'pn1','pn2','email','fb','insta', 'tw']
      let iframe = document.getElementById('iframe')

      let xhr = new XMLHttpRequest();

      xhr.open('POST', "ajax/setting_crud.php", true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onload = function() {
        contacts_data = JSON.parse(this.responseText);
        contacts_data = Object.values(contacts_data)
        // console.log(contacts_data.length)
        for (let i = 0; i < contacts_data.length-2; i++) {
          
          document.getElementById(contacts_p_id[i]).innerHTML = contacts_data[i+1];
          
          contacts_inp(contacts_data)
        }

        iframe.src = contacts_data[9]; 
      }
      xhr.send('get_contacts')
    }

    function contacts_inp(data){
        let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp','pn2_inp','email_inp','fb_inp','insta_inp', 'tw_inp','iframe_inp']
        for(let i=0;i<contacts_inp_id.length;i++){
          // console.log(contacts_inp_id.values = data[i+1]);
          document.getElementById(contacts_inp_id[i]).value = data[i+1]
        }
    }
    contacts_s_form.addEventListener('submit',function(e){
        e.preventDefault()
        upd_contacts()
      })


    function upd_contacts(){
      let index = ['address','gmap', 'pn1','pn2','email','fb','insta', 'tw','iframe']
      let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp','pn2_inp','email_inp','fb_inp','insta_inp', 'tw_inp','iframe_inp']
      let data_str = ''
      for(let i =0; i<index.length;i++){
        data_str+=  index[i] +'='+document.getElementById(contacts_inp_id[i]).value +'&'
      } 
      data_str+='upd_contacts';
      // console.log(data_str)

      let xhr = new XMLHttpRequest();
      xhr.open('POST', "ajax/setting_crud.php", true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onload = function() { 
            // module hidden  
            let myModal = document.getElementById('contracts_s')
            let modal = bootstrap.Modal.getInstance(myModal)
            modal.hide()
              // console.log(this.responseText);
                if (this.responseText == 1 ) {
                alert('success', ' Data insert successfully!')
                get_contacts()
              }
              else {
                
                alert('error', 'no change !')
              }  
      }
      xhr.send(data_str)
    }

    // members 
    teams_s_from.addEventListener('submit',function(e){
      e.preventDefault()
      add_member()
    })

    // function add_member() {

    //   let data = new FormData();
    //   data.append('name', member_name_inp.value);
    //   data.append('picture', member_picture_inp.files[0]);
    //   data.append('add_member', ' ');

    //   let xhr = new XMLHttpRequest();
    //   xhr.open('POST', "ajax/setting_crud.php", true);
    //   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //   xhr.onload = function() {
    //     // try {
    //           // const response = JSON.parse(this.responseText);
    //           let myModal = document.getElementById('teams_s');
    //           let modal = bootstrap.Modal.getInstance(myModal);
    //           modal.hide();
    //           console.log(this.responseText);
    //           if (this.responseText == 'inv_size') {
    //             alert('error', 'The image is larger than 2MB!');
    //           } else if (this.responseText == 'inv_img') {
    //             alert('error', 'The image format is invalid!');
    //           } else if (this.responseText == 'upd_failed') {
    //             alert('error', 'Failed to upload');
    //           } else {
    //             alert('success', 'Upload successful!');
    //           }
    //           console.log(data);
    //             xhr.send(data);
    //     //     }
           
    //     //  catch (error) {
    //     //   console.error("Error parsing JSON:", error);
    //     //   // Handle the error or response gracefully
    //     // }
    //   }
    // }

    function add_member(){
      let data = new FormData()
      data.append('name',member_name_inp.value)
      data.append('picture', member_picture_inp.files[0]);
      data.append('add_member', '')
      
      let xhr = new XMLHttpRequest();
      xhr.open('POST', "ajax/setting_crud.php", true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onload = function() { 
            // module hidden  
            let myModal = document.getElementById('teams_s')
            let modal = bootstrap.Modal.getInstance(myModal)
            modal.hide()
              // console.log(this.responseText);
                if (this.responseText == 'inv_size' ) {
                alert('error', 'The image is larger the 2MB!')
              }else if(this.responseText == 'inv_img'){
                alert('error', 'The image is formate invalid !')
              }else if(this.responseText == 'upd_failed'){
                alert('error','failed to upload')}
              else{alert('success', 'upload successfully !') }
      }
      xhr.send(data)

    }
    window.onload = function() {
      get_general()
      get_contacts()
      // add_member()
    }

  </script>
</body>

</html>