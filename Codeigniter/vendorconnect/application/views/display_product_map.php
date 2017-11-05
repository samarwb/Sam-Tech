<div id="header">
    <?php include 'header.php'; ?>
</div>

<div id="body_wrapper">
    <div id="map_wrapper">
         <div id="map_canvas" class="mapping"></div>
    </div>
</div>

<div id="footer">
    <?php include 'footer.php'; ?>
</div>

 <script>
jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "//maps.googleapis.com/maps/api/js?callback=initialize&sensor=false&libraries=places";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    
    var mapOptions = {
        zoom: 18,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };      
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
    
    // Multiple Markers
    var markers = <?php print json_encode($nearby_product); ?>
                        
    // Info Window Content
    
    var content;
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow({
        content: content,
        // Assign a maximum value for the width of the infowindow allows
        // greater control over the various content elements
        maxWidth: 350
    }); 
    var marker, i,j;
    var allMarkers = [];
    var content ;
    // Loop through our array of markers & place each one on the map  
    var inner_content = '';
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i]['latitude'], markers[i]['longitude']);
        bounds.extend(position);
        allMarkers.push([markers[i]['latitude'],markers[i]['longitude']]);
        var title = [];
        var description = [];
        var image = [];
        var pid = [];
        var price = [];
        title.push(markers[i]['pro_name']);
        description.push(markers[i]['pro_description']);
        var file_path = (markers[i]['file_path'] == null)? no_product_image : markers[i]['file_path'];
        image.push(file_path);
        pid.push(markers[i]['pid']);
        price.push(markers[i]['pro_price']);
        if (allMarkers.length != 0) {
            for (j=0; j < allMarkers.length; j++) {
                var pos = new google.maps.LatLng(markers[j], markers[j]);
                if (position.equals(pos)) {
                    title.push(markers[i]['pro_name']);
                    description.push(markers[i]['pro_description']);
                    image.push(markers[i]['file_path']);
                    pid.push(markers[i]['pid']);
                    price.push(markers[i]['pro_price']);
                }

            }
        }
        marker = new google.maps.Marker({
            position: position,
            map: map
        });
        
        content = '<div id="iw-container"><div class="iw-container-inner">';
        for (var key in title) {
            inner_content += '<div class="markar_inner_content">'+
                    '<div class="iw-title">'+title[key]+'</div>' +
                    '<a href="'+base_url + '/product/productview/'+pid[key]+'" target="_blank"><div class="iw-content">' +
                      '<div class="iw-subTitle">Details</div>' +
                      '<img src="'+product_image_directory+image[key]+'" height="115" width="83">' +
                      '<p>'+description[key]+'</p>' +
                      '<div class="iw-subTitle"><span class="product_price">Rs.'+price[key]+'</span><br>'+
                    '</div></div></a>' +'</div>';
        }
          content += inner_content + '</div></div>';        
                  
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(content);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
        google.maps.event.addListener(infoWindow, 'domready', function() {

        // Reference to the DIV which receives the contents of the infowindow using jQuery
        var iwOuter = $('.gm-style-iw');

        /* The DIV we want to change is above the .gm-style-iw DIV.
         * So, we use jQuery and create a iwBackground variable,
         * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
         */
        var iwBackground = iwOuter.prev();

        // Remove the background shadow DIV
        iwBackground.children(':nth-child(2)').css({'display' : 'none'});
        
        // Changes the desired tail shadow color.
        iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': '#e40046 0px 1px 6px', 'z-index' : '1'});

        // Remove the white background DIV
        iwBackground.children(':nth-child(4)').css({'display' : 'none'});
        iwOuter.parent().parent().css({left: '90px'});
        // Moves the shadow of the arrow 76px to the left margin 
        iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

        // Moves the arrow 76px to the left margin 
        iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
        // Taking advantage of the already established reference to
        // div .gm-style-iw with iwOuter variable.
        // You must set a new variable iwCloseBtn.
        // Using the .next() method of JQuery you reference the following div to .gm-style-iw.
        // Is this div that groups the close button elements.
        var iwCloseBtn = iwOuter.next();

        // Apply the desired effect to the close button
        iwCloseBtn.css({
          opacity: '1', // by default the close button has an opacity of 0.7
          right: '60px', top: '3px', // button repositioning
          border: '7px solid #e40046', // increasing button border and new color
          'border-radius': '13px', // circular effect
          'box-shadow': '0 0 15px #e40046' // 3D effect to highlight the button
          });

        // The API automatically applies 0.7 opacity to the button after the mouseout event.
        // This function reverses this event to the desired value.
        iwCloseBtn.mouseout(function(){
          $(this).css({opacity: '1'});
        });

     });
    }
    
    

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
    
    
}
</script>

<style>
#map_canvas {
    margin: 0;
    padding: 0;
    height: 100%;
    max-width: none;
}
#map-canvas img {
    max-width: none !important;
}
.gm-style-iw {
    width: 300px !important;
    top: 15px !important;
    left: 0px !important;
    background-color: #fff;
    box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
    border: 1px solid #e40046;
    border-radius: 2px 2px 10px 10px;
}
#iw-container {
    margin-bottom: 10px;
    width: 300px !important;
    height: 160px!important;
}
.iw-container-inner{
    width: 100%;
    overflow-y: scroll;
    overflow-x: hidden;
}
#iw-container .iw-title {
    font-size: 18px;
    font-weight: 400;
    padding: 10px;
    background-color: #e40046;
    color: white;
    margin: 0;
    border-radius: 2px 2px 0 0;
}
#iw-container .iw-content {
    font-size: 13px;
    line-height: 18px;
    font-weight: 400;
    margin-right: 1px;
    padding: 5px 5px 15px 15px;
    max-height: 140px;
    overflow-y: auto;
    overflow-x: hidden;
}
.iw-content img {
    float: right;
    margin: 0 5px 5px 10px; 
}
.iw-subTitle {
    font-size: 16px;
    font-weight: 700;
    padding: 5px 0;
    display: inline-block;
}
.iw-subTitle .product_price{
    font-size: 22px!important;
    color: #e40046!important; 
}
.iw-content p:hover{
    text-decoration: none!important;
}
</style>
