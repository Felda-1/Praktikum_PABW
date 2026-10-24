<?php

namespace App\Http\Controllers;

use App\Support\SampleData;

class PublicPageController extends Controller
{
    public function landing()
    {
        return view('public.landing', ['fitur' => SampleData::features()]);
    }

    public function articles()
    {
        return view('public.articles.index', ['articles' => SampleData::articles()]);
    }

    public function article(int $id)
    {
        return view('public.articles.show', ['article' => SampleData::find(SampleData::articles(), $id)]);
    }

    public function blogs()
    {
        return view('public.blogs.index', ['blogs' => SampleData::blogs()]);
    }

    public function blog(int $id)
    {
        return view('public.blogs.show', ['blog' => SampleData::find(SampleData::blogs(), $id)]);
    }
}
