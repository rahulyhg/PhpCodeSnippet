﻿
<?php 

require '../credential.php';
require '../vendor/autoload.php';
use Firebase\Firebase;
use Firebase\Auth\TokenGenerator;


$fb = Firebase::initialize(FIREBASE_URL, FIREBASE_SECRET);

$Tags = get("Tags");



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
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Tags Add | DiveThru Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
     <!-- Sweetalert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Animation Css -->
	 <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

  <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
		     <!-- Bootstrap Tags Input Plugin Js -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
	<script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
      <script type="text/javascript" src="../js/credential.js"></script>
		   
<style>
#dummy{
    visibility: hidden!Important;
    height:1px;
    width:1px;
}
</style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
		<?php include("navbar.php");?>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->

		<?php include("sidebar.php");?>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Tags</h2>
            </div>
			
			 <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Create</h2>
                            <!--<ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>-->
                        </div>
                        <div class="body">
                            <form id="form_validation_tag"  >
                                
										
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Tag Category</label>
									<br>
									<br>
									 <select id="tcat" class="form-control show-tick" name="tcat">
										<?php
                                        if($Tags){
                                            echo "<option value=''>Select Category</option>";
                                            foreach($Tags as $k => $c){
                                                //if( $c['Session'] == "" && $c["Bundle"] == ""){

                                                echo '<option value="'.$k.'">'.$c["tags_category"].'</option>';
                                                //}
                                            }
                                        }else{
                                            echo "<option value=''>Nothing selected</option>";
                                        }
                                        ?>
									 </select>
				<!--					<input type="text" id="tagscat" class="form-control" value="" placeholder="Enter Tag category name">-->
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
									<br>
									<br>
									<input type="text" id="tags" name="tags" class="form-control" data-role="tagsinput" value="" >
									    <input id="dummy" name="dummy" type="text" /><!-- dummy text field -->

                                        <label class="form-label">Tags</label>
                                    </div>
										<small style="color:#aaa;">Write tag's with comma saperator</small>							
                                </div>
								
										
							   
								
                             <!--  <label id="password-error" class="error" for="password">This field is required.</label></div>-->
                                <!-- <div class="form-group">
                                    <input type="checkbox" id="checkbox" name="checkbox" aria-required="true">
                                    <label for="checkbox">I have read and accept the terms</label>
                               <label id="checkbox-error" class="error" for="checkbox">This field is required.</label></div>-->
                                <button class="btn btn-primary waves-effect catadd" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>
		
    <!-- SweetAlert Plugin Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

	<!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
	    <!-- Jquery DataTable Plugin Js -->
	  <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>	
		 <script src="plugins/ckeditor/ckeditor.js"></script>
		 <script src="plugins/ckeditor/plugins/placeholder/plugin.js"></script>
		 <script src="plugins/jquery-validation/jquery.validate.js"></script>
		 <script src="js/pages/forms/form-validation.js"></script>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
	<script type="text/javascript">

		$(function () {
$('#tags').tagsinput();
			var config = {};
	//		config.placeholder = 'Description'; 
//CKEDITOR.replace('ckeditor',config);
    //CKEDITOR.config.height = 300;
	
    $('.js-basic-example').DataTable({
        responsive: true,
		//pagination: true,
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
	
	/*  store already exist tag*/
	window.tagkey = [];
 firebase.database().ref("Tags").orderByKey().on("value", function(snapshot) {
           snapshot.forEach(function(childSnapshot) {		
			                var key = childSnapshot.key;
							window.tagkey.push(key);
		});
});
	/*  store already exist tag*/
    /* prefill exist tag */   
	   $("#tcat").change(function(){
								$("#tags").tagsinput("removeAll");
			var tid = $(this).val();
			firebase.database().ref("/Tags/"+tid).orderByKey().on("value", function(snapshot) {
           snapshot.forEach(function(childSnapshot) {		
			                var key = childSnapshot.key;
							var value = childSnapshot.val();
							
							if(key == "tags"){
								$("#tags").tagsinput("add",value);
								$('#tags').tagsinput('refresh');

							}
							
					});
			});	
		   
	   });
    /* prefill exist tag */   
	   
	    $.validator.addMethod("checkTags", function(value, element, regexpr) {          
                 return  ($(".bootstrap-tagsinput").find(".tag").length > 0);
               }, "Please enter Only characters"); 
    $('#form_validation_tag').validate({
        rules: {  
            'tcat':{
                required:true
            },
			 dummy:"checkTags"
            
        },
        messages: {
            tcat:"Please Select category",
			dummy: "Please Enter at least one tag"
          
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
        submitHandler: function(form) {
        },
        success: function(form){
                                
        }
    });

	
	$("form").submit(function(e){
        e.preventDefault();
    });
	
	$(".catadd").click(function(){
		var temp=$('#form_validation_tag').valid();
		
		 //var desc = CKEDITOR.instances['ckeditor'].getData();
		 var id = $("#tcat option:selected").val();
		 var nm = $("#tcat option:selected").text();
		 var tags = $("#tags").val();
		

	//	 alert(desc);
		 //var catnm = $("#catname").val();
		// var cimg = $("#imgurl").val();
		//  var subname = $("#subname").val();
		if(temp == true){
			
			var currentdate = new Date(); 
				 var datetime = +currentdate.getFullYear() + "-"
								  + ("0" + (currentdate.getMonth()+1)).slice(-2)  + "-" 
								  + ("0" + currentdate.getDate()).slice(-2)  + " "  
								  + ("0"+ currentdate.getHours()).slice(-2)  + ":"  
								  + ("0"+ currentdate.getMinutes()).slice(-2) + ":" 
								  + ("0"+currentdate.getSeconds()).slice(-2);
		var firebaseRef = firebase.database().ref();

			var catRef = firebaseRef.child("Tags");
			if($.inArray( id , window.tagkey ) != -1){
							  var qId = id;
			}else{
			var pushedCatRef = catRef.push();
								  
			// Get the unique key generated by push()
			var qId = pushedCatRef.key;
			}

			catRef.child(qId).update({
				tags_category_id: qId,
				tags_category: nm,
				tags: tags,
				createdOn: datetime
			}).then(function(snap){
				 swal({
							title: "Inserted!",
							text: "Tag's has been Inserted.",
							html:true,
							type: "success",
							showCancelButton: false,
							confirmButtonColor: "#86CCEB",
							confirmButtonText: "OK",
							closeOnConfirm: false
						}, function () {
							window.setTimeout(function() {
							
							  window.location.href = "tags_list.php";
							}, 1000);
						});
			});
		}
		//alert(cimg);
		//alert(55);
		
	});
	
});
	</script>
</body>

</html>