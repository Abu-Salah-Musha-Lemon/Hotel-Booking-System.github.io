
let carousel_s_form = document.querySelector(".carousel_s_form");
let carousel_picture_inp= document.getElementById("carousel_picture_inp")


// members 
carousel_s_form.addEventListener('submit',function(e){
e.preventDefault()
add_image()
})


function add_image() {
  let data = new FormData();
  data.append('picture', carousel_picture_inp.files[0]);
  data.append('add_image', '');

  let xhr = new XMLHttpRequest();
  xhr.open('POST', "ajax/carousel_crud.php", true);
  xhr.onload = function () {
      // console.log(this.responseText);
          // module hidden  
            let myModal = document.getElementById('carousel_s')
            let modal = bootstrap.Modal.getInstance(myModal)
            modal.hide()
              // console.log(this.responseText);
                if (this.responseText == 'inv_size' ) {
                alert('error', 'The image is larger the 2MB!')
              }else if(this.responseText == 'inv_img'){
                alert('error', 'The image is formate invalid !')
              }else if(this.responseText == 'upd_failed'){
                alert('error','failed to upload')}
              else{
                alert('success', 'upload successfully !'); 
                get_carousel();
              }
  }
  xhr.send(data);
}

function get_carousel(){

let xhr = new XMLHttpRequest();
xhr.open('POST', "ajax/carousel_crud.php", true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    xhr.onload = function() {
      document.getElementById('carousel_data').innerHTML = this.responseText;
    }
    xhr.send('get_carousel')
}

function rem_image(val){

let xhr = new XMLHttpRequest();
xhr.open('POST', "ajax/carousel_crud.php", true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    xhr.onload = function() {
      // console.log(this.responseText);
      if(this.responseText==1){
        alert('error','Server Down!')
      }else{
        alert('success','Image  removed!')
        get_carousel()
      }
    }
    xhr.send('rem_image='+val)
}


window.onload = function() {

get_carousel()

}

