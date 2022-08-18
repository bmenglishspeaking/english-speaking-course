<?php
include_once('settings/config.php');
$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;
$per_page = 20; // Set how many records do you want to display per page.
$startpoint = ($page * $per_page) - $per_page;
$table='contact';

if(isset($_POST['btnSubmit']))
{ 
    if(!empty($_REQUEST['txtFrom'])&&!empty($_REQUEST['txtTo'])){
      $from = date('Y-m-d',strtotime($_REQUEST['txtFrom']));  
      $to = date('Y-m-d',strtotime($_REQUEST['txtTo']));
      $where = " createdDate BETWEEN '".$from."' AND '".$to."'";   
      $DataVal = $utils->getValuesFromTable($table,$where);
    }
}
else 
{
    $where="1" ;
    $statement  = $utils->getValuesFromTable($table,$where);
    $total = count($statement);
    $where.= " LIMIT {$startpoint} , {$per_page}";
    $DataVal=$utils->getValuesFromTable($table,$where);

}

$search_cond='';
if(isset($_REQUEST['keyword']) || isset($_POST['search']))
{
    $search_cond="keyword={$_REQUEST['keyword']}";
}
// Call pagination function
//$pagination=$utils->pagination($total,$per_page,$page,$url='?',$search_cond);

if(isset($_REQUEST['btnExcel_x'])){
    $utils->exportToExcel();
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1"><title>
	BMenglish Leads Page
</title><meta name="robots" content="noindex" />
    
    <link href="css/style.css"rel="stylesheet" type="text/css" media="all">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
<!-- END: STYLESHEET -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	

     <script src="javascript/comman.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function (e) {
            $("#txtFrom").datepicker();
            $("#txtTo").datepicker();
        });
    </script>
    <script>
        $(document).ready(function (e) {
            $('#btnSubmit').click(function () {

                // from date
                if ($('#txtFrom').val() == "" || $('#txtFrom').val() == "From Date*") {
                    alert('Please enter from date');
                    $('#txtFrom').focus();
                    return false;
                }

                // to date
                if ($('#txtTo').val() == "" || $('#txtTo').val() == "To Date*") {
                    alert('Please enter to date');
                    $('#txtTo').focus();
                    return false;
                }
            });
        });
    </script>
        <style>
        .mGrid
        {
         width: 100%;
         background-color:#fff;
         margin:5px 0 10px,0;
         border: solid 1px #525252;
         border-collapse:collapse;       
        }
        .mGrid td 
        {
         padding: 2px;
         border: solid 1px #c1c1c1;
         color: #717171;  
		 text-align:center;  
        }
        .mGrid th
        {
        padding: 4px 2px;
        color: #fff;
        background: #424242 url(image/grd_head.png) repeat-x top;
        border-left:solid 1px #525252;
        font-family:Verdana;
        font-size:0.9em;    
        }
        .mGrid .alt 
        {
        background: #fcfcfc url(image/grd_alt.png) repeat-x top;
        }
        .mGrid .pgr 
        {
            background: #424242 url(image/grd_pgr.png) repeat-x top;
        }
        .mGrid .pgr table 
        {
            margin: 5px 0;
        }
        .mGrid .pgr td
        {   
        border-width: 0;   
        padding: 0 6px;   
        border-left: solid 1px #666;   
        font-weight: bold;   
        color: #fff;   
        line-height: 12px;   
        }     
        .mGrid .pgr a { color: #666; text-decoration: none; }  
        .mGrid .pgr a:hover { color: #000; text-decoration: none; }
        input.button-add {
          height: 20px;
          padding-left: 35px;
          padding-right: 10px;
          color: transparent;
          background: url("image/Submit_Btn.png") no-repeat 0px;
          cursor: pointer;
          vertical-align: middle;
		  border:0;
}
    
    </style>
</head>

<body>
    <form method="post" action="" id="form1">
    <div>

        <style>
            .btnSubmit {
                vertical-align:bottom;
                height:25px;
            }
            .pdbtn {padding-bottom:20px;
            }
        </style>
        <div>
        <img src="image/Blank_icon.png" width="100%" height="20" style="vertical-align:middle">
        <img class="pdbtn" src="image/NavBarBg.png" width="100%" height="5">
      </div>

        
        <span style="color:black; font-size:35px;padding-bottom:20px; "> Lead Management System: </span>  <br /> <br />
        <span id="lblfrom">From:</span>
        <input name="txtFrom" type="text" id="txtFrom" placeholder="From Date*" />
       
			                    </script><span id="lblto">To:</span>
        <input name="txtTo" type="text" id="txtTo" placeholder="To Date*" />
       
        
        <input type="submit" name="btnSubmit" id="btnSubmit" class="button-add" Text="" onclick="return validate();" />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="image" name="btnExcel" id="btnExcel" class="btnSubmit" text="" src="image/Download_Btn.png">
        <span id="lblError"></span>
        <br /><br />

       
         <div>
	<table class="mGrid" cellspacing="0" rules="all" border="1" id="GridViewLeads" style="border-collapse:collapse;">
		<tr>
			<th scope="col">Id</th><th scope="col">Name</th><th scope="col">Email</th><th scope="col">Mobile No</th><th scope="col">Prefered Location</th><th scope="col">Date</th>
		</tr>
           <?php 
           if(count($DataVal)>0){
           foreach($DataVal as $data){?>
                <tr>
			<td><?php echo $data['contactID'];?></td>
                        <td><?php echo $data['contactName'];?></td>
                        <td><?php echo $data['contactEmail'];?></td>
                        <td><?php echo $data['contactMobile'];?></td>
                        <td><?php echo $data['contactRegion'];?></td>
                        <td><?php echo $data['createdDate'];?></td>
		</tr>
            <?php } }
            else{
                echo '<tr>
                    <td colspan=6>No record found</td>
                    </tr>';
            }?>
	</table>
</div>

    </div>

 

    </form>
</body>
</html>







