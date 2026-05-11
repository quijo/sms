<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">

        <h2 class="text-xl font-bold mb-4">Enrollment Form</h2>

        @if(session('success'))
            <div class="text-green-600 mb-3">
                {{ session('success') }}
            </div>
        @endif

       <form method="POST" action="{{ url('student/enroll') }}">
            @csrf

            <input type="text" name="first_name" placeholder="First Name" class="block w-full mb-2">

            <input type="text" name="last_name" placeholder="Last Name" class="block w-full mb-2">

            <input type="date" name="birthdate" class="block w-full mb-2">

            <!-- PROGRAM DROPDOWN -->
            <select name="program_id" class="block w-full mb-2">
                <option value="">Select Program</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}">
                        {{ $program->name }}
                    </option>
                @endforeach
            </select>

            <!-- GRADE LEVEL DROPDOWN -->
            <select name="grade_level_id" class="block w-full mb-2">
                <option value="">Select Grade Level</option>
                @foreach($gradeLevels as $grade)
                    <option value="{{ $grade->id }}">
                        {{ $grade->name }}
                    </option>
                @endforeach
            </select>

            <button class="bg-blue-500 text-black px-4 py-2">
                Submit Enrollment
            </button>
        </form>
    </div>
    
</x-app-layout>