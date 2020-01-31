<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multiple File Upload </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
</head>

<body>
    <div class="container">
        <br />
        <h3 align="center">Laravel Multiple Image Upload </h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Upload Multiple Images in Laravel</h3>
            </div>
            <div class="panel-body">
                <br />
                <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="file[]" id="file" accept="image/*" multiple />
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="upload" value="Upload" class="btn btn-success" />
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
