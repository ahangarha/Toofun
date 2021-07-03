<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \Illuminate\Support\Str;

class TopicsController extends Controller
{
    public function __construct()
    {
        // Get topics to get wiped
        $topicsToExpire = Topic::where('expired', false)
            ->where('created_at', '<', now()->subDays(7))
            ->get();

        foreach ($topicsToExpire as $key => $topicToExpire) {
            // Delete associated comments
            Comment::where('topic_token', $topicToExpire->token)->delete();

            // Wipe meaningful data in the expired topic
            $topicToExpire->update([
                'title' => "*",
                'description' => "*",
                'duration' => 0,
                'expired' => true,
            ]);

            Log::info(sprintf("Topic with token %s wipted and associated comments deleted.", $topicToExpire->token));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('topic.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|string|max:80',
            'description' => 'string|max:1000',
            'duration' => 'required|numeric|min:1|max:48',
        ]);

        $token = $this->generateToken();

        $topic = new Topic();
        $topic->token = $token;
        $topic->title = request('title');
        $topic->description = request('description');
        $topic->duration = request('duration');

        while (!$topic->save()) {
            $token = $this->generateToken();
        }

        return redirect(route('topic-show', ['language' => app()->getLocale(), 'topic' => $token]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Topic
     * @return \Illuminate\Http\Response
     */
    public function show(String $locale, Topic $topic)
    {
        return view('topic.show', [
            'topic' => $topic,
            'comments' => $topic->comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(403);
    }

    private function generateToken()
    {
        return Str::random(16);
    }
}
