<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\GradeLevel;

class EnrollmentController extends Controller
{

public function index()
{
     $user = Auth::user();

    $student = Enrollment::with(['program', 'gradeLevel'])
        ->where('user_id', $user->id)
        ->where('status', 'approved')
        ->first();

    return view('student.dashboard', compact('student'));
}

public function dashboard()
{
      $user = auth()->user();

    $student = $user->student; // correct relationship usage

    if (!$student) {
        return redirect('/student/enroll')
            ->with('error', 'You are not enrolled yet.');
    }

    return view('student.dashboard', compact('student'));
}
    public function create()
    {
        return view('student.enroll', [
        'programs' => Program::all(),
        'gradeLevels' => GradeLevel::orderBy('order')->get(),
    ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

   // Check existing enrollment
    $existing = Enrollment::where('user_id', $user->id)->first();

    if ($existing) {
        return redirect('/student')
            ->with('error', 'You already have an existing enrollment.');
    }


        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required|date',
            'program_id' => 'required',
            'grade_level_id' => 'required',
        ]);

        Enrollment::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'program_id' => $request->program_id,
            'grade_level_id' => $request->grade_level_id,
            'status' => 'pending',
             'school_year' => now()->year . '-' . (now()->year + 1),
        ]);

          return redirect('/student')
        ->with('success', 'Enrollment submitted successfully. Please wait for approval.');
    }

public function approve($id)
{
    $enrollment = Enrollment::findOrFail($id);

    $enrollment->update([
        'status' => 'approved',
        'section_id' => request('section_id'),
    ]);

    return back()->with('success', 'Enrollment approved');
}

}