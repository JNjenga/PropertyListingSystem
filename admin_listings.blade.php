@extends('layouts.admin_layout')

@section('stylesheets')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Property Listings</h6>
        </div>
        <div class="card-body">
    
    <!-- show all listings to admin -->
    <div class="tcard">
    <h1>PROPERTIES</h1>
	<table>
		<tr>
			<th>property_ID</th>
			<th>property_title</th>
			<th>property_status</th>
			<th>fk_property_description_id</th>
			<th>fk_user_id</th>
			<th>fk_property_category_id</th>
		</tr>

      <?php 
      $property = DB::table('tbl_properties')->get();

		foreach ($property as $property) {
    		echo "<tr><td>".$property->property_id;
    		echo "</td><td>".$property->property_title;
    		echo "</td><td>".$property->property_status;
    		echo "</td><td>".$property->fk_property_description_id;
    		echo "</td><td>".$property->fk_user_id;
    		echo "</td><td>".$property->fk_property_category_id."</td></tr>";
            }
      ?>
      </table>
      </div>
      </div>

@endsection

<!--footer-->
@extends('layouts/partials/admin_footer')

@endsection
