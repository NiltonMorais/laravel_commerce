<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                <li><a href="{{ route('admin.products.index') }}">Products</a></li>
                <li><a href="{{ route('admin.orders.index') }}">Orders</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    @yield('content')
</div>

<script src="{{ elixir('js/all.js') }}"></script>

</body>
</html>
