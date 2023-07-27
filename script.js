
let links = document.querySelectorAll(".links a");
let bodyId = document.querySelector("body").id;
let dropbtn = document.getElementById('profilebtn');


  for (let link of links){
    if(link.dataset.active == bodyId){
      link.classList.add("active");
      if(link.dataset.active == bodyId && (bodyId == "login" || bodyId == "account") ){
        dropbtn.classList.add("active");
      }
    }

}
