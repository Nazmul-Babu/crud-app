<html>
  <head>
      <title>phonebook list</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>

 <body>
<div class="container">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <li class="alert alert-success">{{ session('success') }}</li>
            @endif
            @include('error')
            <h3>Add Contact</h3>
            <form method="POST" action="{{ route('createContact') }}" class="form-group" >
                {{ @csrf_field() }}
                <input type="text" name="name" class="form-control" ><br>
                <input type="email" name="email" class="form-control" ><br>
                <input type="number" name="contact" class="form-control" ><br>
                <input type="submit" name="submit"  class="btn btn-primary btn-lg" ><br>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($contacts as $key=>$contact )
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $contact->name }}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->contact}}</td>
                    <td>
                        <a href="{{ route('edit_show',$contact->id) }}">update</a>
                        <a href="{{ route('delete',$contact->id) }}">delete</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center" >no data</td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>

 </body>

</html>
