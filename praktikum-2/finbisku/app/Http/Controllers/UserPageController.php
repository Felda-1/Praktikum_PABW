<?php

namespace App\Http\Controllers;

use App\Support\SampleData;

class UserPageController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard', ['stats' => SampleData::userStats()]);
    }

    public function articles()
    {
        return view('user.articles.index', ['articles' => SampleData::articles()]);
    }

    public function article(int $id)
    {
        return view('user.articles.show', ['article' => SampleData::find(SampleData::articles(), $id)]);
    }

    public function bookmarks()
    {
        return view('user.bookmarks', ['articles' => SampleData::articles()]);
    }

    public function businesses()
    {
        return view('user.business.index', ['businesses' => SampleData::businesses()]);
    }

    public function business(int $id)
    {
        return view('user.business.show', ['business' => SampleData::find(SampleData::businesses(), $id)]);
    }

    public function blogs()
    {
        return view('user.blogs.index', ['blogs' => SampleData::blogs()]);
    }

    public function blog(int $id)
    {
        return view('user.blogs.show', ['blog' => SampleData::find(SampleData::blogs(), $id)]);
    }
}
