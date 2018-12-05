<?php 
require_once("credential.php");
require '../vendor/autoload.php';
use Firebase\Firebase;
use Firebase\Auth\TokenGenerator;


$fb = Firebase::initialize(FIREBASE_URL, FIREBASE_SECRET);

$cms = get("cms");


function get($path){
    	$fb = Firebase::initialize(FIREBASE_URL, FIREBASE_SECRET);

//or set your own implementation of the ClientInterface as second parameter of the regular constructor
$fb = new Firebase([ 'base_url' => FIREBASE_URL, 'token' => FIREBASE_SECRET ], new GuzzleHttp\Client());

$nodeGetContent = $fb->get($path);

return $nodeGetContent;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Contact us</title>

<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="./css/contact.css" rel="stylesheet" type="text/css">
<link href="./css/reg.css" rel="stylesheet" type="text/css">
<link href="./css/footercss.css" rel="stylesheet" type="text/css">
<!-- <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="./css/dashheader.css">
<style type="text/css">
	.btn2 {
  display: inline-block;
  font-weight: 400;
  color: #FFF;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 1.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
<script src="./js/credential.js"></script>
		
    <script>
    $(document).ready(function(){

    var user=window.localStorage.getItem('user');
    if(user!=null)
    {
    //alert(user);
      $( "#result" ).load( "dashbordHeader.php", function() {
        //alert( "Load was performed." );

        $(".page-loader-wrapper").fadeOut();
      });
        
    }
    else{
        $( "#result" ).load( "header.php", function() {
        //alert( "Load was performed1 ." );
        $(".page-loader-wrapper").fadeOut();
      });
      
    }
  });

  </script>
</head>

<body>

<!--HEADER-->
	
<?php //include 'header.php'; ?>
 <div id="result"></div>
<!--SLIDER-->
<?php 	foreach ($cms as $value) { ?>

			<?php if($value['page_slug']=="contact") {echo "<h2>".$value['page_description']."</h2>";} ?>
			<!-- <div class="btn1 btn-primary1 mx-0 mt-3 py-2">C H E C K O U T &nbsp; O U R &nbsp; F A Q</div>
			<div class="btn1 btn-primary2  mt-3 py-2 px-5 sample-btn-pad">C O N T A C T &nbsp; U S </div>  -->
	  
	
<?php } ?>
<!--FOOTER-->

<?php include 'footer.php'; ?>
<script type="text/javascript" src="./js/cms.js"></script>
<!-- <script src="js/jquery.js"></script> -->
<script src="./js/bootstrap.bundle.min.js"></script>

</body>
</html>
