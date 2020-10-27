<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // メッセージ一覧を取得
        $messages = Message::all();
        
        // メッセージ一覧ビューでそれを表示
        return view('messages.index', [
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = new Message;
        
        // メッセージ作成ビューを表示
        return view('messages.create', [
            'message' => $message,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
                'content' => 'required|max:255',
            ]);

        $message = new Message;
        $message->content = $request->content;
        $message->save();
        
        //リダイレクト
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //id値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        
        //詳細ビューで表示
        return view('messages.show' ,
            ['message' => $message,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //id値でメッセージを検索して取得
        $message = Message::findOrFail($id);

        //詳細ビューで表示
        return view('messages.edit' ,
            ['message' => $message,]
            );
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
        //バリデーション
        $request->validate([
                'content' => 'required|max:255',
            ]);

        //id値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        
        //メッセージを更新
        $message->content = $request->content;
        $message->save();
        
        //トップページへリダイレクト
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //id値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        
        $message->delete();
        
        //トップにリダイレクト
        return redirect('/');
    }
}
