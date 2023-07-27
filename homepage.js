

function openVideo(url){
  // Costruire l'URL completo i
  var videoURL = 'videoplayer.php?url=' + url;
  //encodeURIComponent(url);

  //  reindirizzamento alla pagina specificata
  window.location.href = videoURL;

}

function startBooking(code){
  var url = 'booking.php?code='+code;
  window.location.href = url;

}
