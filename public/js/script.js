function initMap(){
  var options = {
    center: { lat: 23.733850,lng:92.716722 },
    zoom: 8
  }

  map = new google.maps.Map(document.getElementById("map"),options)
} 