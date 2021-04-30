<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <input type="file" id="uploadImage" name="uploadImage" class="form-control">
                <input type="file" id="uploadBerkas" name="uploadBerkas" class="form-control">
                <input type="file" id="uploadTtd" name="uploadTtd" class="form-control">
                <button class="btn btn-primary" id="submit">Confirm</button>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#submit").click(function() {

                var fd = new FormData();
                var files1 = $('#uploadImage')[0].files[0];
                var files2 = $('#uploadBerkas')[0].files[0];
                var files3 = $('#uploadTtd')[0].files[0];

                fd.append('uploadImage', files1, files1.name);
                fd.append('uploadBerkas', files2, files2.name);
                fd.append('uploadTtd', files3, files3.name);

                console.log("ok", files1);
                console.log("ok", files2);
                console.log("ok", files3);

                $.ajax({
                    url: "<?php echo base_url('welcome/processUpload') ?>",
                    type: "post",
                    dataType: "json",
                    method: "post",
                    contentType: false,
                    processData: false,
                    data: fd,
                    success: function(response) {
                        alert("berhasil upload");
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    }
                });
            });
        });
    </script>
</body>

</html>