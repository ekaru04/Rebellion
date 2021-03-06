<?php 

date_default_timezone_set('Asia/Jakarta');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Clean in Click</title>
	<link rel="icon" href="images/icon.jpg" type="images/icon.jpg">
    
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <style>
        .tdBreak{
            max-width: 150px;
            word-wrap: break-word;
        }
    </style>
    <!--//web-fonts-->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php include "sidebar.php";?>

        <!-- Page Content Holder -->
        <div id="content" style="padding:0">
            <!-- top-bar -->
            <?php include "nav.php"?>
            <!--// top-bar -->
            <!-- main-heading -->
            <div class="alert alert-primary" role="alert" style="margin-top:-48px">
            <h4 class="tittle-w3-agileits mb-0 mt-0">Data User</h4>
              
            </div>
            <!--// main-heading -->
            <section class="container">

                <div class="card-deck text-center row"> 
             <div class="modal fade simpan-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                          <?php //untuk membuat pesan bahwa data berhasil di inputkan
                            include "koneksi.php";
                           
                            if(isset($_GET['pesan'])){
                                $pesan = $_GET['pesan']; 
                                if($pesan == "input"){
                                    echo "Data berhasil di input.";
                                }else if($pesan == "update"){
                                    echo "Data berhasil di update.";
                                }else if($pesan == "hapus"){
                                    echo "Data berhasil di hapus.";
                                }
                                
                            }
                            ?>
                          </div>
                        </div>
                      </div>

	<!--elemen tabel-->
   

	<table class="table table-responsive"> 
		<tr class="thead" style="margin-left:-3%;" >
			<th>Username</th>
			<th>Nama Lapak</th>
			<th>Alamat</th>
			<th>Deskripsi</th>
            <th>Kategori</th>		
			<th>No tlp</th>
			<th>Email</th>
            <th>Expired</th>
            <th>Status</th>
            <th>Aksi</th>
		</tr>
		<?php 

		include "koneksi.php";
        //include merupan perintah untuk menyisipkanfile php ke dalam file php yang lainnya
        $query_mysql = mysqli_query($host,"SELECT * FROM tb_laundry")or die(mysql_error());
        //$data = mysqli_query($host,"select *, tb_iklan.durasi_iklan as durasi from tb_trx JOIN tb_iklan ON tb_iklan.id_iklan = tb_trx.id_iklan");
        //query mysql untuk menjalankan perintah pada mysql (untuk menampilkan data pada tabel user variabel)
        $nomor = 1;
        
        

		//menggunakan while php
		while($data = mysqli_fetch_array($query_mysql)){// $data perintah untuk menampilkan data
            $warnaAlternate = $nomor % 2 == 0 ? "#d4d3cf" : "#ffffff";
			//ber1fungsi memecahkan data menjadi array dan memasukkan ke dalma variabel data dalam bentuk perulangan
		?> 
		<tr style="background : <?php echo $warnaAlternate; ?>;">
			<td><?php echo $user = $data['username']; ?></td>
            <?php
            
                $queryKategori = mysqli_query($host, "SELECT tb_kategori.jenis_kategori FROM tb_laundry INNER JOIN tb_detail_kategori ON tb_detail_kategori.id_laundry = tb_laundry.id_laundry INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_detail_kategori.id_kategori WHERE tb_laundry.username = '$user'");
            ?>
			<td><?php echo $data['nama_laundry']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td class="tdBreak"><?php echo $data['deskripsi_laundry']; ?></td>
            <td>
                <?php
                while($reData = mysqli_fetch_array($queryKategori)){
                    echo "<li>".$reData['jenis_kategori']."</li>";
                }
                ?>
            </td>
            <td><?php echo $data['no_telp']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['expired']; ?></td>
            <td><?php echo $data['status']; ?></td>
			
			<td>
            <?php if($data['status'] == "Aktif"){?>
					<a class= "btn btn-danger btn-sm" href="non.php?id=
					<?php echo $data['username']; ?>&status=nonaktifkan">Nonaktifkan</a>
					<?php }else{ echo "<a class='btn btn-success btn-sm' href='non.php?id=".$data['username']."&status=aktifkan'>Aktifkan</a>"; } ?>
				<!-- <a class="edit" href="edit.php?id=<?php echo $data['username']; ?>"><img src="images/edit.png"  style="width:15%"></a> | -->
                <a class="btn btn-danger btn-sm"  href="hapus.php?id=<?php echo $data['id_laundry']; ?>">Hapus</a>
                <!-- <a class="hapus" href="hapus.php?id=<?php echo $data['username']; ?>"><img src="images/hapus.png"  style="width:50%"></a>					 -->
			</td>
		</tr>
		<?php $nomor++;} ?>
	</table>
        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebar').toggleClass('active');
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->
    <script>
$(window).load(function(){      
    <?php 
    if(isset($_GET['pesan'])){  
        ?>
        $('.modal').modal('show');
        
   <?php } ?>
    }); 

</script>
</body>
</html>