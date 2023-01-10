<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Repositories\AttachmentRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    protected $categoryRepository;
    protected $courseRepository;
    protected $attachmentRepository;

    public function __construct(CourseRepository $courseRepository, CategoryRepository  $categoryRepository, AttachmentRepository $attachmentRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->courseRepository = $courseRepository;
        $this->attachmentRepository = $attachmentRepository;
    }

    public function index()
    {
        return view('admin.courses.index', [
            'courses' => $this->courseRepository->getAll(request()->all()),
            'categories' => $this->categoryRepository->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.courses.create', ['categories' => $this->categoryRepository->getAll()]);
    }

    public function store(StoreCourseRequest $request)
    {
        $inputs = $request->all();
        DB::transaction(function () use ($inputs, $request) {
            $course = $this->courseRepository->save($inputs);
            if ($request->has('photo')) {
                $file = $inputs['photo'];
                $this->attachmentRepository->save([
                    'file_path' =>  Storage::putFileAs('public/attachments', $inputs['photo'], $inputs['photo']->hashName()),
                    'attachable_type' => Course::class,
                    'file_name' => $inputs['photo']->hashName(),
                    'attachable_id' => $course->id,
                    'extention' => $inputs['photo']->extension(),
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                ]);
            }
        });
        return redirect()->route('course.index')->with('notification', 'Created courses successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
