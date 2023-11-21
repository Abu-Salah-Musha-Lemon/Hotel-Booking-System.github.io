// Feature 
let features_s_form = document.querySelector(".features_s_form");

features_s_form.addEventListener('submit',function(e){
e.preventDefault()
add_feature()
})

function add_feature() {
      let data = new FormData();

      data.append('name', features_s_form.elements['features_name'].value);
      data.append('add_features', '');

      let xhr = new XMLHttpRequest();
      xhr.open('POST', "ajax/features_facilities_crud.php", true);

      xhr.onload = function () {

        // module hidden  
          let myModal = document.getElementById('features_s')
          let modal = bootstrap.Modal.getInstance(myModal)
          modal.hide()
          
            // console.log(this.responseText);
              if (this.responseText == 1 ) {
                alert('success', 'upload successfully !');
                features_s_form.elements['features_name'].value = '' 
              get_features();
            }else{
              alert('error','failed to upload')
            }
      }
      xhr.send(data);
}

function get_features(){

    let xhr = new XMLHttpRequest();
    xhr.open('POST', "ajax/features_facilities_crud.php", true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
          document.getElementById('features_data').innerHTML = this.responseText;
        }
        xhr.send('get_features')
}

function rem_feature(val){
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "ajax/features_facilities_crud.php", true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    console.log(this.responseText);
    xhr.onload = function () {
        console.log(this.responseText);
        if (this.responseText ==1) {
          alert('error', 'Failed to remove feature or server error!');
        } 
        else {
            alert('success', 'Feature removed!');
            get_features();

        }
      }

    xhr.send('rem_feature='+val)
}

// Facilities section

let facilities_s_form = document.querySelector(".facilities_s_form");

facilities_s_form.addEventListener('submit',function(e){
e.preventDefault()
add_facilities()
})


function add_facilities() {
      let data = new FormData();

      data.append('name', facilities_s_form.elements['facilities_name'].value);
      data.append('icon', facilities_s_form.elements['facilities_icon'].files[0]);
      data.append('desc', facilities_s_form.elements['facilities_desc'].value);
      data.append('add_facilities', '');

      let xhr = new XMLHttpRequest();
      xhr.open('POST', "ajax/features_facilities_crud.php", true);

      xhr.onload = function () {

        // module hidden  
          let myModal = document.getElementById('facilities_s')
          let modal = bootstrap.Modal.getInstance(myModal)
          modal.hide()

          console.log(this.responseText);
              if (this.responseText == 'inv_size' ) {
                alert('error', 'The image is larger the 2MB!')
              }else if(this.responseText == 'inv_img'){
                alert('error', 'Only svg image is allow !')
              }else if(this.responseText == 'upd_failed'){
                alert('error','failed to upload')}
              else{
                alert('success', 'upload successfully !'); 
                features_s_form.reset();
                get_facilities();
              }
      }
      console.log(data);
      xhr.send(data);
}

function get_facilities(){

    let xhr = new XMLHttpRequest();
    xhr.open('POST', "ajax/features_facilities_crud.php", true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        xhr.onload = function() {
          document.getElementById('facilities_data').innerHTML = this.responseText;
        }
        xhr.send('get_facilities')
}

function rem_facilities(val){

    let xhr = new XMLHttpRequest();
        xhr.open('POST', "ajax/features_facilities_crud.php", true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

        console.log(this.responseText);
        xhr.onload = function () {
            console.log(this.responseText);
            if (this.responseText ==1) {
              alert('error', 'Failed to remove feature or server error!');
            } 
            else {
                alert('success', 'Feature removed!');
                get_facilities();

            }
          }

        xhr.send('rem_facilities='+val)
}

window.onload= function() {
    get_features();
    get_facilities()
}
