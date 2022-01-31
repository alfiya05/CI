<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin-Home</title>
</head>

<body>
    <div class="container-fluid bg-dark text-light py3">
        <div class="row justify-content-between py-3 ">
            <div class=" col-sm-11">
                <a href="<?php echo base_url() . 'index.php/Authentication/Acontroller/home'; ?>" class='btn btn-primary'>Home </a>

                <a href="<?php echo base_url() . 'index.php/Authentication/Acontroller/adashboard'; ?>" class='btn btn-primary'>Account</a>
            </div>
            <div class="col-sm-1 ">
                <a href=" <?php echo base_url() . 'index.php/Authentication/Acontroller/alogout'; ?>" class='btn btn-danger '>Logout</a>
            </div>
            <hr>


        </div>
    </div>

    <div class="container-fluid">
        <div class="row py-3">
            <!-- <div class="row"> -->
            <div class="col-sm-2">
                <ul class="list-group-flush">
                    <li class="list-group-item">
                        <a href="<?php echo base_url() . 'index.php/Authentication/Acontroller/home'; ?>">Home </a>
                    </li>

                    <li class="list-group-item">
                        <a href="<?php echo base_url() . 'index.php/Authentication/Acontroller/adashboard'; ?>">Account</a>
                    </li>

                </ul>

            </div>
            <!-- <div class="row py-3"> -->
            <div class="col-sm-10">
                <form action="<?php echo base_url() . 'index.php/Authentication/Acontroller/post'; ?>" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>
                                <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id']; ?>">
                                <input type="text" name="title" id="title" placeholder="Title">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea placeholder="What's on your Mind?" name="nfeed" id="nfeed" cols="50" rows="3"></textarea>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="file" name="img" id="img">

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Post" id="post" class="btn btn-success">
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <h5 id="err_msg" class="alert alert-danger">
                                    **All inputs required
                                </h5>
                            </td>
                        </tr>

                    </table>
                </form>
                <!-- </div> -->

                <!-- <div class="row"> -->
                <div class="col-sm-12">
                    <?php if ($this->session->flashdata('failure')) { ?>
                        <div class="alert alert-danger"> <?= $this->session->flashdata('failure') ?> </div>
                    <?php  }
                    $this->session->unset_userdata('failure'); ?>
                    <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
                    <?php }
                    $this->session->unset_userdata('success'); ?>

                    <!-- for the output -->
                    <div class="row">

                        <?php
                        if (!is_null($posts)) {
                            foreach ($posts as $post) : ?>
                                <div class="col-sm-4 border py-2">
                                    <div class=" font-weight-bold text-primary" id="fname"> <?php echo $post['firstname']; ?> </div>
                                    <div class=" font-weight-bold" id="ftitle"> <?php echo $post['title']; ?> </div>
                                    <div class=" text-secondary" id="ftime"> <?php echo $post['timestamp']; ?> </div>
                                    <div class="" id="fdesc"> <?php echo $post['nfeed']; ?> </div>
                                    <div class="" id="fimg"> <?php if (!is_null($post['img_path'])) {
                                                                ?>

                                            <img src="<?php echo $post['img_path']; ?>" alt="" width="230" height="120">
                                        <?php
                                                                } ?>
                                    </div>

                                </div>
                        <?php endforeach;
                        } ?>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->



</body>
<?php include "bs-script.php"; ?>

<script>
    $(document).ready(function() {

        $('#err_msg').hide();
        $('#post').click(function() {
            if (($('#title').val() == '') || ($('#nfeed').val() == '') || ($('#img').val() == '')) {
                $('#err_msg').show();
                return false;
            } else {
                return true;
            }
        })
    })
</script>

</html>