<?php 
include_once 'header.php';
require_once 'connection.php';

require_once ("inc/class.product_list.inc");
$productCategoryObj=productInfo::getAllProductCategoryList();

$idu = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE idu='".$idu."'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($res);

if(empty($idu) || $row['user_type']=='buyer')
{
  header('Location:home.php');
}

if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
     // treat the succes case ex:
     $success_message="We will review your product and publish it soon";
	
}
$q_sel = "SELECT count(*) AS count FROM product_node WHERE idu='".$idu."' ";
$stmt_query = mysqli_query($con,$q_sel);
$count_product = mysqli_fetch_assoc($stmt_query);
$count_prod = $count_product['count'];
$plan = $row['plan'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- <link rel="stylesheet" href="http://localhost/add_product_css.css" type="text/css">-->
  <script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "http://localhost/dropdown_depent/get_allcat.php",
	data:'category_id='+val,
	success: function(data){
		$("#display_subtype").html(data);
	}
	});
	if(val == 6)
		{
			$('#sel_gender').show();
		}
		else
		{
			$('#sel_gender').hide();
		}
		if(val==2)
		{
			
			$(".downloadable_pdf").show();
			$(".get_pdf").show();
			$.ajax({
			type:'POST',
			url:'get-pdf.php',
			success:function(data){
				$(".get_pdf").html(data);
				
			}
		});
			
		}
		else
		{
			$(".downloadable_pdf").hide();
			$(".get_pdf").hide();
		}
	
}

$(document).ready(function(){
	$('.select_data').selectpicker('refresh');
}) 

</script>

<script>
jQuery(document).ready(function() {

  
  
  jQuery('.want_btn').click(function(e){
    e.preventDefault();
	
    var href = jQuery(this).attr('href');
    jQuery(href).modal('toggle');
  });

  

});  
  
 jQuery(document).ready(function() {
	 

   });
 
   
   
   
    jQuery(document).ready(function() {
	 
$('.gly').hide();
$('.gly1').hide();
$('.gly2').hide();
	$('.gly3').hide();
 

    jQuery('.open1').click(function(e){
    e.preventDefault();
	$('.gly').hide();
	$('.gly1').show();
	$('.gly2').hide();
	$('.gly3').hide();
	$('.LINK li #sf1_div').css("color","#9F9F9F");
	$('.LINK li #sf2_div').css("color","#44A5D6");
	$('.LINK li #sf3_div').css("color","#9F9F9F");
	$('.LINK li #sf4_div').css("color","#9F9F9F");
  });
   jQuery('.open2').click(function(e){
    e.preventDefault();
	$('.gly').hide();
	$('.gly1').hide();
	$('.gly2').show();
	$('.gly3').hide();
	$('.LINK li #sf1_div').css("color","#9F9F9F");
	$('.LINK li #sf2_div').css("color","#9F9F9F");
	$('.LINK li #sf3_div').css("color","#44A5D6");
	$('.LINK li #sf4_div').css("color","#9F9F9F");
  });
   jQuery('.open3').click(function(e){
    e.preventDefault();
	$('.gly').hide();
	$('.gly1').hide();
	$('.gly2').hide();
	$('.gly3').show();
	$('.LINK li #sf1_div').css("color","#9F9F9F");
	$('.LINK li #sf2_div').css("color","#9F9F9F");
	$('.LINK li #sf3_div').css("color","#9F9F9F");
	$('.LINK li #sf4_div').css("color","#44A5D6");
  });

    jQuery('.back4').click(function(e){
    e.preventDefault();
	$('.gly').hide();
	$('.gly1').hide();
	$('.gly2').hide();
	$('.gly3').show();
	$('.LINK li #sf1_div').css("color","#9F9F9F");
	$('.LINK li #sf2_div').css("color","#9F9F9F");
	$('.LINK li #sf3_div').css("color","#44A5D6");
	$('.LINK li #sf4_div').css("color","#9F9F9F");
  });

  
    jQuery('.back3').click(function(e){
    e.preventDefault();
	$('.gly').hide();
	$('.gly1').hide();
	$('.gly2').hide();
	$('.gly3').show();
	$('.LINK li #sf1_div').css("color","#9F9F9F");
	$('.LINK li #sf2_div').css("color","#44A5D6");
	$('.LINK li #sf3_div').css("color","#9F9F9F");
	$('.LINK li #sf4_div').css("color","#9F9F9F");
  });
      jQuery('.back2').click(function(e){
    e.preventDefault();
	$('.gly').hide();
	$('.gly1').hide();
	$('.gly2').hide();
	$('.gly3').show();
	$('.LINK li #sf1_div').css("color","#44A5D6");
	$('.LINK li #sf2_div').css("color","#9F9F9F");
	$('.LINK li #sf3_div').css("color","#9F9F9F");
	$('.LINK li #sf4_div').css("color","#9F9F9F");
  });


});  
   
            $('#btnCancel').click(function () {
                if (unsaved) {
                    var flag = confirm("Job Function Not Saved. Are you Sure you want to leave with out saving the data?");
                    if (flag)
                        $('#sf1').modal('hide');

                }
                else
                    $('#sf1').modal('hide');

            });
</script>
<style>
#side_bar{
	
	     padding-top: 5%;
	 background:white;
	height:90%;
	     padding-left: 15%;
    padding-right: 16%;
}

.form-control {
    display: block;
    width: 100%;
    height: 45px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.ripple-container {

    border: 2px solid !important;
}
.add_product_div{
	    padding: 0px;
    width: 100%;
    background: #FCFCFC;
}
.error{color:red;}

.error_prod{color:red;}
.error_img{color:red;}
.error_category{color:red;}
.commonimage{
	    text-align: center;
    border: 1px solid #ddd;
    height: 100px;
    width: 100px;
    position: static;
    margin: 0 auto;
}

.want_btn{color:#9F9F9F;}
.image_preview_div{
	height: 300px;
    width: 100%;
    border: 1px solid #ddd;
    text-align: center;
}
.image_preview_div1{
	
border: 1px solid #ddd;	
    padding-top: 8px;
    padding-left: 8px;
    padding-right: 8px;
}
}

.all_image{
	height: 50px;
    width: 50px;
    position: absolute;
    top: 25px;
    left: 40px;
    outline: none !important;
    overflow: hidden;
}
.main_image{
	    position: absolute;
    top: 60px;
    left: 60px;
    width: 150px;
    height: 150px;
	 outline: none !important;
    overflow: hidden;
}
.main_ul{
	display:block !important;
}
.all_error{
	    color: red;
    font-size: 12px;
    font-weight: 700;
}
.editimage{
	display: inline-block;

width: 100%;

padding: 206px 0 0 0;

height: 100px;

overflow: hidden;

border-radius: 0px;


position: absolute;

z-index: 0;

left: 0px;

top: 30px;

background: transparent;

border: none;
}
#warn{
	
	color:red; font-size:15px;
}

.display a{
		color:#44A5D6;
	font-weight:500;
	text-decoration:none;
}

.help-inline-error{
	color:red;
	height:45px;
}
</style>
<style>
 .LINK li{
	 float:left;
	 padding-left: 11%;
 }

 .side_bar{
	     padding-top: 5%;
	 background:white;
	height:105%;
	     padding-left: 15%;
    padding-right: 16%;

 }

button, html [type="button"], [type="reset"], [type="submit"] {
    -webkit-appearance: caret;
}

hr {
    height: 1px;
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
}



 .LINK li a{
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
	color: #9F9F9F;;
	font-family: lato,sans-serif;
}


 .LINK li a:hover{
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
	color: #44A5D6;
	font-family: lato,sans-serif;
}


 .LINK li.active a{
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
	color: #44A5D6;
	font-family: lato,sans-serif;
}



.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
  

    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}

.steps{width:100%;}

.image_preview_div{
	height: 300px;
    width: 100%;
    border: 1px solid #ddd;
    text-align: center;
	padding:10px;
}
.p1{
	height:93%;
	padding-left: 35px;
}

#sf1{padding-left: 50px;}
#sf2{padding-left: 50px;}
#sf3{padding-left: 50px;}
#sf4{padding-left: 50px;}
@media only screen and (max-width: 320px) {
	
		
}

@media only screen and (max-width: 768px) {
	.title{
		       padding-left: 95px;
	}
		 .side_bar{
	     padding-top: 10%;
	 background:white;
	
	     padding-left: 15%;
    padding-right: 16%;

 }
	.LINK{
		display:none;
	}
	.p1{
		height:50%;

	}
	#sf4{
		    padding-left: 67px;
		  width: 90%;
		
	}
	#sf3{
		    padding-left: 67px;
		   width: 90%;
	}
		#sf2{
		    padding-left: 67px;
		  width: 90%;
	}
		#sf1{
		    padding-left: 67px;
		      width: 90%;
	}
	.steps_b{
		
     margin-bottom: 65%;
	}
	
	#p1{
		height: 15%;
	}
}
@media only screen and (max-width: 360px) {
	.side_bar{
		    height: 100%;
    width: 100%;
    padding: 0px;
	}
	
.steps{width:100%;
    padding-bottom: 80px;
	overflow:scroll;
	   }
	  
.steps_b{
	 margin-bottom: 305%;
	  padding-bottom: 80px;
	overflow:scroll;
}
#sf1 {
	
	padding-right:0px;
}

#sf2 {
	
	padding-right:0px;
}

#sf3 {
	
	padding-right:0px;
}
#sf4 {
	
	padding-right:0px;
}
#sf1 .p1{
	    height: 50%;
}


#sf2 .p1{
	    height: 35%;
}


#sf3 .p1{
	    height: 45%;
}

#sf4 .p1{
	    height: 30%;
}
#sf1{
	       padding-left: 0px;
   
    padding-right: 110px;
}
#sf2{
	           padding-left: 0px;
   
    padding-right: 110px;
}
#sf3{
	           padding-left: 0px;
   
    padding-right: 110px;
}
#sf4{
	           padding-left: 0px;
   
    padding-right: 110px;
}
}
@media only screen and (max-width: 411px) {
	.side_bar{
		height:100%
	}
	.steps_b{
	    margin-bottom: 320%;
	}
}
@media only screen and (max-width: 414px) {
	.side_bar{
		height:100%
	}
	.steps_b{
	    margin-bottom: 320%;
	}
}
.title{
	padding:20px;
}
@media only screen and (max-width: 320px) {
	.title{
		       padding-left: 95px;
	}
#sf1{
	padding:0px;
}
#sf2{
	padding:0px;
}
#sf3{
	padding:0px;
}
#sf4{
	padding:0px;
}
}

</style>
</head>
<body >
<form name="basicform" id="basicform" method="post" action="http://localhost/administrator/model/new_insert_product.php">
<div class="container-fluid add_product_div" style="    padding-bottom: 40px;">
<div class="row"   >
<div class="col-md-1 col-lg-1 col-xl-1 col-sm-12 col-xs-12" ></div>
<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12" >
<br><span style="font-size: 22px;color:#9F9F9F;" class="title" >UPLOAD PRODUCT</span>
</div>
<div class="col-md-7 col-lg-7 col-xl-7 col-sm-12 col-xs-12">
<br>
<ul class="LINK">
<li class=" display active ico"><a href="#step-5"  id="sf1_div"  class="active" data-toggle="tab" data-toggle="tooltip" data-placement="top">BASIC<i class="gly glyphicon 	glyphicon glyphicon-menu-right"></i></a></li>

<li class="display ico1"><a href="#step-6" id="sf2_div" data-toggle="tab" data-toggle="tooltip"  data-placement="top" >SPECIFICATION<i class=" gly1 glyphicon 	glyphicon glyphicon-menu-right"></i></a></li>

<li class="display ico2"><a href="#step-7"  id="sf3_div" data-toggle="tab" data-toggle="tooltip" data-placement="top" >UPLOAD IMAGE<i class=" gly2 glyphicon 	glyphicon glyphicon-menu-right" ></i></a></li>

<li class="display ico3"><a href="#step-8"  id="sf4_div" data-toggle="tab" data-toggle="tooltip" data-placement="top">PRICING<i class="gly3 glyphicon 	glyphicon glyphicon-menu-right"></i></a></li>

</ul>

</div>

</div>
<hr size="5" color="#F1F1F1">
  <div id="sf1" class="frm" style="padding-bottom: 13px; padding-top:0px;">
<div class="row">
<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">

<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 p1" >
<div class="side_bar" >
<div class="" style="text-align: center;height: 100px;">
	<img src="images/clipboard.svg" class="" style="height:80px; width:80px;">
	</div>
<h4 style=" text-align: center; color: #44A5D6;">Fill out basic details</h4>


<center style="text-align:center;color:#9F9F9F;font-weight: 600;font-family: lato,sans-serif;font-size: 15px;">Product Name:</center>
<p style="text-align:center;font-size: 13px;color:#838383;">
Using lorem ipsum to focus attention on graphic elements in a webpage design proposal
</p>

<center style="text-align:center;color:#9F9F9F;font-weight: 600;font-family: lato,sans-serif;font-size: 15px;">Keywords:</center>
<p style="text-align:center;font-size: 13px;color:#838383;">
Using lorem ipsum to focus attention on graphic elements in a webpage design proposal
 </p>

<center style="text-align:center;color:#9F9F9F;    font-weight: 600;font-family: lato,sans-serif;font-size: 15px;">Product Description:</center>
<p style="text-align:center;font-size: 13px;color:#838383;">
Using lorem ipsum to focus attention on graphic elements in a webpage design proposal
 </p>

</div>


</div>
<div class="col-md-8 col-lg-8 col-xl-8 col-sm-12 col-xs-12 steps" style="height: auto; padding-top:0px;" >

  <div class="display_form">
   
    <div class="panel-body">
		
        
      
          <fieldset>
		  <div class="row">
		    <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
		 &nbsp;  &nbsp;<h5 style="font-size: 14px;font-weight: bold;font-family: lato,sans-serif;">STEP 1: Basic</h5>
		  </div>
		  		  </div>

		    <div class="row">
             <div class="col-md-11 col-lg-11 col-xl-11 col-sm-12 col-xs-12">
			<div class="form-group md-form" style="    margin-bottom: -5px;">
                     <input id="product_title" type="text"  placeholder="Product Name" class="form-control validate" name="product_title"autocomplete="off">
			</div>
			<p class="clearfix" style="height: 10px;clear: both;"></p>
			
			<div class="form-group md-form mt-3" style="margin-bottom: 0px;">
                        <p class="pull-right" style="font-size:small;">Character limit:0/100</p>
                        <input id="product_key" name="product_key" type="text" placeholder="Keywords" class="form-control validate" required />
			</div>
			 <div class="clearfix" style="height: 10px;clear: both;"></div>
			 
             <div class="form-group md-form mt-3" style="  margin-bottom: 4px;">
                 <p class="pull-right" style="font-size:small;">Character limit:0/200</p>
                 <textarea  id="product_desc" name="product_desc" type="text" placeholder="Product Description" class="form-control validate" ></textarea>
             </div>
			<div class="clearfix" style="height: 10px;clear: both;"></div>
			</div>
				<div class="col-md-1 col-lg-1 col-xl-1 col-sm-12 col-xs-12">
			 
			</div>
			
		
			
			</div>
			<div class="row">
		<div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12"> <a href="http://localhost/help-center-for-buyer" style="color: #DC5765;font-weight: 550;font-size: 16px;">Need Help?</a></div>
				<div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 col-xs-12"></div>
				<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
			<div class="form-group">
              <div class="pull-right" >
			            
			   <button class="btn btn-default" id="btnCancel" name="btnCancel" style="padding: 10px; background: #9F9F9F;color:white;">Cancel</button> 
                <button class="btn btn-primary open1 next_btn" type="button" style="padding: 10px; background: #44A5D6; margin-left: 25px;">Next <span class="glyphicon glyphicon-chevron-right"></span></button> 
              </div>
            </div>
			</div>
			
		<div class="col-md-1 col-lg-1 col-xl-1 col-sm-12 col-xs-12"></div>
				
			</div>
          </fieldset>
        </div>
</div>
</div>
</div>
 </div>
  </div>
  
  
  <div id="sf2" class="frm" style="display: none;">
  <div class="row">
<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 p1" >
<div class="side_bar" >
<div class="" style="text-align: center;height: 100px;">
	<img src="images/diagram.svg" class="" style="height:80px; width:80px;">
	</div>
<h4 style=" text-align: center; color: #44A5D6;">Select a Category</h4>

<center style="text-align:center;color:#9F9F9F;font-weight: 600;font-family: lato,sans-serif;font-size: 15px;">Product Category:</center>
<p style="text-align:center;font-size: 13px;color:#838383;">
Using lorem ipsum to focus attention on graphic elements in a webpage design proposal
</p>

<center style="text-align:center;color:#9F9F9F;font-weight: 600;font-family: lato,sans-serif;font-size: 15px;">Product Material:</center>
<p style="text-align:center;font-size: 13px;color:#838383;">
Using lorem ipsum to focus attention on graphic elements in a webpage design proposal
</p>

<center style="text-align:center;color:#9F9F9F;font-weight: 600;font-family: lato,sans-serif;font-size: 15px;">Genere:</center>
<p style="text-align:center;font-size: 13px;color:#838383;">
Using lorem ipsum to focus attention on graphic elements in a webpage design proposal
</p>

</div>


</div>
<div class="col-md-8 col-lg-8 col-xl-8 col-sm-12 col-xs-12 steps_b" style="height: auto;">

  <div class="display_form">
   
    <div class="panel-body">
		<div class="text-center success_message" style="color:green"><?php echo $success_message;?></div>
		<div class="text-center restriction_message" style="color:red"></div>
      
        
      
          <fieldset>
			  <div class="row">
			  <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
		 &nbsp;  &nbsp;<h5 style="font-size: 14px;font-weight: bold;font-family: lato,sans-serif;">STEP 2: Product Specification</h5>
		  </div>
		   </div>
			<br>
		
			<div class="row">
			
			 <div class="col-md-10 col-lg-10 col-xl-10 col-sm-12 col-xs-12">
				<div class="form-group md-form " >
					<select id="prod_cat" name="product_category"  class="select_data form-control validate" tabindex="-98" onChange="getState(this.value);" style="height: 70px;" >
						<option value=''>Select Product Category</option>
							<?php  
								foreach($productCategoryObj as $productCat)
							{
							?>
								<option id="prod_option" value="<?php echo $productCat->prod_cat_id; ?>"><?php echo $productCat->prod_cat_name; ?></option>
							<?php	
								}
							?>
					</select>
                    </div>
					<div class="clearfix" style="height: 10px;clear: both;"></div>
					<div class="form-group md-form">
                        <input id="product_material" type="text"  placeholder="Product Material" class="form-control validate" name="product_material" style="height: 70px;" autocomplete="off">
					</div>
					<div class="clearfix" style="height: 10px;clear: both;"></div>
					<div class="form-group md-form">
                        <input id="product_collection" type="text"  placeholder="Product Collection" class="form-control validate" name="product_collection" style="height: 70px;" autocomplete="off">
					</div>
					<div class="clearfix" style="height: 10px;clear: both;"></div>
					<div class="display_subtype" id="display_subtype">
					 </div>
					<div class="other_type_cat" id="other_type_cat">
					
					</div>
					<div class="get_pdf"></div>
					<div class="downloadable_pdf"></div>
					</div>
					 <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12">
           
			</div>
		
			</div>
			<br>
			<div class="row">
		<div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12"> <a href="http://localhost/help-center-for-buyer" style="color: #DC5765;font-weight: 550;font-size: 16px;">Need Help?</a></div>
				<div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 col-xs-12"></div>
				<div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12">
			<div class="form-group">
              <div class="pull-right" >
			   <button class="btn btn-primary back2 prev_btn" type="button" style="padding: 10px; background: #44A5D6;"><span class="glyphicon glyphicon-chevron-left"></span>Prev</button> 
                <button class="btn btn-primary open2 next_btn" type="button" style="padding: 10px; background: #44A5D6;margin-left: 25px;">Next <span class="glyphicon glyphicon-chevron-right"></span></button> 
              </div>
            </div>
			</div>
			<div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12"></div>
			
			 </div>
          </fieldset>
       
</div>
</div>
</div>
 </div>
 </div>
  </div>

  
  
    <div id="sf3" class="frm" style="display: none;">
  <div class="row">
<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 p1" id="p1">
<div class="side_bar" id="side_bar">

	<div class="" style="text-align: center;height: 100px;">
	<img src="images/photo (1).svg" class="" style="height:80px; width:80px;">
	</div>
<h4 style=" text-align: center; color: #44A5D6;">Upload Image</h4>


<center style="text-align:center;color:#9F9F9F;font-weight: 600;font-family: lato,sans-serif;font-size: 15px;">Upload Image</center>
<p style="text-align:center;font-size: 13px;color:#838383;">
Using lorem ipsum to focus attention on graphic elements in a webpage design proposal
</p>
<br>

<p style="text-align:center;font-size: 13px;color:#838383;">
Using lorem ipsum to focus attention on graphic elements in a webpage design proposal
</p>
<br>

<p style="text-align:center;font-size: 13px;color:#838383;">
Using lorem ipsum to focus attention on graphic elements in a webpage design proposal
</p>
<br>
</div>


</div>
<div class="col-md-8 col-lg-8 col-xl-8 col-sm-12 col-xs-12 steps_b" >

  <div class="display_form">
   
    <div class="panel-body">
		<div class="text-center success_message" style="color:green"><?php echo $success_message;?></div>
		<div class="text-center restriction_message" style="color:red"></div>
      
        
      
          <fieldset>
			  <div class="row">
			  <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
		 &nbsp;  &nbsp;<h5 style="font-size: 14px;font-weight: bold;font-family: lato,sans-serif;">STEP 3:Upload Image</h5>
		  </div>  </div>
			<br>
			<div class="row">
	
			
			<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
         <div class="form-group md-form image" style="    BACKGROUND: WHITE;">
			  <div class="image_preview_div">
				 <img src="http://localhost/images/photo.png"  id="preview_img1" style="height: 100%;width:100%;" class="preview_img"/>
					<input type="file" name="adimage1" accept=".jpg, .jpeg, .png"  id="imgEditInput1" class="editimage" onchange="readURL(this);">
					<br><br>
			
			<br><br>
				</div>
				</div>
				
						
          
			<span style="font-weight: 550;color:#9A9A9A;    padding-left: 100px;">Preview</span>
			
			</div>
			<div class="col-md-8 col-lg-8 col-xl-8 col-sm-12 col-xs-12">
				<span style="font-weight: 550; margin-left:53px; color:#000;">Upload Minimum of two images</span>
				<br><br>
				<div class="row">
				<div class="col-md-1 col-lg-1 col-xl-1 col-sm-12 col-xs-12"></div>
			<div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12">
          <div class="form-group md-form image" style="    BACKGROUND: WHITE;" >
		  <div class="image_preview_div1">
				  <img src="http://localhost/images/image.png"  id="preview_img2" style="height:100%;width:100%;" class="preview_img1"/>
					<input type="file" name="adimage2" accept=".jpg, .jpeg, .png" id="imgEditInput2" class="editimage"  onchange="readURL1(this);"style="margin-top: -30px;">
					<p style="color:red; font-size:1px; "></p>
		</div>
				</div>

            <div class="clearfix" style="height: 5px;clear: both;"></div>
			</div>
			<div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12">
				<div class="form-group md-form image" style="    BACKGROUND: WHITE;">
				<div class="image_preview_div1">
				 <img src="http://localhost/images/image.png"  id="preview_img3" style="height:100%;width:100%;"/>
					<input type="file" name="adimage3" accept=".jpg, .jpeg, .png" id="imgEditInput3" class="editimage" onchange="readURL2(this); " style="margin-top: -30px;"> 
					<p style="color:red;font-size:1px;  "></p>
			</div>
				</div>
				 <div class="clearfix" style="height: 5px;clear: both;"></div>
				 </div>
				 <div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12">
				 <div class="form-group md-form image" style="    BACKGROUND: WHITE;">
				 <div class="image_preview_div1">
				 <img src="http://localhost/images/image.png"  id="preview_img4" style="height:100%;width:100%;"/>
					<input type="file" name="adimage4" accept=".jpg, .jpeg, .png" id="imgEditInput4" class="editimage" onchange="readURL3(this);" style="margin-top: -30px;">
				   <p style="color:red; font-size:1px;"></p>
			</div>
				</div>
				<div class="clearfix" style="height: 10px;clear: both;"></div>
				</div>
		<div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12"></div>
			
			</div>
		
			<div class="row" >	
			<div class="col-md-1 col-lg-1 col-xl-1 col-sm-12 col-xs-12"></div>
			<div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
              <div class="form-group">
             <div class=" img_content">
				<p style="font-size:12px;font-weight: 550;color:#000;">Acceptable File Formats: .jpg, .jpeg, and .png</p>
				<p style="font-size:12px;font-weight: 550;color:#000;">Maximum File Size(MB):5 MB</p>
				<p style="font-size:12px;font-weight: 550;color:#000;"> Minimum Image Size(W x H):250 x 250</p>
				<p style="font-size:12px;font-weight: 550;color:#000;">Do not use any watermark on images</p>
				<!--<a  href="#myModal" class="btn"><span class="glyphicon glyphicon-question-sign "></span> Upload Requirements</a>-->
				<a href="#upload_criteria" class="btn want_btn" style="font-size: 11px;"><span class="glyphicon glyphicon-question-sign "></span> Upload Requirements</a>
             </div>
            </div>
			</div>
				<div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 col-xs-12"></div>
			</div>
			</div>
			</div>

	
		
				<div class="row">
		<div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12"> <a href="http://localhost/help-center-for-buyer" style="color: #DC5765;font-weight: 550;font-size: 16px;">Need Help?</a></div>
				<div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 col-xs-12"></div>
					<div class="col-md-1 col-lg-1 col-xl-1 col-sm-12 col-xs-12"></div>
			
				<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
			<div class="form-group">
            
			   <button class="btn btn-primary back3 prev_btn" type="button" style="padding: 10px; background: #44A5D6;"><span class="glyphicon glyphicon-chevron-left"></span>Prev</button> 
                <button class="btn btn-primary open3 next_btn" type="button" style="padding: 10px; background: #44A5D6;margin-left: 25px;">Next <span class="glyphicon glyphicon-chevron-right"></span></button> 
             
            </div>
			</div>
			
		</div>
          </fieldset>
        </div>
</div>
</div>
</div>
 </div>
 </div>
 
 
 
     <div id="sf4" class="frm" style="display: none;v">
  <div class="row">
<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 p1" >
<div class="side_bar" >
<div class="" style="text-align: center;height: 100px;">
	<img src="images/sale.svg" class="" style="height:80px; width:80px;">
	</div>
<h4 style=" text-align: center; color: #44A5D6;">Pick a Price</h4>


<center style="text-align:center;color:#9F9F9F;font-weight: 600;font-family: lato,sans-serif;font-size: 15px;">Product price($)</center>
<p style="text-align:center;font-size: 13px;color:#838383;">
Using lorem ipsum to focus attention on graphic elements in a webpage design proposal
</p>


<center style="text-align:center;color:#9F9F9F;font-weight: 600;font-family: lato,sans-serif;font-size: 15px;">Discount Rate($)</center>
<p style="text-align:center;font-size: 13px;color:#838383;">
Using lorem ipsum to focus attention on graphic elements in a webpage design proposal
</p>


<center style="text-align:center;color:#9F9F9F;font-weight: 600;font-family: lato,sans-serif;font-size: 15px;">Product Stock</center>
<p style="text-align:center;font-size: 13px;color:#838383;">
Using lorem ipsum to focus attention on graphic elements in a webpage design proposal
</p>


</div>


</div>
<div class="col-md-8 col-lg-8 col-xl-8 col-sm-12 col-xs-12 steps" >

  <div class="display_form">
   
    <div class="panel-body">
		<div class="text-center success_message" style="color:green"><?php echo $success_message;?></div>
		<div class="text-center restriction_message" style="color:red"></div>
     
        
      
          <fieldset>
					  <div class="row">
					  <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
		 &nbsp;  &nbsp;<h5 style="font-size: 14px;font-weight: bold;font-family: lato,sans-serif;">STEP 4:Pricing</h5>
		      </div>
		  </div>
			<br>
		  <div class="row">
		   
			<div class="col-md-10 col-lg-10 col-xl-10 col-sm-12 col-xs-12">
				 <div class="form-group md-form" style="    margin-bottom: -9px;">
                        
                        <input id="product_price" type="number"  placeholder="Product Price($)" name="product_price" class="form-control validate" style="height: 70px;">
					</div>
					<div class="clearfix" style="height: 10px;clear: both;"></div>
					
					  
                    <div class="form-group md-form mt-3" style="margin-bottom: -7px;">
                       
                       <input id="discount_rate" type="number"  placeholder="Discount Rate(%)"  name="discount_rate" class="form-control validate" style="height: 70px;">
                    </div>
					<div class="clearfix" style="height: 10px;clear: both;"></div>
					<div class="form-group md-form mt-3" style="    margin-bottom: -5px;">
                        
                       <input id="product_qty" type="number" placeholder="Product Stock"  name="product_qty" class="form-control validate" style="height: 70px;">
                    </div>
						<input type="hidden" name="idu"  value="<?php echo $idu; ?>" >
					<input type="hidden" class="btn  btn-danger btn-flat" name="command" value="insert" />
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<input type="hidden" value="<?php echo $plan; ?>" id="plan"/>
						<input type="hidden" value="<?php echo $count_prod; ?>" id="prod_count"/>
					</div>
					</div>
					<div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12">
					</div>
					</div>
					<br>
				<div class="row">
		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12"> <a href="http://localhost/help-center-for-buyer" style="color: #DC5765;font-weight: 550;font-size: 16px;">Need Help?</a></div>
				
				<div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
			<div class="form-group">
              <div class="pull-right" >
			   <button class="btn btn-primary back4 prev_btn" type="button" style="padding: 10px; background: #44A5D6;"><span class="glyphicon glyphicon-chevron-left"></span>Prev</button> 
                <button class="btn btn-primary open1 next_btn" type="submit "style="padding: 10px 60px; background: #44A5D6;margin-left: 25px;">Submit </button> 
              </div>
            </div>
			</div>
			<div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12"></div>
			 </div>
          </fieldset>
        </div>
</div>
</div>
</div>
 </div>
 </div>
  </div>
			
		
			
			 
			 
			 
		
      </form>
   
 






<div class="modal fade" id="upload_criteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" style="width: 940px">
      <div class="modal-content" >	

		
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="http://localhost/themes/dolphin/images/icons/005-unchecked-1.png" height=27px; width=27px;/></button>        --> 
	
		
   
        <div class="modal-body criat_up">
	
            <div class="row">
			<div  class=" col-lg-8 col-md-8 col-sm-8 col-xs-12" style="    padding-left: 35px;">
			<h2>Upload Criterias</h2>
			 </div>
			 <div  class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<div class="pull-right">
		<button type="button" class="close " data-dismiss="modal" style="    margin-right: 9px;"><img src="http://localhost/images/005-unchecked-1.png" style="width: 40px;padding: 2px;"></button>
		</div>
           </div>
			</div>			
			<div class="row">
			 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="    padding-left: 38px;">
			<div  style="height:239px; width:860px;background:#f2f2f2; padding: 18px;">
			 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			
				<div class="">
		<img src="http://localhost/themes/dolphin/images/Group 440.png" class="img-responsive" />
					</div>
		
			
			</div>
			
				 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			
				<div class="">
			<img src="http://localhost/themes/dolphin/images/1111.png" class="img-responsive" />
					</div>
		
			
			</div>
			
					 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			
				<div class="">
			<img src="http://localhost/themes/dolphin/images/3333.png" class="img-responsive" />
					</div>
		
			
			</div>
			</div>
		<!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<img src="http://localhost/themes/dolphin/images/Group 440.png" class="img-responsive" />
			
	
			</div>
			 -->

			</div>
			</div>
		<div class="row">
		 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="    padding: 20px;">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class=""><center>
			<h5 style="color:#CE2E2E;font-weight: 550;">Do not use blurred images</h5>
			</center>
			<center><p style="font-size:12px;" >Do not enlarge your images in Photoshop or any other photo-editing program. When you enlarge an image, the image instantly becomes blurry, blocky, and unprintable. The small image that appears on our website will still look OK, but when you zoom in and look at the high resolution version, you'll see that it's blurry and blocky. If your image is blurry and blocky, we can't use it to produce a print. If you want a larger image then you need to purchase a higher-resolution digital camera or scanner.</p>
			</center>
			</div>
			</div> 
			
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="">
			<div ><center><h5 style="color:#CE2E2E;font-weight: 550;">Make Sure Your Cropping is OK</h5></center></div>
			<div><center><p style="font-size:12px;"> Make sure that your images are cropped correctly. Absolutely everything that appears in your images will apper in your prints. That means if you forget to crop your image tight enough and there is a tiny silver of the wall showing in the corner of your image, your buyers will return your prints and ask for a refund. Please take the time to zoom in on your images and make sure that they cropped perfectly. You won't be able to see small mistakes without zooming in. When in doubt, crop more than you think you should.</p></div>
			</center>
			</div></div>
			
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="">
				<center>
			<h5 style="color:#CE2E2E;font-weight: 550;">Check for Focus/Motion Blur & Flash Glare</h5></center>
			<center><p style="font-size:12px;"> Zoom in on your images before you upload them to Showflipper and make sure that the high resolution versions are in focus and that there is no unintentional motion blur.Check your highresolution images to make sure that you don't have hot spots for flash. </p>
			</center>
			</div>
			</div>

 </div>         
</div>

</div>
</div>
</div>
</div>


<?php $skin = new skin('shared/footer');
echo $skin->make(); ?>
</div>
</div>
</body>

</html>
<script type="text/javascript" src="jquery.validate.js"></script>
<script type="text/javascript">
	/*adimage1*/
  function readURL(input) {
	
        if (input.files && input.files[0] ) {
		
            var reader = new FileReader();

            

            reader.onload = function (e) {
				e.preventDefault();
                $('#preview_img1').attr('src', e.target.result);
				


            }
			

            reader.readAsDataURL(input.files[0]);

        }
  }
    $("#imgEditInput1").change(function(e){
	e.preventDefault();
    $('#preview_img1').attr('src', e.target.result).show();

    }); 
	
	
	   function readURL1(input) {
	
        if (input.files && input.files[0] ) {
		
            var reader = new FileReader();

            

            reader.onload = function (e) {
				e.preventDefault();
                $('#preview_img2').attr('src', e.target.result);
				


            }
			

            reader.readAsDataURL(input.files[0]);

        }
  }
    $("#imgEditInput2").change(function(e){
	e.preventDefault();
     $('#preview_img2').attr('src', e.target.result).show();

    });

	

 	   function readURL2(input) {
1
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            

            reader.onload = function (e) {
				e.preventDefault();
                $('#preview_img3').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);

        }

    }
 $("#imgEditInput3").change(function(){

     $('#preview_img3').attr('src', e.target.result).show();

    });
	</script> 
	<script>
	
	
	    function readURL3(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            

            reader.onload = function (e) {
					e.preventDefault();
                $('#preview_img4').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);

        }

    }

    $("#imgEditInput4").change(function(e){
	e.preventDefault();
     $('#preview_img4').attr('src', e.target.result).show();

    });

function readURL4(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            

            reader.onload = function (e) {
					e.preventDefault();
                $('#preview_img5').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);

        }

    }

    $("#imgEditInput5").change(function(e){
	e.preventDefault();
    $('#preview_img5').attr('src', e.target.result).show();
    }); 
	
	
</script>

 <script type="text/javascript">
 $(function () {
    $(".open3").bind("click", function () {
        //Get reference of FileUpload.
        var fileUpload = $("#imgEditInput1")[0];
 alert();
        //Check whether the file is valid Image.
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase())) {
            //Check whether HTML5 is supported.
            if (typeof (fileUpload.files) != "undefined") {
                //Initiate the FileReader object.
                var reader = new FileReader();
                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {
                    //Initiate the JavaScript Image object.
                    var image = new Image();
                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;
                    image.onload = function () {
                        //Determine the Height and Width.
                        var height = this.height;
                        var width = this.width;
						
                        if (height > 250 && width > 250) {
							alert( height."".width);
                           $("#warn").html("Height and Width must not exceed 250px");
                            return false;
                        }
                        $("#warn").html("valid image");
                        return true;
                    };
                }
            } else {
           
                return false;
            }
        } else {
          
            return false;
        }
    });
});

</script>

    </script>
<script type="text/javascript">
  
  jQuery().ready(function() {
 
    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({
   rules: {
           product_title: "required",
				min_price: {
					required:true,
					number:true
				},
				product_price: {
					required:true,
					number:true
				},
				frame_type:{
					required:true
				},
				
				product_qty:{
					required:true,
					number:true
				},
				product_specification: {
					 required: true,
					 minlength: 50
				},
				product_desc: {
					 required: true,
					 minlength: 100
				},
				adimage1:{
					required:true
				},
				adimage2:{
					required:true
				},
				adimage3:{
					required:true
				},
				adimage4:{
					required:true
				},
				product_material: "required",				
				product_category:"required",
				product_medium:"required",
				product_shapes:"required",
				product_size:"required",
				product_style:"required",
				prod_sub_cat_id_rand:"required",
				prod_sub_cat_child_id_post:"required",
				Place:"required",
				Medium:"required",
				Subject:"required",
				How:"required",
				Location:"required",
				Genere:"required",
				Material:"required",
				Orientation:"required",
				Gender:"required",
				Women:"required",
				Men:"required",
				product_purpose:"required",
				gender_type:"required",
				book_pdf:"required",
				download_book_pdf:"required",
				product_collection:"required"
				
				
        },
		  messages: {
            	product_title:"Please enter product name",
				min_price:{
					required:"Please enter product minimum price",
					number:"Please enter numeric value"
				},
				product_qty:{
					required:"Please enter product quantity",
					number:"Please enter numeric value"
				},
				product_price:{
					required:"Please enter product maximum price",
					number:"Please enter numeric value"
				},
                               

				frame_type:{
					required:"Please enter frame type"
				},
				product_specification: {
					required: "Please enter product specification",
					minlength: "Your specification must be at least 50 characters long"
				},
				product_desc: {
					required: "Please enter product description",
					minlength: "Your description must be at least 100 characters long"
				},
                                
			adimage1:{
					required:"Please select product images"
				
				},
				                     
			adimage2:{
					required:"required"
				},
				adimage3:{
					required:"required"
				},
				adimage4:{
					required:"required"
				},
				gender_type:"Please select gender type",
				download_book_pdf:"Please select download pdf",
				book_pdf:"Please select book pdf",
				product_material:"Please enter product material",
				product_category:"Please enter product category",
				product_medium:"Please enter product medium",
				product_shapes:"Please enter product shapes",
				product_size:"Please enter product size",
				product_style:"Please enter product style",
				prod_sub_cat_id_rand:"Please select type",
				prod_sub_cat_child_id_post:"Please select product subtype",
				Place:"Please select place",
				Medium:"Please select medium",
				Subject:"Please select subject",
				How:"Please select how",
				Genere:"Please select genere",
				Location:"Please select location",
				Material:"Please select material",
				Orientation:"Please select Orientation",
				Gender:"Please select gender",
				Women:"Please select women",
				Men:"Please select men",
				product_purpose:"Please enter product purpose",
				product_collection:"Please enter product collection"
				
				
        },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("fast");
		// $('.LINK').next('.display').find('a').trigger('click');
      }
    });
	   $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("fast");
		// $('.LINK').next('.display').find('a').trigger('click');
      }
    });
	
	 $(".open3").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf4").show("fast");
		// $('.LINK').next('.display').find('a').trigger('click');
      }
    });
	 $("#sf1_div").click(function() {
		 if (v.form()) {
		$(".frm").hide("fast");
        $("#sf1").show("fast");
		 }
    });
	
	 $("#sf2_div").click(function() {
		 if (v.form()) {
		$(".frm").hide("fast");
        $("#sf2").show("fast");
		 }
    });
$("#textssf1_div").click(function() {
		 if (v.form()) {
		$(".frm").hide("fast");
        $("#sf1").show("fast");
		 }
    });
	
	 $("#textssf2_div").click(function() {
		 if (v.form()) {
		$(".frm").hide("fast");
        $("#sf2").show("fast");
		 }
    });
 
	 $("#sf3_div").click(function() {
		 if (v.form()) {
		$(".frm").hide("fast");
        $("#sf3").show("fast");
		 }
      
    });
	
	 $("#sf4_div").click(function() {
		 if (v.form()) {
		$(".frm").hide("fast");
        $("#sf4").show("fast");
		 }
      
    });
	 $("#textssf3_div").click(function() {
		 if (v.form()) {
		$(".frm").hide("fast");
        $("#sf3").show("fast");
		 }
      
    });
	
	 $("#textssf4_div").click(function() {
		 if (v.form()) {
		$(".frm").hide("fast");
        $("#sf4").show("fast");
		 }
      
    });
     
   $('.gly').hide();
$('.gly1').hide();
$('.gly2').hide();
	$('.gly3').hide();
  jQuery('.ico').click(function(e){
    e.preventDefault();
	
	$('.gly').show();
	
	$('.gly1').hide();
	$('.gly2').hide();
	$('.gly3').hide();
	
  });

    jQuery('.ico1').click(function(e){
    e.preventDefault();
	$('.gly').hide();
	$('.gly1').show();
	$('.gly2').hide();
	$('.gly3').hide();
	
  });
   jQuery('.ico2').click(function(e){
    e.preventDefault();
	$('.gly').hide();
	$('.gly1').hide();
	$('.gly2').show();
	$('.gly3').hide();
	  });
 
   jQuery('.ico3').click(function(e){
    e.preventDefault();
	$('.gly').hide();
	$('.gly1').hide();
	$('.gly2').hide();
	$('.gly3').show();
	
  });
/* $('.open4').on('click',function(e){

	
	var form_data = $('#basicform');
	 $.ajax({
		
		 type:'POST',
		url:'http://localhost/administrator/model/new_insert_product.php',
		data:form_data.serialize(),
		success:function(response)
		{
			
		
			
		}
		
		
	 });   
	
}); */
    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("fast");
	    $('.nav-tabs > .active').prev('li').find('div.steps-step-3 a').trigger('click');
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("fast");
	    $('.nav-tabs > .active').prev('li').find('div.steps-step-3 a').trigger('click');
    });
	
	 $(".back4").click(function() {
      $(".frm").hide("fast");
      $("#sf3").show("fast");
	    $('.nav-tabs > .active').prev('li').find('div.steps-step-3 a').trigger('click');
    });

 
 });
  
 
  
</script>
