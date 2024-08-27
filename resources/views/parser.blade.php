
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form {
            min-width:300px;
            max-width:400px;
            padding:20px;
            margin:20% auto;
            background:#ffffff59;
            -webkit-box-shadow: 3px 3px 23px -9px rgba(0,0,0,0.86);
            -moz-box-shadow: 3px 3px 23px -9px rgba(0,0,0,0.86);
            box-shadow: 3px 3px 23px -9px rgba(0,0,0,0.86);
        }

        form input {
            border:1px solid #eee;
            border-radius:0 !important;
            padding:5px 8px;
            color:#444;
        }

        form button {
            color:#555;
            background:#ffffffad;
            border:1px solid #fff !important;
            margin-top:30px;
            border-radius:0px Important;
        }

        form button:hover {
            background:#fff !important;
        }

        .pull-right {
            float:right;
        }
        body {
            background: #70e1f5;
            background: -webkit-linear-gradient(to right, #ffd194, #70e1f5);
            background: linear-gradient(to right, #ffd194, #70e1f5);
        }
    </style>
</head>
<body>
<div class="container">
    <form action="/parse" method="GET">
        <div class="form-group">
            <label for="name">Enter Product URL :</label>
            <input class="form-control" type="text" name="url" placeholder="Product URL" required>
        </div>

        <button type="submit" class="btn" style="">Submit</button>
    </form>
</div>
</body>
</html>
