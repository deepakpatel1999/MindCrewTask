@include('header')
@include('sitebar')
@include('nav')
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Tables <small></small></h3>
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
						<h2>program Table <small> </small></h2>
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
					<form action="{{route('admin.Programfile')}}" method="POST" enctype="multipart/form-data">
						@csrf  
						<input type="file" name="file" value="" required>
						<input type="submit" value="Add Program">
					</form>
					<div class="x_content">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-latest.min.js"
type="text/javascript"></script>

@include('footer')