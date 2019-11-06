<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('admin.index') }}">START</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{ route('admin.index') }}">Home</a></li>
            <li><a href="{{ route('admin.articles') }}">Articles</a></li>
            <li><a href="{{ route('admin.testimonials') }}">Testimonials</a></li>
            <li><a href="{{ route('admin.subscribers') }}">Subscribers</a></li>
            <li><a href="{{ route('admin.services') }}">Services</a></li>
            <li><a href="{{ route('admin.portfolio') }}">Portfolio</a></li>
            <li><a href="{{ route('admin.categories') }}">Categories</a></li>
        </ul>
    </div>
</nav>