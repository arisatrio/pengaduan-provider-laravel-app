<aside class="main-sidebar text-uppercase" style="background-color: rgb(108 0 167); color: white;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel" style="background-color: #ffffff !important; color: black;">
			
		</div>

		<ul class="sidebar-menu" data-widget="tree">
			<li class="{{ (request()->is('dashboard*')) ? 'active' : '' }}">
				<a href="{{ url('/dashboard') }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>
			</li>

			<li class="treeview {{ (request()->is('transaction*')) ? 'menu-open active' : '' }}" style="{{ (request()->is('transaction*')) ? 'height: auto;' : '' }}">
				<a href="#"><i class="fa fa-gear"></i> <span class="text-uppercase">Layanan Pengaduan</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu" style="{{ (request()->is('transaction*')) ? 'display: block;' : '' }}">
					<li class="{{ (request()->is('transaction/new-complain*')) ? 'active' : '' }}">
						<a href="{{ route('new-complain.index') }}"> <span>Pengaduan Baru </span>
							<span class="pull-right-container">
								<small class="label pull-right bg-red">
									{{ \App\Models\TComplaint::whereNot('status', 'Baru')->count() }}
								</small>
								</span>
						</a> 
					</li> 
					<li class="{{ (request()->is('transaction/report-complain*')) ? 'active' : '' }}">
						<a href="{{ route('report-complain.index') }}"> <span>Report Pengaduan </span>
							<span class="pull-right-container">
								<small class="label pull-right bg-red">
									{{ \App\Models\TComplaint::where('status', 'Selesai')->count() }}
								</small>
								</span>
						</a> 
					</li> 
				</ul>
			</li>

			<li class="treeview {{ (request()->is('master-data*')) ? 'menu-open active' : '' }}" style="{{ (request()->is('master-data*')) ? 'height: auto;' : '' }}">
				<a href="#"><i class="fa fa-gear"></i> <span class="text-uppercase">Master Data</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu" style="{{ (request()->is('master-data*')) ? 'display: block;' : '' }}">
					<li class="{{ (request()->is('master-data/category*')) ? 'active' : '' }}">
						<a href="{{ route('category.index') }}"> <span>Kategori</span></a>
					</li> 
				</ul>
			</li>

			<li class="treeview {{ (request()->is('user-management*')) ? 'menu-open active' : '' }}" style="{{ (request()->is('user-management*')) ? 'height: auto;' : '' }}">
				<a href="#"><i class="fa fa-gear"></i> <span class="text-uppercase">Pengguna</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu" style="{{ (request()->is('user-management*')) ? 'display: block;' : '' }}">
					@can('Index User')
					<li class="{{ (request()->is('user-management/users*')) ? 'active' : '' }}">
						<a href="{{ route('users.index') }}"> <span>Pengguna</span></a>
					</li>
					@endcan
					<li class="{{ (request()->is('user-management/roles*')) ? 'active' : '' }}">
						<a href="{{ route('roles.index') }}"><span>Roles</span></a>
					</li>
					{{-- <li class="{{ (request()->is('user-management/permission*')) ? 'active' : '' }}"">
						<a href="{{ route('permission.index') }}"> <span>Permissions</span></a>
					</li> --}}
				</ul>
			</li>
			
		</ul>
      </section>
</aside>