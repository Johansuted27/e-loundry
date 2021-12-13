<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
    /* table th {
          background: #0c1c60 !important;
          color: #fff !important;
          border: 1px solid #ddd !important;
          line-height:15px!important;
          text-align:center!important;
          vertical-align:middle!important;
 
      }
    table td{line-height:15px!important; text-align:center!important; border: 1px solid;} */
    </style>
    <title>Laporan Transaksi</title>
  </head>
  <body>
    <h1 style="text-align: center;">Laporan Transaksi</h1>
    <table border="1" width="100%" cellpadding="2" cellspacing="0" style="margin-top: 5px; text-align:center">
        <thead style="background-color: black;color:white;">
            <tr>
                <th>#</th>
                <th>Code Trx</th>
                <th>Type Laundry</th>
                <th>Status</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
        <?php $gt = 0; ?>
        <?php
            if(count($trx) > 0){
                foreach($trx as $index => $data){
                    ?>
                    <tr>
                      <td><?= ($index+1) ?></td>
                      <td style="text-align: left !important;"><?= $data->code_trx ?></td>
                      <td class="text-capitalize"><?= $data->type ?></td>
                      <td><?= $data->status ?></td>
                      <td>Rp. <?= number_format($data->total_price,2,',','.') ?></td>
                    </tr>
                    <?php
                $gt += $data->total_price; }
            }
        ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="4">Grand Total</th>
            <th>Rp. <?= number_format($gt,2,',','.') ?></th>
          </tr>
        </tfoot>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>