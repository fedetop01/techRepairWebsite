<?php include('manageCookie.php'); ?>
<div class="cookie"><p>This website uses cookies to provide you with the best possible browsing experience.
By clicking "Accept," you consent to the use of cookies.
These cookies are essential for the operation of the website and help us analyze site traffic,
personalize content, and improve the overall user experience. Additionally,
third-party cookies may be used for targeted advertising purposes.
However, please note that blocking some types of cookies may impact your experience on the site and the services we are able to offer.
For more information about how we use cookies and your rights regarding your personal data, please review our <a href="#">Privacy Policy</a>.
</p>

  <button id="acceptBtn">
    <span class="circle1"></span>
    <span class="circle2"></span>
    <span class="circle3"></span>
    <span class="circle4"></span>
    <span class="circle5"></span>
    <span class="text accept">Accept all</span>
  </button>
  <button id="discardBtn">
    <span class="circle1"></span>
    <span class="circle2"></span>
    <span class="circle3"></span>
    <span class="circle4"></span>
    <span class="circle5"></span>
    <span class="text discard">Discard all</span>
  </button>

</div>
<script type="text/javascript">
// Aggiungi un evento click
document.getElementById("acceptBtn").addEventListener("click", function() {
  // Imposta un cookie per indicare l'accettazione
  document.cookie = "cookie_accepted=1";
  // Nascondi il div dei cookie
  document.querySelector(".cookie").style.display = "none";
  document.getElementById("log").style.display = "block";

});


  document.getElementById("discardBtn").addEventListener("click", function() {
  // Imposta un cookie per indicare il rifiuto
  document.cookie = "cookie_accepted=0";
  // Nascondi il div dei cookie
  document.querySelector(".cookie").style.display = "none";
  document.getElementById("log").style.display = "none";

});
</script>
