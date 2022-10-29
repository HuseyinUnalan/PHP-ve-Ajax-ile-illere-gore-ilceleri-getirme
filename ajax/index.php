<?php

require_once 'baglan.php';
require_once 'fonksiyon.php';

$ilList = $db->query("select * from iller")->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"> </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
  .fa:hover {
    opacity: 0.7;
  }

  .fa-linkedin {
    background: #007bb5;
    color: white;
  }
</style>

<body>

  <div class="container mt-5">
    <h2>İllere Göre İlçe Çekme</h2>
    <p>Ajax ile veritabanından illere göre ilçeleri getirme.</p>


    <form action="" method="POST">

      <div class="form-group">
        <label for="sel1">İl Seçiniz</label>
        <select class="form-control" id="il" name="">
          <option>İl Seçin</option>

          <?php
          foreach ($ilList as $key => $value) {
            echo '<option value="' . $value['il_no'] . '" >' . $value['isim'] . '</option>';
          }
          ?>

        </select>
        <br>
      </div>


      <div class="form-group">
        <label for="sel1">İlçe Seçiniz</label>
        <select class="form-control" id="ilce" name="">
          <option>İlçe Seçin</option>

          <?php
          foreach ($ilceList as $key => $value) {
            echo '<option value="' . $value['ilce_no'] . '" >' . $value['isim'] . '</option>';
          }
          ?>

        </select>
        <br>
      </div>




    </form>
  </div>

  <div class="container">
    <a href="https://www.linkedin.com/in/h%C3%BCseyin-%C3%BCnalan-571143234/" target="_blank" class="fa fa-linkedin p-2"></a>
  </div>

</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    $("#il").change(function() {
      var il_no = $(this).val();
      $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {
          "il": il_no
        },
        success: function(e) {
          $("#ilce").show();
          $("#ilce").html(e);
        }
      });
    });
  });
</script>