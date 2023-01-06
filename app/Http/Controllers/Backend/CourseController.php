<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $categoryRepository;
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository, CategoryRepository  $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        return view('admin.courses.index', [
            'courses' => $this->courseRepository->getAll(request()->all()),
            'categories'=>$this->categoryRepository->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.courses.create', ['categories'=>$this->categoryRepository->getAll()]);
    }

    public function store(StoreCourseRequest $request)
    {
        $this->courseRepository->save($request->all());
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
