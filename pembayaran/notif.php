<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
</head>
<body>


<script src="js/sweetalert.min.js"></script>
<script>
	swal({
  title: "Terkirim!",
  text: "Bukti pembayaran terkirim",
  type: "success",
  showConfirmButton: true
}, function(){
      window.location.href = "pembayaran2.php";
});
</script>
</body>
</html>