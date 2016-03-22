<?php 
$catid = $_POST['id']; 
echo $catid;

$myfile = fopen("catsid.php", "w") or die("Unable to open file!");
$txt = "<?php \$catid = '$catid' ?>";
fwrite($myfile, $txt);

fclose($myfile);

?>