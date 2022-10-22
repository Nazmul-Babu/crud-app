<html>
<head>
    <title>phonebook list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-12">

            @include('error')
            <h3>Add Contact</h3>
            <form method="POST" action="{{ route('update_show',$contact->id) }}" class="form-group" >
                {{ @csrf_field() }}
                <input type="text" name="name" value="{{ $contact->name }}" class="form-control" ><br>
                <input type="email" name="email" value="{{ $contact->email }}" class="form-control" ><br>
                <input type="number" name="contact" value="{{ $contact->contact }}" class="form-control" ><br>
                <input type="submit" name="submit" value="update contact"  class="btn btn-primary btn-lg" ><br>
            </form>
        </div>
    </div>

</div>

</body>

</html>

