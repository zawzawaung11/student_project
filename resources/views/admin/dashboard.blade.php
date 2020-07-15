@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
	
	<div class="col-md-3 pb-3">
	<div class="card text-white bg-dark mb-3">
			  <div class="card-header">
				Welcome  <b>{{ Auth::user()->name }} </b>
			  </div>
			  <ul class="list-group list-group-flush">
			  	<li class="list-group-item"><a href="/dashboard">List Student</a></li>
				<li class="list-group-item"><a href="/add">Add Student</a></li>
				<li class="list-group-item"><a href="/logout">Logout</a></li>
			  </ul>
			</div>
	</div>
	
        <div class="col-md-9">
			<table class="table">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">Photo</th>
				  <th scope="col">First Name</th>
				  <th scope="col">Last Name</th>
				  <th scope="col">NRIC Number</th>
				  <th scope="col">Action</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php $i = -4; $skipped = $data->currentPage() * $data->perPage(); ?>
			  @foreach($data as $student)
				<tr>
				  <th scope="row">
					  {{ $skipped + $i }}
				       <?php $i++; ?>
				  </th>
				  <td>
				  <img src="{{asset('uploads/'.$student->photo)}}" />
				  </td>
				  <td>{{$student->first_name}}</td>
				  <td>{{$student->last_name}}</td>
				  <td>{{$student->nric_number}}</td>
				  <td>
				<a href="/edit/{{$student->id}}">	  
				<i class="fa fa-edit mr-3"></i>
				</a>
				
				<a href="/delete/{{$student->id}}" onclick="return confirm('Are you sure you want to delete this item?');">	
				  <i class="fa fa-trash"></i>
				</a>  		
				  
				  </td>
				</tr>	
			  @endforeach
			  </tbody>
			</table>
			{{ $data->links() }}
        </div>
    </div>
</div>
@endsection
