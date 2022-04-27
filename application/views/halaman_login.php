<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Untuk tampilan, pemanggilan file css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/sb-admin-2.min.css">
    <title>PERPUSTAKAAN</title>
</head>
<body>

           

    <!-- agar posisi ditengah -->
    <div class="row">
        <div class="col-md-4"> </div>  
        <div class="col-md-3 mt-5">
            <form action="<?= base_url('login/do_login')?>" method="post">

            <!-- Message alert wrong password or wrong username -->

                <?php if($msg_nana = $this->session->flashdata('login')):?>
                    <div class="row">
                        <div class="alert alert-dismissible alert-danger">
                            <?= $msg_nana; ?>
                        </div>
                    </div>
                <?php endif; ?>
             <!-- End message alert -->
             
                <div class="form-group">
                    <label for="">Masukkan Username</label>
                    <input type="text" name="uname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Masukkan Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <input type="submit" name="simpan" value="LOGIN" class="btn btn-info">
            </form>
        </div>
    </div>
</body>
</html>