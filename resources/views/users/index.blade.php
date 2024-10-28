<!DOCTYPE html>
<html>
<head>
    <title>Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1>Users</h1>
    <a href="{{ route('users.create') }}">Create User</a>
    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} ({{ $user->email }})
                <a href="{{ route('users.show', $user) }}">View</a>
                <a href="{{ route('users.edit', $user) }}">Edit</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event)">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <script>
        function confirmDelete(e){
            e.preventDefault();
            if(confirm('are you sure ?')){
                e.target.submit();
            }

        }
     
    </script>
   
</body>
</html>
