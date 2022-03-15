 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
 	<div class="menu_section">
 		<h3>General</h3>
 		<ul class="nav side-menu">
 			<li><a><i class="fa fa-home"></i> Dashboard</a>
 				
 			</li>
 			<li><a><i class="fa fa-edit"></i> Users <span class="fa fa-chevron-down"></span></a>
 				<ul class="nav child_menu">
 					@foreach($per as $perm)
 					<li><a href="#">{{$perm->name}}</a></li>
 					@endforeach
 				</ul>
 			</li>
 			
 		</div>

 	</div>

 </div>
</div>