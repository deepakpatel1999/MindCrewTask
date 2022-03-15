@include('header')

@include('sitebar')
@include('nav')
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		@if (session('succsess'))
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<center>{{ session('succsess') }}</center>
		</div>
		@elseif(session('faile'))
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">×</button>
			{{ session('faile') }}
		</div>
		@endif

		@if (session('upsuccsess'))
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<center>{{ session('upsuccsess') }}</center>
		</div>
		@elseif(session('upfaile'))
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">×</button>
			{{ session('upfaile') }}
		</div>
		@endif
		@if (session('delsuccsess'))
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<center>{{ session('delsuccsess') }}</center>
		</div>
		@elseif(session('delfaile'))
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">×</button>
			{{ session('delfaile') }}
		</div>
		@endif
		<div class="page-title">
			<div class="title_left">
				<h3>Tables <small> User Data</small></h3>
			</div>

			<div class="title_right">
				<div class="col-md-5 col-sm-5   form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div>
				</div>
			</div>
		</div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong"><span class="ti-plus"></span>
			Add
		</button>
		<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Add user</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-sm-12 col-md-12 text-center">
							<h1>Add user </h1>
						</div>
						<div class="col-sm-12 col-md-12 text-center">


							<form method="POST" action="{{route('admin.User_add')}}" class="form-inline" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label for="exampleInputName2">Name</label>
									<input type="text" class="form-control" id="exampleInputName2" name="name" value="{{old('name')}}" placeholder="Enter Name" required>

								</div>
								<br>
								<br>
								<div class="form-group">
									<label for="exampleInputName2">Email</label>
									<input type="text" class="form-control" id="exampleInputName2" name="email" value="{{old('email')}}" placeholder="Enter Email">

								</div>
								<br>
								<br>
								<div class="form-group">
									<label for="exampleInputName2">Password</label>
									<input type="text" class="form-control" id="exampleInputName2" name="password" value="{{old('password')}}" placeholder="Enter password">

								</div>

								<br>
								<br>
								<br>
								<br>
								<br>
								<button type="submit" class="btn btn-success">Submit</button>
							</form>
						</div> 
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<!--<button type="button" class="btn btn-primary">Save changes</button>-->
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row" style="display: block;">

			<div class="clearfix"></div>

			<div class="clearfix"></div>
			@foreach($user as $value)
			<div class="modal fade" id="editmodel{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">user Update</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<h2>update user</h2>

							<form action="{{url('admin/User_adit')}}" method="POST" enctype="multipart/form-data">
								@csrf  
								<label for="name"> Name:</label><br>
								<input type="hidden" id="" name="id" value="{{$value->id;}}"><br>
								<input type="text" id="" name="name" value="{{$value->name;}}"><br>
								<label for="email"> Email:</label><br>
								<input type="email" id="" name="email" value="{{$value->email;}}"><br><br>
								<input type="password" id="" name="password" value="{{$value->password;}}">
								<br>
								<input type="submit" value="Submit">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

						</div>
					</div>
				</div>
			</div>
			@endforeach

			@foreach($user as $value)
			<div class="modal fade" id="deletemodel{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">user delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<h2></h2>

							<form action="{{url('admin/User_delete')}}" method="POST" enctype="multipart/form-data">
								@csrf  
								<label for="name"> DO YOU WANT TO DELETE RECORDE:</label><br>
								<input type="hidden" id="" name="id" value="{{$value->id;}}"><br>
								<input type="submit" value="confirm">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

						</div>
					</div>
				</div>
			</div>
			@endforeach
			<div class="col-md-12 col-sm-12  ">
				<div class="x_panel">
					<div class="x_title">
						<h2>User List Table  <small> </small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="#">Settings 1</a>
									<a class="dropdown-item" href="#">Settings 2</a>
								</div>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>

					<div class="x_content">

						<p> User Table<code></code> </p>

						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
									<tr class="headings">

										<th class="column-title">S.NO. </th>
										<th class="column-title"> Name</th>
										<th class="column-title">Email </th>
										<th class="column-title">Password </th>
										<th class="column-title">Date </th>

										<th class="column-title no-link last"><span class="nobr">Action</span>
										</th>

									</tr>
								</thead>

								<tbody>
									<?php $i=0;?>
									@foreach($user as $users)
									<?php $i++;?>
									<tr class="even pointer">

										<td class=" ">{{$i}}</td>
										<td class=" ">{{$users->name}} </td>

										<td class=" ">{{$users->email}}</td>
										<td class=" ">{{$users->password}}</td>
										<td class=" ">{{$users->created_at}}</td>

										<td class=" last">
											<a class="dropdown-item"data-toggle="modal" data-target="#editmodel{{$users->id}}"><i class="fas fa-edit" style="font-size:20px;color:blue"></i> Edit</a>
											<a class="dropdown-item"onclick="return confirm('Do you really want to Delete?')" data-toggle="modal" data-target="#deletemodel{{$users->id}}"><i class="fa fa-remove" style="font-size:20px;color:red"></i> Delete</a>


										</td>
									</tr>
									@endforeach

								</tbody>
							</table>
						</div>

						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

<script>
	setTimeout( function(){
		$('.alert').addClass('hide').removeClass('show').slideUp();
	}  , 2000 );
</script>
@include('footer')
