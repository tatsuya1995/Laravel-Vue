<?php

namespace App\Http\Controllers;

    use App\Models\SpotInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Repositories\SpotInfoRepositoryInterface;
use Arr; // app.phpのエイリアスに登録されているからこれでも使える
class MainController extends Controller
{
    protected $SpotInfo;

    public function __construct(SpotInfoRepositoryInterface $spotInfoRepositoryInterface)
    {
        $this->SpotInfo = $spotInfoRepositoryInterface;
    }

    public function detail() 
    {
        $getAll = $this->SpotInfo->getAll();
        //dd($getAll);
        return view('detail');
    }
    public function list() 
    {
        $getAll = $this->SpotInfo->getAll();
        //dd($getAll);
        return view('list');
    }


    public function search(Request $request)
    {
        //dd($request);
        $searchList = [
            'name' => $request->name ?: '', 
            'ageRange'  => $request->ageRange ?: '', 
            'star' => $request->star ?: '' ,
            'updated_at' => $request->updated_at ?: '' ,
            'sortOrder' => $request->sortOrder ?: '' ,
        ];
        //$spotList = $this->SpotInfo->getAll();

        $spotList = $this->SpotInfo->getSearchSpotList($searchList ?: '');
 //       dd($spotList);
        // $searchResult = [
        //     'id' => $spotList->id, 
        //     'name' => $spotList['name'], 
        //     'age' => $spotList['age'], 
        //     'star' => $spotList['star'], 
        //     'note' => $spotList['note'], 
        //     'image' => $spotList['image'], 
        //     'updated_at' => $spotList['updated_at'], 
        // ];
        // dd($searchResult);

    
        $ageRangeList = Arr::pluck((config('type.ageRange')), 'value');
        $sortList = Arr::pluck((config('type.sortValue')), 'value');

        //dd(Carbon::now('Asia/Tokyo'));

        return view('spot_list', ['spotList' => $spotList, 'ageRangeList' => $ageRangeList, 'sortList' => $sortList]);

    }

    public function save(Request $request)
    {
        // dd($request);
        $spotInfo = new SpotInfo();
        $spotInfo->name = $request->name ?: '';
        $spotInfo->age = $request->age ?: '';
        $spotInfo->star = 1; //エラーになるためTODO：仮置き
        $spotInfo->note = $request->note ?: '';
        $spotInfo->image = $request->image ?: '';

        $spotInfo->save();



        // TODO 星をどうやって取るか。
        // $raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
        // // echo $raw;
        // $data = json_decode($raw); // json形式をphp変数に変換

        // $res = $data; // やりたい処理
        // // echo json_encode($res); // json形式にして返す
        return view('detail');
    }
}
