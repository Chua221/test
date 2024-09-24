@session('message')
    <script>
        window.alert("{{ session('message') }}")
    </script>
@endsession
