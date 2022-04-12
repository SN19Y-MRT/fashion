# マイファッションアイテム管理アプリ
※ dDEMO用メールアドレス：aaa@icloud.com     パスワード：testtest


本アプリは、自分のファッションアイテムを管理出来るアプリです。\
ユーザーは登録ボタン押下後、必要項目（ファッションアイテムの写真、名前、概要、収納場所、カテゴリー名）を入力後、登録し、トップページで自分が登録したファッションアイテムを確認することが出来ます。
ファッションアイテムの名前、概要、収納場所でキーワード検索出来るようにもしているので、登録アイテムが増えても心配ありません。


## 作成した背景/目的

私は、常日頃からファッションアイテムに興味がありました。
どんな服を着て、どんなアクセサリーを付けて、というのを考えるのが趣味でもありました。
なので、多種類のファッションアイテムを購入し、自分の部屋にて収納していました。
ですが問題点として、日々増えていくファッションアイテムをクローゼットだけでは管理出来なくなってしまい、どこに何を収納したかというのが分からなくなっていきました。
そこで、Webページ上でファッションアイテムの写真、名前、概要、収納場所、カテゴリーという項目で登録し、一覧表示出来る「マイファッションアイテム管理アプリ」を作成しました。


## 開発環境
#### OS
Windows 10 Home

#### フロントエンド
- HTML/CSS
- Bootstrap v5.0.0

#### バックエンド
- PHP v8.0.15
- Laravel v6.20.44

#### データベース
MariaDB v10.2.38

#### インフラ
AWS（EC2）

#### デプロイ
Heroku（ https://myfashionitem.herokuapp.com/ ）


## 注力した機能
- 登録したファッションアイテムをキーワード（名前、概要、収納場所）で検索出来るようにしました。
            
            if ($search = request('search')) {
                
                $search = request('search');
                
                $fashion_data = Fashion::orderBy('created_at', 'asc')->where(function ($query) use ($search) {
                    $query->where('fashionName', 'LIKE', "%{$search}%")
                        ->orWhere('fashionOverview','LIKE',"%{$search}%")
                        ->orWhere('syuunou','LIKE',"%{$search}%");
                })->paginate(10);
            }else{
                $fashion_data = $fashion->getPaginateByLimit();
            }
        return view('fashions/index')->with(['fashions' => $fashion_data]);
 




## テーブル定義
#### categoriesテーブル
|  カラム名  |  データ型  |  詳細  |
| ---- | ---- | ---- |
|  id  |  int(10) unsigned  |  ID  |
|  name  |  varchar(50)   |   カテゴリー名  |
|  created_at  |  timestamp  |  データ作成時間  |
|  updated_at |  timestamp  |  データ更新時間  |


#### fashionsテーブル
|  カラム名  |  データ型  |  詳細  |
| ---- | ---- | ---- |
|  id  |  int(10) unsigned   |  ID  |
|  fashionName  |  char(100)  |  ファッションアイテム名  |
|  fashionOverview  |  varchar(500)  |  ファッションアイテムの概要  |
|  syuunou  |  varchar(500)  |  収納場所  |
|  category_id  |  int(10) unsigned  |  カテゴリーID  |
|  image_path  |  varchar(255)  |  ファッションアイテムの写真  |
|  created_at  |  timestamp  |  データ作成時間  |
|  updated_at |  timestamp  |  データ更新時間  |
|  deleted_at |  timestamp  |  データ時間削除時間  |

