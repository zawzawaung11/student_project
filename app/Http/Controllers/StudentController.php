<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

use Illuminate\Support\Facades\Validator;

use Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

		return view('student.add');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
				
        $validator = Validator::make($request->all(), [
         'first_name' => 'required',
		 'last_name' => 'required',
		 'birth_date' => 'required',
		 'nric_number' => 'required',
		 'gender' => 'required',
		 'address' => 'required',
		 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }	


		   $file = $request->file('photo');
		   $filename = $file->getClientOriginalName();
		   $img = Image::make($file);
		   $img->fit(80, 80)->save(public_path('uploads/'.$filename));
		
		
		$student = new Student;
		$student->first_name = $request->input('first_name');
		$student->last_name = $request->input('last_name');
		$student->birth_date = $request->input('birth_date');
		$student->nric_number = $request->input('nric_number');
		$student->gender = $request->input('gender');
		$student->address = $request->input('address');
		$student->photo = $filename;
		$student->save();
		
		return redirect('dashboard')->with('toast_success','Student created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$student = Student::find($id);
		
		return view('student.edit',['data'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
		 $validator = Validator::make($request->all(), [
         'first_name' => 'required',
		 'last_name' => 'required',
		 'birth_date' => 'required',
		 'nric_number' => 'required',
		 'gender' => 'required',
		 'address' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }	

	if($request->hasFile('photo')){
		   $file = $request->file('photo');
		   $filename = $file->getClientOriginalName();
		   $img = Image::make($file);
		   $img->fit(80, 80)->save(public_path('uploads/'.$filename));
		
		
		$student = Student::find($request->id);
		$student->first_name = $request->input('first_name');
		$student->last_name = $request->input('last_name');
		$student->birth_date = $request->input('birth_date');
		$student->nric_number = $request->input('nric_number');
		$student->gender = $request->input('gender');
		$student->address = $request->input('address');
		$student->photo = $filename;
		$student->save();
	}

    else
	{

			$student = Student::find($request->id);
			$student->first_name = $request->input('first_name');
			$student->last_name = $request->input('last_name');
			$student->birth_date = $request->input('birth_date');
			$student->nric_number = $request->input('nric_number');
			$student->gender = $request->input('gender');
			$student->address = $request->input('address');
			$student->save();

	}		
	
		return redirect('dashboard')->with('toast_success','Student updated!');
		
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		 $student = Student::find($id);
		$student->delete();
		
		return redirect('dashboard')->with('toast_success','Student deleted!');
		
    }
}
