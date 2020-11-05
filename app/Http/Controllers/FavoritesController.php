<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    /**
     * ユーザのお気に入り一覧ページを表示するアクション。
     */
    
    public function favorites($id)
    {
        // idの値でユーザを検索して取得
        $user = Favorites::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        // ユーザのお気に入り一覧を取得
        $favorites = $user->favorites()->paginate(10);
        
        // お気に入り一覧ビューでそれらを表示
        return view('users.favorites', [
            'user' => $user,
            'users' => $favorites,
            ]);
    }
    
    
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
