<?php
namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        $page_title = 'Application';
        return view('admin.application.index', compact('applications', 'page_title'));
    }
    public function create($id)
    {
        try {
            $demand = Vacancy::findOrFail($id);
            return view('admin.application.create', compact('demand'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Vacancy not found or no longer available.');
        }
    }
    public function store(Request $request)
    {
        try {
            $imageMaxSize = 2048; // 2MB
            $cvMaxSize = 5120;    // 5MB
            $messages = [
                'citizenship_front_image.required' => 'Please upload your citizenship front image',
                'citizenship_front_image.image' => 'Citizenship front must be an image file (JPG, PNG, GIF)',
                'citizenship_front_image.max' => 'Citizenship front image size should not exceed 2MB',
                'citizenship_back_image.required' => 'Please upload your citizenship back image',
                'citizenship_back_image.image' => 'Citizenship back must be an image file (JPG, PNG, GIF)',
                'citizenship_back_image.max' => 'Citizenship back image size should not exceed 2MB',
                'cv_pdf.required' => 'Please upload your CV',
                'cv_pdf.mimes' => 'CV must be in PDF format',
                'cv_pdf.max' => 'CV file size should not exceed 5MB',
                'transcript.required' => 'Please upload your academic transcript',
                'transcript.file' => 'The uploaded transcript file is invalid',
                'transcript.max' => 'Transcript file size should not exceed 2MB',
                'engineering_license_image.image' => 'Engineering license must be an image file (JPG, PNG, GIF)',
                'engineering_license_image.max' => 'Engineering license image size should not exceed 2MB',
            ];
            $request->validate([
                'name' => 'required|string|max:255',
                'vacancy_id' => 'required|exists:vacancies,id',
                'email' => 'required|email|max:255',
                'phone_number' => 'required|string|max:20',
                'citizenship_front_image' => "required|image|max:$imageMaxSize",
                'citizenship_back_image' => "required|image|max:$imageMaxSize",
                'cv_pdf' => "required|mimes:pdf|max:$cvMaxSize",
                'transcript' => "required|file|max:$imageMaxSize",
                'engineering_license_image' => "nullable|image|max:$imageMaxSize",
                'status' => 'nullable|string',
                'work_experience' => 'nullable|string',
                'address' => 'nullable|string|max:500',
            ], $messages);
            $customPath = public_path('uploads/application');
            if (!file_exists($customPath)) {
                mkdir($customPath, 0755, true);
            }
            $citizenshipFront = $request->file('citizenship_front_image')->move($customPath, uniqid() . '_' . $request->file('citizenship_front_image')->getClientOriginalName());
            $citizenshipBack = $request->file('citizenship_back_image')->move($customPath, uniqid() . '_' . $request->file('citizenship_back_image')->getClientOriginalName());
            $cvPdf = $request->file('cv_pdf')->move($customPath, uniqid() . '_' . $request->file('cv_pdf')->getClientOriginalName());
            $transcript = $request->file('transcript')->move($customPath, uniqid() . '_' . $request->file('transcript')->getClientOriginalName());
            $engineeringLicense = $request->hasFile('engineering_license_image')
                ? $request->file('engineering_license_image')->move($customPath, uniqid() . '_' . $request->file('engineering_license_image')->getClientOriginalName())
                : null;
            Application::create([
                'name' => $request->name,
                'vacancy_id' => $request->vacancy_id,
                'email' => $request->email,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'citizenship_front_image' => 'uploads/application/' . basename($citizenshipFront),
                'citizenship_back_image' => 'uploads/application/' . basename($citizenshipBack),
                'cv_pdf' => 'uploads/application/' . basename($cvPdf),
                'transcript' => 'uploads/application/' . basename($transcript),
                'engineering_license_image' => $engineeringLicense ? 'uploads/application/' . basename($engineeringLicense) : null,
                'status' => $request->status ?? 'pending',
                'work_experience' => $request->work_experience,
            ]);
            return redirect()->back()->with('success', 'Application submitted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to submit application: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $application = Application::findOrFail($id);
            $filesToDelete = array_filter([
                $application->citizenship_front_image,
                $application->citizenship_back_image,
                $application->cv_pdf,
                $application->transcript,
                $application->engineering_license_image
            ]);
            foreach ($filesToDelete as $filePath) {
                $fullPath = public_path(str_replace('/', DIRECTORY_SEPARATOR, $filePath));
                if (file_exists($fullPath) && is_file($fullPath)) {
                    unlink($fullPath);
                }
            }
            $application->delete();
            return redirect()->route('admin.applications.index')
                ->with('success', 'Application deleted successfully');
        } catch (\Exception $e) {
            Log::error('Application deletion error: ' . $e->getMessage());
            return redirect()->route('admin.applications.index')
                ->with('error', 'Failed to delete application. Please try again.');
        }
    }
    public function updateStatus(Request $request, $id)
{
    try {
        $application = Application::findOrFail($id);
        $application->status = $request->status;
        $application->save();
        return redirect()->route('admin.applications.index')
            ->with('success', 'Application status updated to ' . ucfirst($request->status));
    } catch (\Exception $e) {
        return redirect()->route('admin.applications.index')
            ->with('error', 'Failed to update application status');
    }
}
}