<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CourseTagController extends Controller {
    public function index()
    {
        return view('pages.admin.course-tag.index');
    }
    public function create()
    {
        return view('pages.admin.course-tag.create');
    }
    public function edit($id)
    {
        return view('pages.admin.course-tag.edit',compact('id'));
    }
}
