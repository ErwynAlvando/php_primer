<?php
if ($c['level'] == "superadmin") {
    ?>

<?php 
	if(isset($_POST['upload'])){
	$ekstensi_diperbolehkan	= array('png','jpg','jpeg','gif');
	$nama = $_FILES['file']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$level = 'admin';
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];
	$nama_bank = $_POST['nama_bank'];	
	$nomor_rekening = $_POST['nomor_rekening'];	
	$nama_pemilik = $_POST['nama_pemilik'];	
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if($ukuran < 1044070){			
			move_uploaded_file($file_tmp, '../../uploads/bank/'.$nama);
			$query = mysqli_query($koneksi, "INSERT INTO tb_bank VALUES(NULL, '$nama','$nama_bank','$nomor_rekening','$nama_pemilik','','admin')");
			if($query){
				?>
					<script type="text/javascript">
						alert('Data Bank Berhasil Di Tambahkan');
						window.location = "?page=bank";
					</script>
				<?php
			}else{
				?>
					<script type="text/javascript">
						alert('Gagal Mengupload Icon bank');
						window.location = "?page=bank";
					</script>
				<?php
			}
		    }else{
				?>
					<script type="text/javascript">
						alert('Ukuran Icon Gambar Terlalu Besar');
						window.location = "?page=bank";
					</script>
				<?php
		    }
	       }else{
			?>
					<script type="text/javascript">
						alert('Hanya Bisa Mengupload Ekstensi PNG, JPG');
						window.location = "?page=bank";
					</script>
				<?php
	       }
    }
?>

    <?php
}else{
    ?>
    <script type="text/javascript">
        window.location = "?page=dashboard";
    </script>
    <?php
}
?>