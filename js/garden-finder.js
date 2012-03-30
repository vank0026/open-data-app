$(document).ready(function () {

		/**
		 *small description:  Displays the list and the map for the Open Data
		 *
		 *@package 
		 *@copyright 2012 Roger van Koughnett
		 *@author Roger van Koughnett <roger.van.koughnett@gmail.com>
		 *@link https://github.com/vank0026/open-data-app
		 *@license New BSD Licence 
		 *@version 1.0.0
		 */

	// Create an object that holds options for the GMap
	// instructions at https://developers.google.com/maps/documentation/javascript/reference
	var gmapOptions = {
		center : new google.maps.LatLng(45.423494,-75.697933)
		, zoom : 12
		,disableDefaultUI: true
		, mapTypeId: google.maps.MapTypeId.TERRAIN
	};

	// Create a variable to hold the GMap and add the GMap to the page
	var map = new google.maps.Map(document.getElementById('map'), gmapOptions);

	// Share one info window variable for all the markers
	var infoWindow;
	// Use this variable to remember which marker is bouncing so we can stop it later
	var bouncingMarker;

	// Loop through all the places and add a marker to the GMap
	$('#list > li').each(function (i, elem) {
		var park = $(this).find('a').html();
		
		// Create some HTML content for the info window
		// Style the content in your CSS
		var info = '<div class="info-window">'
			+ '<strong>' + park + ' </strong>'
			+ '<a href="single.php?id=' + $(this).attr('data-id') + '">Rate This Garden!</a>'
			+ '</div>'
			;

		// Determine this park's latitude and longitude
		var lat = $(this).find('meta[itemprop="latitude"]').attr('content');
		var lng = $(this).find('meta[itemprop="longitude"]').attr('content');
		var pos = new google.maps.LatLng(lat, lng);

		// Create a marker object for this park
		var marker = new google.maps.Marker({
			position : pos
			, map : map
			, title : park
			, icon : 'images/google-icon.png'
			, animation: google.maps.Animation.DROP
		});

		// Add a click event listener for the marker
		google.maps.event.addListener(marker, 'click', showInfoWindow);

		// A function for showing this park's info window
		function showInfoWindow (ev) {
			
			
			if (ev.preventDefault) {
				ev.preventDefault();
			}

			// Close the previous info window first, if one already exists
			if (infoWindow) {
				marker.setAnimation(null);
				infoWindow.close();
			}

			
			// Create an info window object and assign it the content
			infoWindow = new google.maps.InfoWindow({
				content : info
				
			});
			
			if (bouncingMarker) {
				// https://developers.google.com/maps/documentation/javascript/overlays#MarkerAnimations
				bouncingMarker.setAnimation(null);
			}
			
			marker.setAnimation(google.maps.Animation.BOUNCE);
			bouncingMarker = marker;

			infoWindow.open(map, marker);
		}

		// Add a click event listener to the list item
		google.maps.event.addDomListener($(this).children('a').get(0), 'click', showInfoWindow);
		
		
	});
	
	// STARS rating here!	************************************
	
	var $raterLi = $('.rater-usable li');
	
	// Makes all the lower ratings highlight when hovering over a star
				$raterLi
				.on('mouseenter', function (ev) {
			var current = $(this).index();
			
			for (var i = 0; i < current; i++) {
				$raterLi.eq(i).addClass('is-rated-hover');
				}
			})
		.on('mouseleave', function (ev) {
		$raterLi.removeClass('is-rated-hover');
	})
;
	
});
