<?php

namespace App\Http\Controllers;
use App\Models\Account;
use APP\Exceptions\Handler;
use APP\Exceptions\FileNotFoundException;
use App\Helper;

use Illuminate\Http\Request;

class accountController extends Controller
{
    public function index() 
    {
        hello();
        $viewAccounts = Account::all();
        return view('viewAccount', ['viewAccounts' => $viewAccounts]);
    }
    
    public function store(Request $request) 
    {
        $account = new Account;
        $account->name = $request->name ?: '';
        $account->group = $request->group ?: '';

        try {
            if(!($account->name) || !($account->group)) {
                //throw new \FileNotFoundException('hello');
                throw new \Exception('nameやgroupがありません');    
            }
        }
        catch(\FileNotFoundException $ex) {
            echo ($ex->getMessage(). 'よ！');
            return ;
        }

//         $account->errorTest = $request->errorTest;

        $account->save();

        return redirect()->route('displayAccount');
    }

    public function edit(Request $request) 
    {
        $accountId = $request->id;
        //var_dump($accountId);
        $editAccount = account::find($accountId);

        $editAccount->group = $request->group ? $request->group : '';
        $editAccount->name = $request->name ? $request->group : '';
        $editAccount->updated_at = date("Y-m-d H:i:s");
        $editAccount->save();
        return redirect()->route('displayAccount');

    }

    public function delete(Request $request)
    {
        $accountId = $request->id;
        var_dump($accountId);
    }
}

?>