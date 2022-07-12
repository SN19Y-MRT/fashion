<?php

namespace App\Http\Controllers;
use App\Category;
use App\Fashion;
use GuzzleHttp\Client;
use App\Http\Requests\fashionRequest;
use Storage;
use JD\Cloudder\Facades\Cloudder;
 

class fashionController extends Controller
{
    public function index(Fashion $fashion)
    {
        //検索機能
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
    }    

    /**
     * 特定IDのfashionを表示する
     *
     * @params Object fashion // 引数の$fashionはid=1のfashionインスタンス
     * @return Reposnse fashion view
     */
    public function show(Fashion $fashion)
    {

        return view('fashions/show')->with(['fashion' => $fashion]);
    }
    
    public function register(Category $category)
    {
        return view('fashions/register')->with(['categories' => $category->get()]);


    }
    public function store(fashionRequest $request, Fashion $fashion)
    {
         if ($image = $request->file('image')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            //直前にアップロードされた画像のpublicIdを取得する。
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 200,
                'height'    => 200
            ]);
            $fashion->image_path = $logoUrl;
            $fashion->public_id  = $publicId;
        }
        
        $input = $request['fashion'];
        $fashion->fill($input)->save();
        return redirect('/fashions/' . $fashion->id);
        
    }
    
    public function edit(Fashion $fashion,Category $category)
    {
        return view('fashions/edit')->with(['categories' => $category->get()])->with(['fashion' => $fashion]);
    }
    
    public function update(fashionRequest $request, Fashion $fashion)
    {
        $input_fashion = $request['fashion'];
        $fashion->fill($input_fashion)->save();
        return redirect('/fashions/' . $fashion->id);
    }
    
    public function delete(Fashion $fashion)
    {
        $fashion->delete();
        return redirect('/');
    }


    


    
    

}
?>