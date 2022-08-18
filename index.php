<?php
include('settings/config.php');
//echo '<pre>';print_r($_POST);
extract($_POST);
$table = "contact";

if(isset($_POST['submit'])){ //echo '<pre>';print_r($_POST);
    $error = array();
       	if($_POST['contactname']==''){ $error[]='Please enter contact name.';}
        $name = trim($_POST["contactname"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    
        }
	if($_POST['contactemail']=='' ){ $error[]='Please enter contact Email.';}
        $email = $_POST["contactemail"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        }
        if($_POST['contacttelephone']=='' ){ $error[]='Please enter Phone no.';}
        if((preg_match("/[^0-9]/", '', $_POST['contacttelephone'])) && strlen($_POST['contacttelephone']) == 10)
        $error[]="Invalid phone number";       
        if($_POST['contactregion']=='' ){ $error[]='';} 
        $subject = "Thank you for registering with us.";
        if(($contactregion == "Churchgate to Bandra")||($contactregion == "CST to Kurla")){
            $to = "dadar@bmconsultantsindia.com"; 
        }
        if(($contactregion == "Khar to Jogeshwari")||($contactregion == "Versova/Juhu to Andehri(E)/Asalpha")){
            $to = "andherieast@bmconsultantsindia.com";
        }
        if($contactregion == "Goregaon to Virar"){
            $to = "kandivali@bmconsultantsindia.com";
        }
        if(($contactregion == "Vidyavihar to Karjat / Kasara")||($contactregion == "Thane to Panvel")){
            $to = "thane@bmconsultantsindia.com";
        }        
         $headers  = "From:internet-inquiry@bmconsultantsindia.com\r\n";
         $headers .= "CC:sanjeev.dubey33@gmail.com,piyushbmbhatia@gmail.com,rahulgraphicsbm@gmail.com,admin1@bmenglishspeaking.com,admin2@bmenglishspeaking.com,kmazhar16@gmail.com \r\n"; 
         $headers .= "Content-type: text/html\r\n"; 
         $body ="<p> Thank you for contacting with us</p><br/> You have provided us following detail:<br/><b>Name: </b>".$name."<br/><b>Email: </b>".$email."<br/><b>Phone Number: </b>".$contacttelephone."<br/><b>Preferred Region: </b>".$contactregion;
            
        if(!$error)
	{
        $columnNames = $utils->getColumnNameOfTable($table);
        $fields = $utils->getTableColumnAsArray($columnNames);
        $values = array($contactname,$contactemail,$contacttelephone,$contactregion,CURRENTTME);
        $res_msg = $db->insertIntoTable($table,$fields,$values);
       if(is_numeric($res_msg))
	 {
           $utils->sendmail($to,$subject,$body,$headers);
	   header("Location:thankyou.html");
	 }
        }
    else{
     $error[]='';        
    }
} 
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<!-- Global site tag (gtag.js) - Google Ads: 10896481811 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10896481811"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-10896481811');
</script>

<head>
<!-- Basic Page Needs
  ================================================== -->
<meta charset="utf-8">
<title>BM Consultants</title>
<meta name="description" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Skin (you can set a different color skin here - just change the name of the color)
  ================================================== -->


<!-- CSS
  ================================================== -->
<link rel="stylesheet" href="stylesheet/style.css">
<link rel="stylesheet" href="stylesheet/blue.css">
<link rel="stylesheet" href="stylesheet/styleresponsive.css">
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Favicons
	================================================== -->
<link rel="shortcut icon" href="image/favicon.ico">
<link rel="apple-touch-icon" href="image/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="image/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="image/apple-touch-icon-114x114.png">
<script src="javascript/validate.js"></script>
</head>
<body>
<!-- Navigation
	================================================== -->
<div id="wrapnav">
	<div class="container">
		<div class="three columns alpha">
			<div id="top" style="display:inline;">
				<span class="logo">
					<img src="image/logo.png" width="215px" height="85px" />					
				</span>
				</div>
		</div>
	</div>
	</div>
<!-- Header
	================================================== -->
<div class="header">
	<div class="container">
		<div class="nine columns alpha">
			<div class="rslides_container">
				<ul class="rslides" id="slider2">
					<li><a href="#"><img src="image/slide1.jpg" alt="" class="slidepic"></a></li>
					<li><a href="#"><img src="image/slide2.jpg" alt="" class="slidepic"></a></li>
					<li><a href="#"><img src="image/slide3.jpg" alt="" class="slidepic"></a></li>
					<li><a href="#"><img src="image/slide4.jpg" alt="" class="slidepic"></a></li>
					<li><a href="#"><img src="image/slide5.jpg" alt="" class="slidepic"></a></li>
				</ul>
			</div>
		</div>
		<div class="seven columns omega">
			<div class="slidertext">
			
				
			
				<div id="form_box">
	<div class="bm_form">
    <h3>For more details call us at:</h3>
    <a href="tel:+91 80807 21515">+91 80807 21515</a>
     <h3>OR</h3>
      <h3>Register for FREE demo</h3>
       <h3>session</h3>
       <div style="margin-left: 24px;margin-top: 10px; width:250px;"><?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger" style="margin-bottom: 4px !important;color:red;">'.$error.'</p>';
					}
				}
				  
        ?>
			
    </div>
    <form method="post" enctype="application/x-www-form-urlencoded" name="form1" action="" onsubmit="return registration_validate();">
    <input type="text" name="contactname" class="test" id="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name*';}"  value="Name*"/>
    <input type="text" name="contactemail" class="test" id="email" value="Email*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email*';}"  />
    
    
    
    
    
    <input type="text" name="contacttelephone" class="test" id="phone" maxlength="10" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone Number*';}"  value="Phone Number*" onkeypress="return numbersOnly(event,false)"/>
    
    
    
    
    
    
    <select class="styled" name="contactregion" id="region">
 <option value="" >Select Your Preferred Region</option>
<option value="Churchgate to Bandra" >Churchgate to Bandra</option>
<option value="Khar to Jogeshwari">Khar to Jogeshwari</option>
<option value="Versova/Juhu to Andehri(E)/Asalpha">Versova/Juhu to Andehri(E)/Asalpha</option>
<option value="Goregaon to Virar">Goregaon to Virar</option>
<option value="CST to Kurla" >CST to Kurla</option>
<option value="Vidyavihar to Karjat / Kasara" >Vidyavihar to Karjat / Kasara</option>
<option value="Thane to Panvel">Thane to Panvel</option>
</select>

<input type="submit" class="bigbutton" value="I want to learn English" name="submit">
</form>
</div>

</div>
			</div>
		</div>
	</div>
</div>
<div class="afterheader">
</div>
<!-- Features Section
================================================== -->
<div class="scrollpause">
</div>
<div class="container" id="features">
	<div class="sixteen columns neg">
		<div class="titleborder">
			<span class="title colorme"> Course Includes</span>
		</div>
	</div>
</div>
<div class="container">
	<div class="courses column">
		<h3><img src="image/icon1.png" alt="" class="middlealign"> English Fluency</h3>
		<p align="justify">
			This course is for someone who is good at work but makes grammar mistakes, cannot frame sentences and is not able to speak fluently in English. 
		</p>
	</div>
	<div class="courses column">
		<h3><img src="image/icon2.png" alt="" class="middlealign"> Communication Skills</h3>
		<p align="justify">
			This course is for someone who wants to develop confidence to speak to Groups of people, improve body language, learn grooming and develop overall personality. 
		</p>
	</div>
	<div class="courses column">	
		<h3><img src="image/icon3.png" alt="" class="middlealign"> Interview & GD</h3>
		<p align="justify">
			This course is for someone, who is either just a fresher or about to change job or appear for an appraisal interview. In this course you will practise to answer many tricky interview questions.
		</p>	
	</div>
	<div class="courses column">	
		<h3><img src="image/icon4.png" alt="" class="middlealign"> Business English</h3>
		<p align="justify">
			This course is for someone who wants to upgrade from regular English to Business English, use smart vocabulary and draft professional emails. 
		</p>
	</div>
	<div class="courses column">	
		<h3><img src="image/icon5.png" alt="" class="middlealign"> Corporate Training</h3>
		<p align="justify">
			This course enhances personal effectiveness and also serves as employee retention program. 
		</p>
	</div>
	<div class="courses column">	
		<h3><img src="image/icon6.png" alt="" class="middlealign"> Train The Trainer</h3>
		<p align="justify">
			This course is to develop Corporate Trainers with excellent Communication Skills and mastery in conducting result-oriented interactive sessions 
		</p>
	</div>
</div>
<!-- Guarantee Section
================================================== -->
<div class="scrollpause">
</div>
<div align="center">
<div class="container" id="guarantee">
	<div class="sixteen columns">
		<div class="titleborder">
			<span class="title colorme">Know More</span>
		</div>
	</div>
</div>
</div>
<div class="container">
	<div class="one-third column separatorv">	  
		<h3><img src="image/iconq.png" alt="" class="middlealign"> Testimonial</h3>
		<p class="paddright">
			<img src="image/darshan.jpg" /><br>
			 This course has helped me to speak very fluent English and I can now also give Presentations confidently.<br>
			 <span class="author">- Darshan Gosalia, Student SYBE (Electronics). Somaiya College-</span>
		<p>
		<p class="paddright">
			 <img src="image/sanjay.jpg" /><br>
			 The entire training was interactive, result oriented and effective. The Participants have demonstrated a remarkable improvement in English, Confidence and Communication skills.<br>
			 <span class="author">- Sanjay Mehta - GE India Industrial Pvt. Ltd.-</span>
		</p>	
	</div>
	<div class="two-thirds column omega">
	<h3> BM English Speaking</h3>
		<p align="justify">
			Welcome to a team of professional trainers who have trained individuals and corporates to effectively present their ideas in a clear, concise, convincing manner. We offer English Communication Trainings at our four centers in Mumbai and also specialize in conducting customized corporate training programs.
		</p>
		<p align="justify">
			Even if your people are already excellent presenters who only wish to pick up a few tips and techniques - our presentation skills training workshops can help! The benefits to you will be more effective presentations, more effective meetings and seminars (both one-to-one and one-to-group), elimination of confusion, increased productivity, increased morale, and tremendous savings of time and money.
		</p>
		<p>
			A brief overview of our products & services are as under:
			<ul>
				<li>English Communication Training Programs at our Centers in Mumbai</li>
				<li>Customized Corporate Training Programs</li>
				<li>Train-The-Trainer Program</li>
				<li>Learn English Online</li>
			</ul>
		</p>
	</div>
</div>

	<div class="copyright">
		<div class="gototopmobile">
			<a href="#top">Go to Top</a>
		</div>
		 Copyright &copy; 2014 BM English Speaking Academy |<a href="privacy-policy.html" target="blank"> Privacy Policy</a>
	</div>
	<!-- Scripts
================================================== -->
	<script src="javascript/jquery.min.js"></script>
	<script src="javascript/responsiveslides.min.js"></script>
	<script src="javascript/smoothscroll.js"></script>
	
    <script type="text/javascript" src="javascript/jquery.customSelect.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#phone').keydown(function (e) {
                if (e.shiftKey || e.ctrlKey || e.altKey) {
                    e.preventDefault();
                } else {
                    var key = e.keyCode;
                    if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                        e.preventDefault();
                    } else {
                        if ($.trim($(this).val()).length == 0) {
                            if (event.keyCode == 48 || event.keyCode == 96) {
                                event.preventDefault();
                            }
                        }
                    }
                }
            });
        });
    </script>
<script type="text/javascript">
         $(document).ready(function() {
            
                 $('#phone').keydown(function(e) {
                     if (e.shiftKey || e.ctrlKey || e.altKey) {
                         e.preventDefault();
                     } else {
                         var key = e.keyCode;
                         if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                             e.preventDefault();
                         }
                     }
                 });
                
               
               
                
             });
        

      
    </script>
    
    
    
	<script type="text/javascript">
$(function(){

$('select.styled').customSelect();

});
</script>
	
	<!-- End Document
================================================== -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-470856-1', 'bmconsultantsindia.com');
  ga('send', 'pageview');

</script>
<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1066890305;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1066890305/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</body>
</html>