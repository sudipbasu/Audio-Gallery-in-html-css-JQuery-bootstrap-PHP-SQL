<!DOCTYPE html>
<html>
<head>
<title>

</title>
</head>

<body>
<?php 
$con=mysqli_connect("localhost","root","","audio_gallery");
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $title=$_POST['title'];
    $old=$_FILES['audio']['tmp_name'];
    $audio="Server_Audio_".rand(1000,9999)."_".$_FILES['audio']['name'];
    $new='./uploads/'.$audio;
    move_uploaded_file($old,$new);
    $sql="insert into audio(TITLE ,AUDIO) values ('$title','$audio')";
    $n=mysqli_query($con,$sql);
    if($n)
    {
        ?>
        <script type="text/javascript">
				alert("Audio Uploaded");
				window.location.href="upload.php";
        </script>
        <?php 
    }else{
        ?>
         <script type="text/javascript">
         alert("Audio Failed to Upload");
			window.location.href="upload.php";
        </script>
        
        <?php 
    }
}
?>
</body>
</html>