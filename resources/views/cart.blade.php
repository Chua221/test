<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
    <table border>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Mass</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
    @foreach ($cart as $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td><img src="{{ asset('storage/'.$item['image']) }}"></td>
            <td>{{ $item['p_mass'] }}</td>
            <td>{{ $item['p_price'] }}</td>
            <td>{{ $item['state'] }}</td>
        </tr>
    @endforeach
</table>
<form action="{{ route('checkout') }}" method="POST">
    @csrf
    @method('POST')
    <button type="submit">Check Out</button>
</form>
</body>
</html>
<style>
    img{
        weight: auto;
        height: 100px;
    }
</style>