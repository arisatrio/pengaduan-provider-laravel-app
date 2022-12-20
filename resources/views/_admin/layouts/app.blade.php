<!DOCTYPE html>

<html>
    @include('_admin.layouts._head')
	@stack('css')

	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">

			@include('_admin.layouts._header')
			
			@include('_admin.layouts._aside')
			
			<div class="content-wrapper">
				@yield('content')
			</div>
			
			@include('_admin.layouts._footer')
			
			<div class="control-sidebar-bg"></div>
		</div>
		
		@include('_admin.layouts._script')
		@stack('js')
	</body>
</html>