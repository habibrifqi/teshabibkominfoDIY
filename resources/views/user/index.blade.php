<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Items</h1>
    <a href="">Create New Item</a>
    {{-- @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif --}}
    <ul>
        @foreach ($data as $item)
            <li>{{ $item->username }} -
                
                 <a href="">View</a> - <a href="">Edit</a> 
                 - <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display:inline;"> 
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
           </form>
        </li>
        @endforeach
    </ul>
</body>
</html>