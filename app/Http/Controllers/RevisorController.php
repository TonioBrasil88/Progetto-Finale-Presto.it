<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function acceptArticle(Article $article)
    {
        $article->setAccepted(true);
        return redirect()
            ->back()
            ->with('message', __('ui.article_accepted'));
    }

    public function rejectArticle(Article $article)
    {
        $article->setAccepted(false);
        return redirect()
            ->back()
            ->with('message', __('ui.article_rejected'));
    }

    public function undoArticle()
    {
        $article_to_check = Article::where('is_accepted', !null)
            ->orderBy('id', 'desc')
            ->first();
        if ($article_to_check != null) {
            $article_to_check->setAccepted(null);
            return redirect()
                ->back()
                ->with('message', __('ui.article_undo'));
        } else {
            return redirect()
                ->back()
                ->with('message', __('ui.no_articles'));
        }
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()
            ->back()
            ->with('message', __('ui.revisorMail'));
    }

    public function makeRevisor()
    {
        Artisan::call('presto:makeUserRevisor', ['email' => Auth::user()->email]);
        return redirect('/')->with('message', __('ui.revisorCreated'));
    }

    public function workWithUs()
    {
        return view('revisor.workWithUs');
    }

    public function addBodyToUser(Request $request)
    {
        auth()
            ->user()
            ->update(['body' => $request->input('body')]);

        return redirect(route('become.revisor'))->with('message', __('ui.revisorMail'));
    }
}
