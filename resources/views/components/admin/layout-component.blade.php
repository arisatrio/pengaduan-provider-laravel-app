<div>
    <section class="content-header">
        <h1>{{ $pageHeader }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            {{ $breadcrumb }}
        </ol>
    </section>

    <hr style="border-top: 1px solid #5555550d">
    
    <section class="content">
        {{ $content }}
    </section>
</div>