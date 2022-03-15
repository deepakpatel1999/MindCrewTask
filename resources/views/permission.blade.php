@include('header')

@include('sitebar')
@include('nav')
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Permissions Tables  <small></small></h3>
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

		<div class="clearfix"></div>
		<div class="row" style="display: block;">
			<div class="clearfix"></div>
			<div class="clearfix"></div>

			<div class="col-md-12 col-sm-12  ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Permissions Table <small> </small></h2>
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

						<p>Add Permissions <code></code></p>

						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
									<tr class="headings">
										
										<th class="column-title">S.NO. </th>
										<th class="column-title"> Name</th>
										<th class="column-title">Status </th>
										
									</tr>
								</thead>

								<tbody>
									<?php $i=0;?>
									@foreach($permission as $permissions)
									<?php $i++;?>
									<tr class="even pointer">
										<td class=" ">{{$i}}</td>
										<td class=" ">{{$permissions->name}} </td>
										<td class=" ">
											<label class="switch">
												<input  name="status" class="client_status" type="checkbox" value="<?php echo $permissions->id ?>" <?php if($permissions->status == 1) {echo "checked";} ?>>
												<span class="slider round"></span>
											</label>
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
<script src="https://code.jquery.com/jquery-latest.min.js"
type="text/javascript"></script>
<script>
	$(document).on('click','.client_status',function(){
		var id = $(this).val();
		if ($(this).prop('checked') == true) {
			status = 1;
		}  else{
			status = 0;
		}
		$.ajax({
			url: "{{url('admin/update_permission')}}",
			type: "POST",
			dataType: "html",
			data: {
				"_token":"{{csrf_token()}}", 
				status: status,
				id: id
			},
			cache: false,
			success: function(result) {
    //   console.log(result);
    alert(' Permissions Update');
  } 
});
	});
</script>
@include('footer')