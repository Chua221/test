<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
</head>
<body>
    <center>
        <form action="{{ route('addtocart',$product['id']) }}" method="POST">
            @csrf
            <label for="">Image</label><br>
            <img src="{{ asset('storage/'.$product['image']) }}"  style="height:300px; wieth:auto;"><br>
            <label for="">Mass</label><br>
            <input type="number" id="1" min="100" step="50" value="{{ $product['mass'] }}" oninput="cal()" name="p_mass"><br>
            <label for="">Price</label><br>
            <input type="number" id="2" readonly  value="{{ $product['price'] }}"><br>
            <label for="">Totle Price</label><br>
            <input type="number" id="3" name="p_price"><br>
            <a href="/">back</a>
            <button type="submit">Add To Cart</button>
            <input type="submit" name="submit" value="">
        </form>
    </center>
</body>
</html>
<script>
    function cal() {
        var i1 = parseInt(document.getElementById('1').value);
        var i2 = parseInt(document.getElementById('2').value);
        
        document.getElementById('3').value= i1*i2/100
    }
</script>