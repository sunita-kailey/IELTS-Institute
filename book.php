<?php
include_once('backend/code/config.php');
  $id=$_GET['id'];
	         $sql="select * from `e_books` where `id`=".$id;
   $result=get_data($sql);
   $books=$result->fetchAll();
   $path=$books[0]['link'];
   echo $path;
$file='backend/uploads/e_books/'.$path;;
$filename=$file;
header('content-type:application/pdf');
header('centent-Disposition:inline;filename"'.$filename.'"');
header('Content-Transfer_Encoding:binary');
header('Accept-Ranges:bytes');
@readfile($file);
?>