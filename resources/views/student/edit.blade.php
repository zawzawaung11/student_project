@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-md-8">
	<div class="card text-white bg-dark">
			  <div class="card-header">
				Edit Student Record
			  </div>
			  
			  <div class="container">
			  <div class="col-md-12 mt-3 mb-3">
				<form action="/update" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$data->id}}">
				<div class="form-group row">
				  <div class="col-sm-4 col-form-label"> 
				  <img src="{{asset('uploads/'.$data->photo)}}" />
				  </div>
				</div>
				
				
				  <div class="form-group row">
				  <label class="col-sm-4 col-form-label">First Name</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" name="first_name" value="{{$data->first_name}}" placeholder="Enter first name">

				  </div>	
				  </div>
				  
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Last Name</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" name="last_name" value="{{$data->last_name}}" placeholder="Enter last name">

				  </div>	
				  </div> 
				  
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Birth Date</label>
				  <div class="col-sm-8">
					<input type="date" class="form-control" name="birth_date" value="{{$data->birth_date}}">
		
				  </div>	
				  </div>

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">NRIC Number</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" name="nric_number" value="{{$data->nric_number}}" placeholder="Enter NRIC Number">

				  </div>	
				  </div>  

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Gender</label>
				  <div class="col-sm-8">
					 <input type="radio" name="gender" value="male" {{($data->gender=="male")? "checked" : "" }}>
				  <label for="male">Male</label>
				  <input type="radio" name="gender" value="female" {{($data->gender=="female")? "checked" : "" }}>
				  <label for="female">Female</label>
		
				  </div>	
				  </div>  				  

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Address</label>
				  <div class="col-sm-8">
					<textarea  name="address" class="form-control" rows="2"> {{$data->address}}</textarea>

				  </div>	
				  </div>  

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Student Photo</label>
				  <div class="col-sm-8">
					 <input type="file" name="photo" >
					
				  </div>	
				  </div>   				  
	

				  <button type="submit" class="btn btn-primary mr-3">Update</button>
				  
				  <a href="/dashboard">Cancel</a>
				</form>
			</div>		
			 </div>
				 
	</div>
</div>
</div>

@endsection