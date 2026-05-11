<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">
        Student Dashboard
    </h1>

    @if(!$student)
        <div class="p-4 bg-yellow-100 text-yellow-800 rounded">
            Your enrollment is still pending or not found.
        </div>
    @else

        <div class="p-6 bg-green-100 text-green-900 rounded mb-4">
            🎉 You are officially enrolled!
        </div>

        <div class="grid grid-cols-2 gap-4">

            <div class="p-4 bg-white shadow rounded">
                <strong>Grade Level:</strong><br>
                {{ $student->gradeLevel->name ?? 'Not assigned' }}
            </div>

            <div class="p-4 bg-white shadow rounded">
                <strong>Section:</strong><br>
               {{ $student->enrollment?->section?->name ?? 'Not assigned yet' }}
            </div>

            <div class="p-4 bg-white shadow rounded col-span-2">
                <strong>Enrollment Status:</strong><br>
                Approved
            </div>

        </div>

    @endif

</div>
</x-app-layout>