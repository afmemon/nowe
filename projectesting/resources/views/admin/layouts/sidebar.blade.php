	<div id="sidebar" class="sidebar responsive ace-save-state">
		<ul class="nav nav-list">
			<li class="active">
				<a href="/admin">
					<i class="menu-icon fa fa-tachometer"></i>
					<span class="menu-text"> Dashboard </span>
				</a>

				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-desktop"></i>
					<span class="menu-text">
						Switch Roles
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a style="color: #198754; font-weight: bold;">
							<i class="menu-icon fa fa-caret-right"></i>
							{{ session('user_role')['user_type'] }}
						</a>
						<b class="arrow"></b>
					</li>
				</ul>

				@forelse($rolesName as $key => $value)
				
				<ul class="submenu">
					<li class="">
						@forelse($value as $key2 => $value2)
						@if(!is_array($value2) && session('user_role')['user_type'] != $value2)
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-caret-right"></i>
								{{$value2}}
							<b class="arrow fa fa-angle-down"></b>
						</a>
						@endif	
						@empty
						@endforelse

						<b class="arrow"></b>

						@forelse($value as $key2 => $value2)
						@if(!is_array($value2) && session('user_role')['user_type'] != $value2)
						@if($value2 == "Partner Manager")
						@forelse($orgName as $key1 => $orgName1)
						<ul class="submenu">
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-pencil orange"></i>
									{{ $orgName1["partner_organization_name"] }}
									<b class="arrow fa fa-angle-down"></b>
								</a>
								<b class="arrow"></b>
								
								@forelse($row as $key3 => $row1)
								@if($row1['partner_organization_id'] == $orgName1['partner_organization_id'])
								<ul class="submenu">
									<li class="">
										<a href="/admin/changeRole/{{$row1['cont_id']}}/{{$row1['partner_organization_id']}}/{{$row1['user_type_id']}}">
											<i class="menu-icon fa fa-plus purple"></i>
											{{$row1['cont_name']}}
										</a>
										<b class="arrow"></b>
									</li>
								</ul>
								@endif
								@empty
								@endforelse

							</li>
						</ul>
						@empty
						@endforelse
						@endif	
						@endif	
						@empty
						@endforelse

					</li>
				</ul>
				@empty
				@endforelse
			</li>


			{{-- <li class="">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-desktop"></i>
					<span class="menu-text">
						Manage Beneficiary
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-caret-right"></i>
							Layouts
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="top-menu.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Top Menu
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="two-menu-1.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Two Menus 1
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="two-menu-2.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Two Menus 2
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="mobile-menu-1.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Default Mobile Menu
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="mobile-menu-2.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Mobile Menu 2
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="mobile-menu-3.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Mobile Menu 3
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="jquery-ui.html">
							<i class="menu-icon fa fa-caret-right"></i>
							jQuery UI
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="nestable-list.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Nestable Lists
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li> --}}

			{{-- <li class="">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-list"></i>
					<span class="menu-text"> Widow/Orphan </span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="tables.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Simple &amp; Dynamic
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="jqgrid.html">
							<i class="menu-icon fa fa-caret-right"></i>
							jqGrid plugin
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li> --}}

			<li class="">
				<a href="#" class="dropdown-toggle">
					{{-- <i class="menu-icon fa fa-desktop"></i> --}}
					&nbsp;&nbsp;<i class="fas fa-exchange-alt"></i>&nbsp;&nbsp;&nbsp;

					<span class="menu-text">
						Switch Role
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<ul class="submenu">
					<li class="">
						<a style="color: #198754; font-weight: bold;">
							<i class="menu-icon fa fa-caret-right"></i>
							{{ session('user_role')['user_type'] }}
						</a>
						<b class="arrow"></b>
					</li>
				</ul>

				<b class="arrow"></b>
					@forelse($rolesName as $key => $value)
					<ul class="submenu">
						<li class="">
							@forelse($value as $key2 => $value2)
							@if(!is_array($value2) && session('user_role')['user_type'] != $value2)
					
							<a href="" class="dropdown-toggle">
								<i class="menu-icon fa fa-caret-right"></i>
										{{$value2}}
								<b class="arrow fa fa-angle-down"></b>
							</a>
					
							@endif	
							@empty
							@endforelse

							<b class="arrow"></b>
								@forelse($value['roles'] as $key1 => $value1)
									<ul class="submenu">
										<li class="">
											<a href="/admin/changeRole/{{$value1['country_id']}}/{{$value1['partner_organization_id']}}/{{$value1['user_type_id']}}" data-toggle="tooltip" title="{{ $value1['partner_organization_name'] }}">
												<i class="menu-icon fa fa-caret-right"></i>
												{{-- {{$value1['cont_name']}} --}}
												{{ $value1['partner_organization_name'] }}
											</a>
											<b class="arrow"></b>
										</li>
									</ul>
								@empty
								@endforelse
						</li>
					</ul>
					@empty
					@endforelse
			</li>

			{{-- <li class="">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-pencil-square-o"></i>
					<span class="menu-text"> Forms </span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="form-elements.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Form Elements
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="form-elements-2.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Form Elements 2
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="form-wizard.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Wizard &amp; Validation
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="wysiwyg.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Wysiwyg &amp; Markdown
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="dropzone.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Dropzone File Upload
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>

			<li class="">
				<a href="widgets.html">
					<i class="menu-icon fa fa-list-alt"></i>
					<span class="menu-text"> Generate Report </span>
				</a>
				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="calendar.html">
					<i class="menu-icon fa fa-calendar"></i>

					<span class="menu-text">
						Calendar

						<!-- #section:basics/sidebar.layout.badge -->
						<span class="badge badge-transparent tooltip-error" title="2 Important Events">
							<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
						</span>

						<!-- /section:basics/sidebar.layout.badge -->
					</span>
				</a>

				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="gallery.html">
					<i class="menu-icon fa fa-picture-o"></i>
					<span class="menu-text"> Gallery </span>
				</a>

				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-tag"></i>
					<span class="menu-text"> More Pages </span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="profile.html">
							<i class="menu-icon fa fa-caret-right"></i>
							User Profile
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="inbox.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Inbox
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="pricing.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Pricing Tables
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="invoice.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Invoice
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="timeline.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Timeline
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="search.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Search Results
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="email.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Email Templates
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="login.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Login &amp; Register
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>

			<li class="">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-file-o"></i>

					<span class="menu-text">
						Other Pages

						<!-- #section:basics/sidebar.layout.badge -->
						<span class="badge badge-primary">5</span>

						<!-- /section:basics/sidebar.layout.badge -->
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="faq.html">
							<i class="menu-icon fa fa-caret-right"></i>
							FAQ
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="error-404.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Error 404
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="error-500.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Error 500
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="grid.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Grid
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="blank.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Blank Page
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li> --}}
		</ul>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>