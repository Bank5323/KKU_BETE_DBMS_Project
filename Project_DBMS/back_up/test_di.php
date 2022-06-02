<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
setTimeout(function(){ 

$.get( "mydata.php", function( data ) {
$( "#mydata" ).html( data ); // this will replace the html refreshing its content using ajax

});


 }, 5000);
</script>

<header>
<h2 id="mydata"></h2> ºC
</header>