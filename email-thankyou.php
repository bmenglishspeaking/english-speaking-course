<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>Thank You for your feedback</title>
<!--<META HTTP-EQUIV="refresh" CONTENT="15;URL= https://www.bmconsultantsindia.com/advanced-english-speaking-course.html">-->
<meta name="description" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Skin (you can set a different color skin here - just change the name of the color)
  ================================================== -->
<link rel="stylesheet" href="stylesheets/skins/blue.css">

<!-- CSS
  ================================================== -->
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="stylesheet" href="stylesheets/styleresponsive.css">
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Favicons
	================================================== -->
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
<?php
	
	// Grab the form vars
	$email = (isset($_POST['contactemail'])) ? $_POST['contactemail'] : '' ;
	$name = (isset($_POST['contactname'])) ? $_POST['contactname'] : '' ;
	$telno = (isset($_POST['contacttelephone'])) ? $_POST['contacttelephone'] : '' ;
	//$faxno = (isset($_POST['contactfax'])) ? $_POST['contactfax'] : '' ;
	//$website = (isset($_POST['contactwebsite'])) ? $_POST['contactwebsite'] : '' ;
	$preferredregion = (isset($_POST['preferredregion'])) ? $_POST['preferredregion'] : '' ;
	// Check for email injection
	if (has_emailheaders($email)) {
		die("Possible email injection occuring");
	}
        switch($preferredregion)
        {
            case "Churchgate to Bandra":
                $to = "dadar@bmconsultantsindia.com, dadarsales1@bmenglishspeaking.com";
                break;
            case "Khar to Jogeshwari":
                $to = "andherieast@bmconsultantsindia.com, andherisales1@bmenglishspeaking.com";
                break;
	case "Versova / Juhu to Andehri(E) / Asalpha":
                $to = "andherieast@bmconsultantsindia.com, andherisales1@bmenglishspeaking.com";
                break;
            case "Borivali to Virar":
                $to = "kandivali@bmconsultantsindia.com, kandivalisales1@bmenglishspeaking.com";
	case "CST to Kurla":
                $to = "dadar@bmconsultantsindia.com, dadarsales1@bmenglishspeaking.com";
                break;
            case "Vidyavihar to Karjat / Kasara":
                $to = "thane@bmconsultantsindia.com, thanesales1@bmenglishspeaking.com";
                break;
            case "Thane to Panvel":
                $to = "thane@bmconsultantsindia.com, thanesales1@bmenglishspeaking.com";
                break;       
            default:
                $to = "bmenglishgraphics@gmail.com";
                break;            
        }
	$subject = "BM English Paid";
	$message = "
	<html>
	<head>
	<title>HTML email</title>
	</head>
	<body>
	<p style='padding-left:20%';>BM English Paid: Search Ad</p>
	<table border='1' width='60%'>
	<tr>
	<td width='28%'>Name</td><td width='2%'>:</td><td width='70%'>$name</td>
	</tr>
	<tr>
	<td>Email</td><td>:</td><td>$email</td>
	</tr>
	<tr>
	<td>Mobile No.</td><td>:</td><td>$telno</td>
	</tr>
	<td>Preferred Region</td><td>:</td><td><pre>$preferredregion</pre></td>
	</tr>
	</table>
	</body>
	</html>
	";
        $ccemailaddress = "piyushbmbhatia@gmail.com, bmengspkg@gmail.com, bmenglishspeaking2@gmail.com, bmenglishspeaking1@gmail.com, bmandheri1@gmail.com";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;cha rset=iso-8859-1" . "\r\n";
	$headers .= 'From: '. 'internet-inquiry@bmconsultantsindia.com' . "\r\n";
        $headers .= 'CC: '. $ccemailaddress . "\r\n";

	mail($to,$subject,$message,$headers);
	
	

function has_emailheaders($text) {
	return preg_match("/(%0A|%0D|\n+|\r+)(content-type:|to:|cc:|bcc:)/i", $text);
}
?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K4V8LCX');</script>
<!-- End Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Ads: 10896481811 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10896481811"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-10896481811');
</script>

</head>
<body>
	<div id="wrapnav">
		<div class="container">
			<div class="three columns alpha">
				<div id="top" style="display:inline;">
					<span class="logo">
						<img src="images/logo.png" />					
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="scrollpause"></div>
	<div class="container" id="guarantee">
		<div class="sixteen columns">
			<div class="titleborder">
				<span class="title colorme">Thank You</span>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="two-thirds column omega">
			<h3 style="color:#6dc9c7;"> BM English Speaking</h3>
			<p align="justify">
				Thank you for Submitting an enquiry.. We will get back to you shortly..<br>
				Go Back to <a href="index.html">Home Page</a>
			</p>
			<p align="justify">
				<h3 style="color:#6dc9c7;">Free English Tips</h3>
				Give a Missed Call on <strong>022 6140 3625</strong> from your Mobile to receive Free English Tips.
				<img src="images/sms-poster.jpg" />
			</p>
			<p align="justify">
				<h3 style="color:#6dc9c7;">English Tip for the Day:</h3>
				<p style="font-style:italic">READING LOUDLY always helps. Read any text (e.g. Newspaper Article) for 30 minutes daily. When  you read loudly, you speak correct English. Do this for 30 days for fluency development.</p>
			</p>
			<p align="justify">
				This page will be redirected to our Website in 15 seconds.
			</p>
		</div>
	</div>
	<div class="scrollpause"></div>
	<div class="copyright">
		<div class="gototopmobile">
			<a href="#top">Go to Top</a>
		</div>
		 Copyright &copy; 2022 BM English Speaking Academy
	</div>
	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '106994896316683'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<!-- Google Code for VS Leads Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1066890305;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "89QrCMOyrwUQwejd_AM";
var google_conversion_value = 1.000000;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1066890305/?value=1.000000&amp;label=89QrCMOyrwUQwejd_AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105226890-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-105226890-1');
</script>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K4V8LCX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</body>
</html>