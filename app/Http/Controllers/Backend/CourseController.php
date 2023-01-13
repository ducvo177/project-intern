<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Repositories\AttachmentRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CourseRepository;
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

    protected function savePhoto($file, $id)
    {
        $this->attachmentRepository->save([
            'file_path' =>  Storage::putFileAs('public/attachments', $file, $file->hashName()),
            'attachable_type' => Course::class,
            'file_name' => $file->hashName(),
            'extention' => $file->extension(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
        ], ['attachable_id' => $id]);
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
                $this->savePhoto($file, $course->id);
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
        return view('admin.courses.edit', ['course' => $this->courseRepository->findById($id, Course::class), 'categories' => $this->categoryRepository->getAll()]);
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        $inputs = $request->all();
        DB::transaction(function () use ($inputs, $request, $id) {
            $this->courseRepository->save($inputs, ['id' => $id]);
            if ($request->has('photo')) {
                $file = $inputs['photo'];
                if (Storage::exists($inputs['old_photo'])) {
                    Storage::delete($inputs['old_photo']);
                }
                $this->savePhoto($file, $id);
            }
        });
        return redirect()->route('course.index')->with('notification', 'Update course successfully!!');
    }

    public function destroy($id)
    {
        //
    }
}
