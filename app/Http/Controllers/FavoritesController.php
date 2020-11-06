<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
     /**
     * MicropostsをFavoriteするアクション。
     * 
     * @parm $id Micropostsのid
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // 認証済ユーザ（閲覧者）が、idのユーザをフォローする
        \Auth::user()->favorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    /**
     * MicropostsをUnfavoriteするアクション。
     * 
     * @parm $id Micropostのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済ユーザ（閲覧者）が、idのユーザをアンフォローする
        \Auth::user()->unfavorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    
    
}
