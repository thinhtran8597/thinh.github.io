{{--<nav class="navbar navbar-inverse">--}}
{{--    <div class="container">--}}
{{--        <div class="navbar-header">--}}

{{--            <!-- Collapsed Hamburger -->--}}
{{--            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-collapse" >--}}
{{--                <span class="sr-only">Toggle Navigation</span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--            </button>--}}

{{--            <!-- Branding Image -->--}}
{{--            <a class="navbar-brand" href="/9gag/public">{{config('app.name', '9GAG')}}</a>--}}
{{--        </div>--}}
{{--        <div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
{{--            <ul class="nav navbar-nav">--}}
{{--                <li><a href="/9gag/public/posts">Home</a></li>--}}
{{--            </ul>--}}

{{--            <ul class="nav navbar-nav navbar-right">--}}
{{--                <li><a href="/9gag/public/posts/create">Create Post</a> </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}


<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="/9gag/public">{{config('app.name', '9GAG')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/9gag/public/posts">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar-right" href="/9gag/public/posts/create">Create Post</a>
            </li>
        </ul>
    </div>
</nav>
<br>
