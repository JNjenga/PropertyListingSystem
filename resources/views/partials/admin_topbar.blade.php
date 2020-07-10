			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

			      <!-- Sidebar Toggle (Topbar) -->
			      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
				    <i class="fa fa-bars"></i>
			      </button>
                    <div class="mt-2">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert"><i class="fa fa-check-circle" aria-hidden="true"></i> {{ session('success') }}</div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  {{ session('error') }}</div>
                        @endif 
                    </div>
                  <!-- Topbar Navbar -->
			      <ul class="navbar-nav ml-auto">


                    <!-- Nav Item - Messages -->
                    @isset($messages)
                    @if($messages->count() > 0 )
				    <li class="nav-item dropdown no-arrow mx-1">
					  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-envelope fa-fw"></i>
						<!-- Counter - Messages -->
						<span class="badge badge-danger badge-counter">{{ $messages->count() ?? '' }}</span>
					  </a>
					  <!-- Dropdown - Messages -->
					  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
						<h6 class="dropdown-header">
						      Message Center
						</h6>
                        @foreach($messages as $message)
						<a class="dropdown-item d-flex align-items-center" href="{{ route('messages.show', $message->id) }}">
						      <div class="dropdown-list-image mr-3">
                                <p><i class="fa fa-user fa-2x" ></i></p>
							    <div class="status-indicator bg-info"></div>
						      </div>
						      <div class="font-weight-bold">
							    <div class="text-truncate">{{ $message->message }}</div>
							    <div class="small text-gray-500">{{ $message->customer_email  }}</div>
						      </div>
						</a>
                        @endforeach
					
						<a class="dropdown-item text-center small text-gray-500" href="{{ route('messages.index') }}">Read More Messages</a>
					  </div>
				    </li>
                    @endif
                    @endisset

				    <div class="topbar-divider d-none d-sm-block"></div>

				    <!-- Nav Item - User Information -->
				    <li class="nav-item dropdown no-arrow">
					  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->name }} </span>
						<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
					  </a>
					  <!-- Dropdown - User Information -->
					  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
						      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
						      Logout
						</a>
					  </div>
				    </li>

			      </ul>

			</nav>
			<!-- End of Topbar -->
