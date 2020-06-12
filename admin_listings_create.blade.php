@extends('layouts.admin_layout')

@section('content')

<div class="bigcard">
    <div class="smallcard">
      <form action="<!--->" method="post">
        <h1>Add Property</h1>
          <div>
            <label for="p_id">property ID:</label>
                <input type="text" name="property_ID" id="property_ID">
            </div>
            <div>
                  <label for="title">property title:</label>
                  <input type="text" name="property_title" id="property_title">
             </div>
            <div>
                  <label for="gender">property status:</label>
                  <select id="property_status" name="property_status">
                        <option>For sale</option>
                        <option>For Rent</option>
                  </select>
            </div>
            <div>
                  <label for="gender">property category:</label>
                  <select id="property_category" name="property_category">
                        <option>Apartment</option>
                        <option>Bedsitter</option>
                        <option>Bungalow</option>
                  </select>
            </div>
            <div>
                  <label for="gender">property description:</label>
                  <textarea id="property description" name="property description" rows="4" cols="50"></textarea>
            </div>
            <div>
                <button type="submit">CREATE</button>
            </div>
        </form>
    </div>
    <!--show-->
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

$property = DB::table('tbl_proprties')->get();

foreach ($property as $property) {
    echo "<tr><td>" . $property->property_id;
    echo "</td><td>" . $property->property_title;
    echo "</td><td>" . $property->property_status;
    echo "</td><td>" . $property->fk_property_description_id;
    echo "</td><td>" . $property->fk_user_id;
    echo "</td><td>" . $property->fk_property_category_id . "</td></tr>";
}
?>
       </table>
    </div>
</div>

@endsection