@session('message')
    <script>
        window.alert("{{ session('message') }}")
    </script>
@endsession
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
<style>
    img{
        weight: auto;
        height: 100px;
    }
</style>
</head>
<body>
    <h1>{{ Auth::user()->name }}</h1>
    <table border>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Mass</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        @foreach ($alldata as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td><img src="{{ asset('storage/'.$item['image']) }}" ></td>
                <td>{{ $item['mass'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td><button type="button"><a href="{{ route('view',['id'=>$item['id']]) }}">View Product</a></button></td>
            </tr>
        @endforeach
    </table>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <input type="submit" value="Logout">
    </form>
    <a href="cart">Cart</a>
</body>
</html>