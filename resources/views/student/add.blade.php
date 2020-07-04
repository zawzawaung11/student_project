@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-md-8">
	<div class="card text-white bg-dark">
			  <div class="card-header">
				Entry Student Record
			  </div>
			  
			  <div class="container">
			  <div class="col-md-12 mt-3 mb-3">
				<form action="store" method="post" enctype="multipart/form-data">
				@csrf
				  <div class="form-group row">
				  <label class="col-sm-4 col-form-label">First Name</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" name="first_name" value="{{old('first_name')}}" placeholder="Enter first name">

				  </div>	
				  </div>
				  
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Last Name</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" placeholder="Enter last name">

				  </div>	
				  </div> 
				  
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Birth Date</label>
				  <div class="col-sm-8">
					<input type="date" class="form-control" name="birth_date" value="{{old('birth_date')}}">
		
				  </div>	
				  </div>

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">NRIC Number</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" name="nric_number" value="{{old('nric_number')}}" placeholder="Enter NRIC Number">

				  </div>	
				  </div>  

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Gender</label>
				  <div class="col-sm-8">
					 <input type="radio" name="gender" value="male">
				  <label for="male">Male</label>
				  <input type="radio" name="gender" value="female">
				  <label for="female">Female</label>
		
				  </div>	
				  </div>  				  

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Address</label>
				  <div class="col-sm-8">
					<textarea  name="address" class="form-control" rows="2"> </textarea>

				  </div>	
				  </div>  

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Student Photo</label>
				  <div class="col-sm-8">
					 <input type="file" name="photo" >
					
				  </div>	
				  </div>   				  
	

				  <button type="submit" class="btn btn-primary mr-3">Submit</button>
				  
				  <a href="/dashboard">Cancel</a>
				</form>
			</div>		
			 </div>
				 
	</div>
</div>
</div>

@endsection