<?php
session_start();
//session_destroy();
require 'payment.php';
	require_once("credential.php");

use Firebase\Firebase;
use Firebase\Auth\TokenGenerator;

//require 'vendor/autoload.php';

use PayPal\Rest\ApiContext;
//use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payment;
use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\CreditCard;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Address;
use PayPal\Api\BillingInfo;
use PayPal\Api\Cost;
use PayPal\Api\Currency;
use PayPal\Api\Invoice;
use PayPal\Api\InvoiceAddress;
use PayPal\Api\InvoiceItem;
use PayPal\Api\MerchantInfo;
use PayPal\Api\PaymentTerm;
use PayPal\Api\Phone;
use PayPal\Api\ShippingInfo;

  if(isset($_GET["paymentId"])){
  
      $paymentid = $_GET["paymentId"];
      try{
        $paydetail = Payment::get($paymentid,$apiContext);
        $obj = json_decode($paydetail);
        
         //print_r($obj);
        // die;
      }catch(Exception $ex){
//        print_r($ex);
        echo "Exception";
      }
    } 


$fb = Firebase::initialize(FIREBASE_URL, FIREBASE_SECRET);

$user = get("DailyQuotes/qoute_description");

function get($path){
$fb = Firebase::initialize(FIREBASE_URL, FIREBASE_SECRET);


//or set your own implementation of the ClientInterface as second parameter of the regular constructor
$fb = new Firebase([ 'base_url' => FIREBASE_URL, 'token' => FIREBASE_SECRET ], new GuzzleHttp\Client());

$nodeGetContent = $fb->get($path);

return $nodeGetContent;
}
//print_r($user);

  ?>
<!DOCTYPE html>
<html style="height: 100%">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
<link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./css/dashboard.css">
<link rel="stylesheet" href="./css/dashheader.css">
<link rel="stylesheet" href="./css/footercss.css" type="text/css" >
<link rel="stylesheet" href="./css/sweetalert.css" type="text/css" >
<script src="./js/sweetalert.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.1.0/firebase.js"></script>
<script type="text/javascript" src="./js/jquery.redirect.js"></script>
<script src="./js/credential.js"></script>
<script>
  if(localStorage.getItem('cat')){
  localStorage.removeItem('cat');
    
  }

</script>


<script>
// $(document).ready(function(){

//   var user = JSON.parse(window.localStorage.getItem('user'));
//   if(user.currentStreak ){
// //alert(5);
//   firebase.database().ref("Users/"+user.user_id+"/currentStreak").once("value",function(snapshot){
//     console.log(snapshot.val());
//     snapshot.forEach(function(childSnapshot) {
//        ba_childData=childSnapshot.val();
//        window.localStorage.setItem("currentCat",childSnapshot.key);
//       console.log(childSnapshot.key);
//       ba_cat=childSnapshot.key;
//       window.localStorage.setItem("cat2",ba_cat);
//       window.localStorage.setItem("subcategory_id","");
//       window.localStorage.setItem("bid","");
//     //  if(ba_cat != "10 Day Intro Program")
//      // {
//         if(childSnapshot.hasChild("Session")){
//           //alert(5);
//              // window.localStorage.setItem("subcategory_id","");
//         window.localStorage.setItem("TYPE","Session");
//                         var b ="";
//         getStreak(b,b,ba_cat);
//             if(ba_childData.streak){
                      
//                      $(".day").html(ba_childData.streak);
//             window.localStorage.setItem("content",ba_childData.streak);
//                     }
//            //$(".day").html(Object.keys(value).length);
//           $.map(ba_childData.Session, function(value, index) {
//         //   alert(value.streak);
//             ba_session_id=index;
//            // alert(Object.keys(value).length);
//           });
//         }else{


//           $.map(ba_childData.SubCategory, function(value, index) {
//             //console.log(value);
//             ba_subcat_id=index;
//                       window.localStorage.setItem("subcategory_id",index);
//             $.map(value, function(value, index) {
//              // alert(index);
//               if(index=="Bundle"){
//                 window.localStorage.setItem("TYPE","S&B");
//                 $.map(value, function(value, index) {
//                   console.log(index);
//                   ba_bundle_id=index;
//                         getStreak(ba_subcat_id,index,ba_cat);
//                             window.localStorage.setItem("bid",index);
//                   window.localStorage.setItem("currentID", index);
                  
//                   window.Cbnd_id = index;
//                   $.map(value, function(value, index) {
//                     console.log("SSS"+Object.keys(value).length);
//                     // $(".day").html(Object.keys(value).length);
//                    //   alert(index);
//                      if(index == "streak"){
//                     window.localStorage.setItem("content",value);
//                      $(".day").html(value);
//                     }

//                   });
//                 });
//               }
//               else{
//                 var b ="";
//                                 getStreak(ba_subcat_id,b,ba_cat);
//                 window.localStorage.setItem("TYPE","SubCategory");
               
//                 window.localStorage.setItem("currentID", ba_subcat_id);
//                     if(index == "streak"){
//                     window.localStorage.setItem("content",value);
                      
//                      $(".day").html(value);
//                     }
//                     if(index == "Session"){
//                       var i = 0;
//                      $.map(value, function(value, index){
//                         if(i == Object.keys(value).length){
//                           //alert(index);
//                           window.localStorage.setItem("SESSIONID",index);
//                         }
//                         i++;
//                      });
//                     }
//                 //console.log("SSS"+Object.keys(value).length);
//                console.log("SSS"+index);
                
//               }
//             });
//           });
//          }
//       // }
//       // else{

//       // }
//      });


//   });
// }else{
//   window.localStorage.setItem("TYPE","Session");
//            window.localStorage.setItem("cid","-L9J9wr-WF71xLKGpHrn");
//                        $(".day").html(0);
// var b = "";
//   getStreak(b,b,"10 Day Intro Program");
//  window.localStorage.setItem("content",0);
//  window.localStorage.setItem("Slen",10);
//  window.localStorage.setItem("Dname","Intro Program");
// }

//   var session2 = [];
// //var Sub = window.localStorage.getItem("subcategory_id");
// //var bid = window.localStorage.getItem("bid");
// //var CT = window.localStorage.getItem("cat2");

// function getStreak(Sub,bid,CT){
// if(Sub != "" && bid !=""){
  
//   firebase.database().ref("Category/"+CT+"/SubCategory/"+Sub+"/Bundle/"+bid).on("value", function(snapshot) {
//         snapshot.forEach(function(childSnapshot) {
//             var key = childSnapshot.key;
//             // value, could be object
//             var childData = childSnapshot.val();
//             console.log(childData);
//             if(key == "bundle_name"){
//                     $(".bannerHeader").html(childData);
//                   window.localStorage.setItem("Dname",childData);
//             }
//                       if(key == "Session"){
//                   session2.push(childData);
//                    $(".totalday").html(Object.keys(childData).length);
//                   window.localStorage.setItem("Slen",Object.keys(childData).length);
//                       }
//           });
    
//     window.localStorage.setItem('session2',JSON.stringify(session2));
//   });
// }else if(Sub!= "" && bid == ""){
//   firebase.database().ref("Category/"+CT+"/SubCategory/"+Sub).on("value", function(snapshot) {
//           snapshot.forEach(function(childSnapshot) {
//             var key = childSnapshot.key;
//             // value, could be object
//             //alert(key);
//             var childData = childSnapshot.val();
//             //alert(childData);
//             if(key == "subcategory_name"){
//                 $(".bannerHeader").html(childData);
//                 window.localStorage.setItem("Dname",childData);
//             }
//             if(key == "Session"){
//                                   session2.push(childData);
//                                   $(".day").html(window.localStorage.getItem("content"));
//                                    $(".totalday").html(Object.keys(childData).length);
//                   window.localStorage.setItem("Slen",Object.keys(childData).length);
              
//             }     
//             console.log(session2);
//           });
//     window.localStorage.setItem('session2',JSON.stringify(session2));
//   });
// }else if(Sub == "" && bid != ""){
//   firebase.database().ref("Category/"+CT+"/Bundle/"+bid).on("value", function(snapshot) {
//           snapshot.forEach(function(childSnapshot) {
//             var key = childSnapshot.key;
//             // value, could be object
//             var childData = childSnapshot.val();
//                 if(key == "bundle_name"){
//                   window.localStorage.setItem("Dname",childData);
//                                       $(".bannerHeader").html(childData);
//                 }
//                 if(key == "Session"){
//                   session2.push(childData);
//                    $(".totalday").html(Object.keys(childData).length);
//                   window.localStorage.setItem("Slen",Object.keys(childData).length);
//                 }
//             console.log(childData);
//           });   
//     window.localStorage.setItem('session2',JSON.stringify(session2));
//   });
// }else if(Sub == "" && bid == ""){
//   firebase.database().ref("Category/"+CT).on("value", function(snapshot) {
//           snapshot.forEach(function(childSnapshot) {
//             var key = childSnapshot.key;
//             // value, could be object
//             var childData = childSnapshot.val();
//                   window.localStorage.setItem("Dname",CT);
                  
//                   //  alert(key);
//                   if(CT == "10 Day Intro Program"){

//                     $(".bannerHeader").html("Intro Program");
//                   }else{   
//                     $(".bannerHeader").html(CT);
//                   }


//                   if(key == "Session"){
//                     session2.push(childData);
//  $(".totalday").html(Object.keys(childData).length);
//                   window.localStorage.setItem("Slen",Object.keys(childData).length);
//                     //alert(Object.keys(childData).length);
//             //console.log(Object.keys(childData).length);
//                   }
//                     console.log("10 DAY===");
//           });
//   window.localStorage.setItem('cat2',CT);
//   window.localStorage.setItem('session2',JSON.stringify(session2));
//                     console.log(session2);
//   });
// }

// }


// });
</script>

 <style type="text/css">
   .btn1 {
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
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: .25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.modal-footer1 {
    padding: 1rem;
    border-top: 1px solid #e9ecef;
}
.center{position: absolute;
    top: 90%;
    left: 92%; 
  text-align:center;
    transform: translateX(-50%) translateY(-50%);}


/* Page Loader ================================= */
.page-loader-wrapper ,  .page-loader-wrapper2{
  z-index: 99999999;
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  background: #eee;
  overflow: hidden;
  text-align: center; }
  .page-loader-wrapper p , .page-loader-wrapper2 p{
    font-size: 13px;
    margin-top: 10px;
    font-weight: bold;
    color: #444; }
  .page-loader-wrapper .loader ,  .page-loader-wrapper2 .loader{
    position: relative;
    top: calc(50% - 30px); }	
.stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step > button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard > .btn.disabled, .stepwizard > .btn[disabled], .stepwizard > fieldset[disabled] > .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
 .stepwizard-step > .btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step > button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard > .btn.disabled, .stepwizard > .btn[disabled], .stepwizard > fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.stepwizard-step > .btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}	
	
</style>
</head>
<body style="margin-top: 100px;">
 <!-- Page Loader -->
    <div class="page-loader-wrapper" style="display: none;">
        <!-- <div class="loader"> -->
       <img src="./img/transaction_loader.gif" style="margin-top: 10% !important;">
     <!-- </div> -->
    </div>
	<div class="page-loader-wrapper2">
        <!-- <div class="loader"> -->
       <img src="./img/loader.gif" style="margin-top: 10% !important;">
     <!-- </div> -->
    </div>
    <!-- #END# Page Loader -->
<?php 
 include 'dashbordHeader.php'; ?>
<!-- <div class="loader"></div> -->
    <div class="mainBanner">
    <center>
      <div class="bannerCenter">
        <p class="bannerDay">Day <span class="day"></span> of <span class="totalday">10</span></p>
      <p class="bannerHeader">Intro Program</p>
      <button class="bannerButton" id="close_account"  style="outline:none; cursor: pointer; font-weight: 400;" type="button"><i class="fa fa-play" aria-hidden="true"></i> &nbsp; B E G I N</button>

    </div>
    </center>
  </div>
  
  <br>
  <br>
  <div class="card Margins startCard"  width="100%">
    <center>
        <div class="card-body" width="100%">
          <h4 class="cardtitles" style="letter-spacing: 3px;">WORDS TO SIT WITH</h4>
      <hr />
          <p class="cardtexts"></p>
        </div>
    </center>
    </div>
  <!--<div class="row Margins">
    <p class="MainMenu">QUICK DIVE&nbsp;&nbsp;<a href="#" class="learnMorestyle"><i>LEARN MORE</i></a></p>
  </div>
  
  <br>-->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h1 class="modal-title Modalcat" id="exampleModalLongTitle" style="color: #34495e;font-size: 28px;">Title</h1>
        <br>
       <p style="color: #727272;">Description</p>

          <a class="btn1 mt-2 mx-1 " data-dismiss="modal" style="background-color: #7DD3D5 !important; outline: none !important; letter-spacing: 3; color:#FFF;  border-color:  #7DD3D5 !important; text-decoration: none;">GOT IT</a>
      </div>
     
      
    
  </div>
</div>
</div>
<!---------------------- Modal open after tag filter when click on cat box------------------------------>


<div class="modal fade" id="description" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content TAGSCR">
		<div class="modal-header text-center" style="margin:auto;">
			<h4 id="sessionTitle">Modal Header</h4>
		</div>
      <div class="modal-body text-center">
        <h1 class="modal-title Modalcat" id="sbTitle" style="color: #34495e;font-size: 28px;">Title</h1>
        <br>
       <p style="color: #727272;">Description</p>

          <button type="button" class="btn1  mt-2 mx-1 divethru" id="divethru" style="background-color: #7DD3D5 !important; outline: none !important; letter-spacing: 3; color:#FFF;  border-color:  #7DD3D5 !important; text-decoration: none;width:70%;">DIVE THRU</button>
		  <br>
		  <div class="freeuser">
			<button type="button" class="btn1  mt-2 mx-1 all" style="color:#FFF; background-color: #7DD3D5 !important; outline: none !important; border-color:  #7DD3D5 !important;width:70%;   cursor: pointer;">Unlock the entire divethru library</button>
			
				<div class="or" style="margin-top: 8px;font-weight: bold;"> OR</div>
				
			<button type="button" class="btn1  mt-2 mx-1 single" style="color:#FFF; background-color: #7DD3D5 !important; outline: none !important; border-color:  #7DD3D5 !important;width:70%;   cursor: pointer;" data-amount="2.79" data-cycle="0" data-plan="L">Get only this</button>
		 </div>
      </div>
     
      
    
  </div>
</div>
</div>

		<div class="modal fade " tabindex="-1" id="tagselection"  role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="text-align:center;">
					<h5 class="modal-title" id="tagModalLabel">Select from option below to</h5>
			  </div>
			  <div class="modal-body">
				
				<div class="stepwizard" style="display:none;">
					<div class="stepwizard-row setup-panel">
						<div class="stepwizard-step col-xs-3"> 
							<a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
							<p><small>Shipper</small></p>
						</div>
						<div class="stepwizard-step col-xs-3"> 
							<a href="#step-2" type="button" class="btn btn-default btn-circle disabled" disabled="disabled">2</a>
							<p><small>Destination</small></p>
						</div>
						<div class="stepwizard-step col-xs-3"> 
							<a href="#step-3" type="button" class="btn btn-default btn-circle disabled" disabled="disabled">3</a>
							<p><small>Schedule</small></p>
						</div>
						<div class="stepwizard-step col-xs-3"> 
							<a href="#step-4" type="button" class="btn btn-default btn-circle disabled" disabled="disabled">4</a>
							<p><small>Cargo</small></p>
						</div>
					</div>
				</div>
				
				<form role="form">
					<div class="panel panel-primary setup-content" id="step-1">
						<div class="panel-heading">
							 <h3 class="panel-title">Shipper</h3>
						</div>
						<div class="panel-body">
						<div class="content">
							<div class="form-group">
								<label class="control-label">First Name</label>
								<input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name" />
							</div>
							<div class="form-group">
								<label class="control-label">Last Name</label>
								<input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
							</div>
						  </div>
							<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
						</div>
					</div>
					
					<div class="panel panel-primary setup-content" id="step-2">
						<div class="panel-heading">
							 <h3 class="panel-title">Destination</h3>
						</div>
						<div class="panel-body">
						<div class="content">
							<div class="form-group">
								<label class="control-label">Company Name</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
							</div>
							<div class="form-group">
								<label class="control-label">Company Address</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
							</div>
						 </div>
							<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
						</div>
					</div>
					
					<div class="panel panel-primary setup-content" id="step-3">
						<div class="panel-heading">
							 <h3 class="panel-title">Schedule</h3>
						</div>
						<div class="panel-body">
						<div class="content">
							<div class="form-group">
								<label class="control-label">Company Name</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
							</div>
							<div class="form-group">
								<label class="control-label">Company Address</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
							</div>
						 </div>
							<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
						</div>
					</div>
					
					<div class="panel panel-primary setup-content" id="step-4">
						<div class="panel-heading">
							 <h3 class="panel-title">Cargo</h3>
						</div>
						<div class="panel-body">
						<div class="content">
							<div class="form-group">
								<label class="control-label">Company Name</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
							</div>
							<div class="form-group">
								<label class="control-label">Company Address</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
							</div>
						 </div>
							<button class="btn btn-success pull-right finish" type="button">Finish!</button>
						</div>
					</div>
				</form>

			  </div>
	        
			</div>
		  </div>
		</div>

<!---------------------- / Modal open after tag filter when click on cat box ------------------------>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header title_center">
        <h4 class="modal-title" id="exampleModalLongTitle" style="color: #34495e;">10 day Intro program</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
       <h5 style="color: #727272;">Purchase for a subscription or continue and check out the exciting bundles and activities that can be unlocked when subscribing to the full Dive Thru account.</h5>
      </div>
      <div class="modal-footer1 text-center">
        <a href="Player" class="btn1 mt-2 mx-1 " style="background-color: #7DD3D5 !important; outline: none !important; color:#FFF;  border-color:  #7DD3D5 !important; text-decoration: none;">Continue with free program</a>
        <a href="Subscription" class="btn1  mt-2 mx-1 " style="color:#FFF; text-decoration: none; background-color: #7DD3D5 !important; outline: none !important; border-color:  #7DD3D5 !important;">Purchase for a subscription</a>
    </div>
  </div>
</div>
</div>
<div class="cat container-fluid">    
<div class="plib" style='height:100%;width:80%;text-align:center;background-color:transparent;padding:10%;margin:auto;border:1px solid rgba(0, 0, 0, 0.125);padding-bottom:1%;'> 
	<div class='cardtitles lib' style='width:500px;margin:auto;'>
		Create My Personalized DiveThru Journey
	</div>
	<div style="margin-top:5%;">
		<a href="javascript:void(0);" class="bottomCardButton lib" style="color: #FFF; text-decoration: none;">CLICK HERE</a> 
		</br> 
		</br> 
		<a href="javascript:void(0);" class="btn1  mt-2 mx-1 skip cardtitles" style="color:#874aa1; text-decoration: none;letter-spacing: 3px;font-weight:700;">SKIP NOW</a>

	</div>
</div>


<?php if (isset($_GET["paymentId"])) {
    //echo $_SESSION["userid"];
?>
<input type="hidden" class="tr_id" value="<?php echo $obj->id; ?>">
<input type="hidden" class="payment_type" value="<?php echo $obj->payer->payment_method; ?>">
<input type="hidden" class="payment_status" value="<?php echo $obj->payer->status; ?>">
<input type="hidden" class="payment_time" value="<?php echo date("d-m-Y H:i:s", strtotime($obj->create_time)); ?>">
<input type="hidden" class="state" value="<?php echo $obj->payer->payer_info->shipping_address->state; ?>">
<input type="hidden" class="payer_id" value="<?php echo $obj->payer->payer_info->payer_id; ?>">
<input type="hidden" class="email" value="<?php echo $obj->payer->payer_info->email; ?>">
<input type="hidden" class="total" value="<?php echo $obj->transactions[0]->amount->total; ?>">
<input type="hidden" class="currency" value="<?php echo $obj->transactions[0]->amount->currency; ?>">
<input type="hidden" class="full_name" value="<?php echo $obj->payer->payer_info->first_name. ' '. $obj->payer->payer_info->last_name; ?>">
<input type="hidden" class="description"  value="<?php echo $obj->transactions[0]->description; ?>">
<input type="hidden" class="city" value="<?php echo $obj->payer->payer_info->shipping_address->city; ?>">
<?php
}
?>
</div>
</div>
<script type="text/javascript">
    var slowLoad = window.setTimeout( function() {
        console.log( "the page is taking its sweet time loading" );
    }, 2000 );

    window.addEventListener( 'load', function() {
        window.clearTimeout( slowLoad );
    }, false );
</script>
<script type="text/javascript">
   
    $(window).load(function(){  
    
               $('#exampleModalCenter').modal('show');
              });
</script>
<!---<div class="container-fluid mt-5"><div class="box-slider">

  
       <h3>QUICK DIVE</h3>
      
         <div class="container">
                <div class="row text-center box justify-content-center">

                       <div class="col-md-3 px-0">
                        <div class="card1 text-white b1">
                        <img class="card-img1" src="img/1.png">
                        <div class="card-img-overlay1">
                           <p class="center">Having A Bed Day</p>
                        </div>
                        </div>
                     </div>

                       <div class="col-md-3 px-0">
                        <div class="card1 text-white b1">
                        <img class="card-img1" src="img/2.png">
                        <div class="card-img-overlay1">
                           <p class="center">Overcome by Anxiety</p>
                        </div>
                        </div>
                     </div>

                       <div class="col-md-3 px-0">
                        <div class="card1 text-white b1">
                        <img class="card-img1" src="img/3.png">
                        <div class="card-img-overlay1">
                           <p class="center">Consumed by Insecurities</p>
                        </div>
                        </div>
                     </div>

                       <div class="col-md-3 px-0">
                        <div class="card1 text-white b1">
                        <img class="card-img1" src="img/4.png">
                        <div class="card-img-overlay1">
                           <p class="center">Busy Mind</p>
                        </div>
                        </div>
                     </div>

                   </div>
            
       </div>
  
  </div>
  
</div>
-------->
<div class="bottomCard" width="100%"> 
    <center>
          <p style="color: #34495e; ">Unlock the Dive thru Library</p>
      <a href="Subscription" class="bottomCardButton " style="color: #FFF; text-decoration: none;">SUBSCRIBE NOW</a>
    </center>
</div>

<?php include 'footer.php'; ?>
<script src="./js/signout.js?version=<?php echo constant("version");?>"></script>
<script src="./js/dashboard.js?version=<?php echo constant("version");?>"></script>
<script src="./js/dashboardheader.js?version=<?php echo constant("version");?>"></script>
<script type="text/javascript"> 
$(document).ready(function () {

       var navListItems = $('div.setup-panel div a');
       var allWells = $('.setup-content');
      var allNextBtn = $('.nextBtn');
    allWells.hide();

    navListItems.click(function (e) {
		//alert(566);
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find(".form-check").find("input[type='text'],input[type='checkbox']"),
            curInputs2 = curStep.find(".form-check").find("input:checkbox:checked"),
            isValid = true;
        $(".form-group").removeClass("has-error");
      //  for (var i = 0; i < curInputs.length; i++) {
           // if (!curInputs[i].prop("checked")) {
			   if(curInputs2.length <= 0){
				   
alert(curInputs2.length);
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
			   }
            //}
       // }

        if (isValid) nextStepWizard.removeClass('disabled');
        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');

    });

    $('div.setup-panel div a.btn-success').trigger('click');

window.h3 = [];
  firebase.database().ref("Users/"+user.user_id).on("value", function(snapshot) {
      snapshot.forEach(function(childSnapshot) {
        // key
        var key = childSnapshot.key;
        // value, could be object
        var childData = childSnapshot.val();

          if(key == "streak"){
            $.map(childData, function(value, index) {
              $.map(value, function(value2, index2) {
                $.map(value2, function(value3, index3) {
                  window.h3.push(index3);
                  console.log(index3);  
                });
              });
            });
          }

      });
      window.localStorage.setItem("SessionHistory2",JSON.stringify(window.h3));
    });
      console.log(JSON.parse(window.localStorage.getItem("SessionHistory")));  
//  $(".bannerHeader").html(window.localStorage.getItem("Dname"));
// $(".day").html(window.localStorage.getItem("content"));
// $(".totalday").html(window.localStorage.getItem("Slen"));

 // $(".playe").on('click','.boxStyle > .bundle',function(e){
 //  alert();
 //      console.log($(e.target).attr('class'));
 //      var flag = false;
 //      var t ='';
 //      var SESSION = $(this).attr("id");
 //      var S = $(this).text();
 //      var cid = $(this).data("cat");
 //      var ct = window.localStorage.getItem("cat");
 //    console.log(ct);
 //      window.localStorage.setItem("cat",ct);
 //      window.localStorage.setItem("Snm",S);
 //      window.localStorage.setItem("cid",cid);
 //      $.redirect("player.php",{bundle: SESSION},"POST",null,null,true);
 //      firebase.database().ref("Category/"+ct+"/Session/"+SESSION).on("value", function(snapshot) {
 //                    window.localStorage.setItem("session", JSON.stringify(snapshot.val()));
 //                snapshot.forEach(function(childSnapshot) {
 //                  var data = childSnapshot.val();
 //                  var key = childSnapshot.key;
   
 //              //    alert(key);
 //                });
 //              });
 //  });
}); 
</script>

<script>
$(document).ready(function(){

       /*$('#exampleModalCenter').modal('hide');*/
var catRef = firebase.database().ref().child('/');
    catRef.on('child_changed', function(snapshot) {
      //location.reload(true);
    });
    $('.header-item > ul li a.nav-link').each(function(){
                var path = window.location.href;
                var current = path.substring(path.lastIndexOf('/')+1);
                var url = $(this).attr('href');
                if(url == current){
                    $(this).addClass('active');
                };
            });



//   $(".bannerButton").click(function(){

//   var day = window.localStorage.getItem('content');
//   //window.localStorage.removeItem("cat","10 Day Intro Program");
//   var user = JSON.parse(window.localStorage.getItem('user'));
// //alert(user.membership_type);
//     if(day>8 && day<=10 && user.membership_type == "Free"){
//      // alert(day);
//        $('#exampleModalCenter').modal('show');
//     }else if(day<=8 || user.membership_type == "paid"){
        
//       var url = "http://34.215.40.163/player.php";
//       window.location.href = url;
//     }else if(day>10 && user.membership_type == "Free"){
//        //alert(day);
//        // alert(user.membership_type);
//       window.location = "subscription.php";
//     }
//   });
    $(".exploreMore").click(function(){
        $(".hiddens").show();
    $(".exploreMore").hide();
    });
});
$(document).ready(function(){
    $(".exploreMore1").click(function(){
        $(".hiddens1").show();
    $(".exploreMore1").hide();
    });
});
$(document).ready(function(){
    $(".exploreMore2").click(function(){
        $(".hiddens2").show();
    $(".exploreMore2").hide();
    });
});
</script>

<!---
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>---->

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html> 