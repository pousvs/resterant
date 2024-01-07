<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('assets/vendor/css/core.css?id=fdb5cd3f802d37d094730acf8fdcb33a') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/css/theme-default.css?id=da9b9645b9e4f480d38ea81168db36b7') }}">
    <link rel="stylesheet" href="{{ url('assets/css/demo.css?id=0f3ae65b84f44dbd4971231c5d97ac3b') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    @vite('resources/css/app.css')
</head>
<style>
body {
    font-family: 'Times New Roman', 'phetsarath OT';
}
</style>

<body>

    <div id="app-vue"></div>
    <!-- Include Scripts -->
    <!-- BEGIN: Vendor JS-->
    <script src="{{ url('assets/vendor/libs/jquery/jquery.js?id=fbe6a96815d9e8795a3b5ea1d0f39782') }}"></script>
    <script src="{{ url('assets/vendor/libs/popper/popper.js?id=bd2c3acedf00f48d6ee99997ba90f1d8') }}"></script>
    <script src="{{ url('assets/vendor/js/bootstrap.js?id=0a1f83aa0a6a7fd382c37453e3f11128') }}"></script>
    <script src="{{ url('assets/vendor/libs/node-waves/node-waves.js?id=0ca80150f23789eaa9840778ce45fc5c') }}"></script>
    <script
        src="{{ url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js?id=f4192eb35ed7bdba94dcb820a77d9e47') }}">
    </script>
    @vite('resources/js/app.js')

</body>

</html>