<?php
session_start();
if (($_SESSION['email'] == '') ){ 
   header("Location: index.php");
}
 include 'conn.php';

 if(isset($_POST['done'])){

 $country_id=$_GET['country_id'];
 $country_name = $_POST['country_name'];

 $q = " update countries set country_name='$country_name' where country_id=$country_id  ";

 $query = mysqli_query($conn,$q);

 header('location:display.php');
 }

?>

<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<?php 
include 'includes/header.php';
include 'includes/navbar.php';

?>
 
 <?php
 $country_id = $_GET['country_id'];
 $q ="select * from countries where country_id=$country_id";


 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
	 
	 ?>
 <body>

 <div class="col-lg-6 m-auto">
 
 <form method="post" enctype="multipart/form-data">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h4 class="text-white text-center">Add Country</h4>
 </div><br>
 
   <label>Name</label>
 <input required placeholder="Enter your Country Name" type="text" name="country_name" value="<?php echo $res['country_name']?>" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
<?php 
}
?>
</html>



<?php
include 'includes/footer.php';
?>