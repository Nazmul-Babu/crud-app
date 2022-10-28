<html>
<head>
    <title>phonebook list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
<div class="container">
    <div class="row">
    <div class="col-12" style="padding-top: 50px">
        <h3>register</h3>
        @include('error')
        <form action="{{ route('register.save') }}" method="POST">
            {{ csrf_field() }}
            <input type="text" name="name" placeholder="user" class="form-control"><br>
            <input type="email" name="email" placeholder="email" class="form-control"><br>
            <input type="password" name="password" placeholder="password" class="form-control"><br>
            <input type="password" name="password_confirmation" placeholder="confirm password" class="form-control"><br>
            <input type="submit" name="submit" value="register" class="form-control btn btn-success">
        </form>
    </div>
    </div>
</div>
</body>
</html>
