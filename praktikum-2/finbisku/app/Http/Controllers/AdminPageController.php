<?php

namespace App\Http\Controllers;

use App\Support\SampleData;

class AdminPageController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'stats' => SampleData::adminStats(),
            'users' => SampleData::users(),
        ]);
    }

    public function users()
    {
        return view('admin.users.index', ['users' => SampleData::users()]);
    }

    public function user(int $id)
    {
        return view('admin.users.show', ['user' => SampleData::find(SampleData::users(), $id)]);
    }

    public function articles()
    {
        return view('admin.articles.index', ['articles' => SampleData::articles()]);
    }

    public function article(int $id)
    {
        return view('admin.articles.show', ['article' => SampleData::find(SampleData::articles(), $id)]);
    }
}
