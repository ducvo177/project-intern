<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
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
                $ext = $inputs['photo']->extension();
                $file_name = time() . '-' . 'course.' . $ext;
                $request->file('photo')->storeAs('public/image', $file_name);
                $inputs['file_path'] = Storage::url($file_name);
                $inputs['attachable_type'] = $inputs['name'];
                $inputs['file_name'] = $file_name;
                $inputs['attachable_id'] = $course->id;
                $inputs['extention'] = $ext;
                $inputs['mime_type'] = $file->getMimeType();
                $inputs['size'] = $file->getSize();
                $this->attachmentRepository->save($inputs);
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
        return view('admin.courses.edit', ['course' => $this->courseRepository->findById($id), 'categories' => $this->categoryRepository->getAll()]);
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        $inputs = $request->all();
        $this->courseRepository->save($inputs, ['id' => $id]);
        return redirect()->route('course.index')->with('notification', 'Update course successfully!!');
    }

    public function destroy($id)
    {
        //
    }
}
