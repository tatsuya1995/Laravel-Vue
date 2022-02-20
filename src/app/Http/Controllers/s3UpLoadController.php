<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\S3\S3Client;
// use Aws\CommandPool;
use Storage;
use Config;

class s3UpLoadController extends Controller
{
    public function s3()
    {
        $s3_params = new S3Client([
            'credentials' => [
                'key' => config('filesystems.disks.s3.key'),
                'secret' => config('filesystems.disks.s3.secret'),
            ],
            'region'  => config('filesystems.disks.s3.region'),
            'version' => 'latest',
        ]);
        return $s3_params;
    }


    public function display()
    {
        $path = Storage::disk('s3')->url('https://laravel-vue-0212.s3.ap-northeast-1.amazonaws.com/6iqLovvQDhbRF68qz60NKRUnAveigwDMTPugZuU0.jpg');
        //var_dump($path);
        return view('s3UpLoad', ['path', $path]);
    }
    
    public function create(Request $request)
    {
        $file = $request->file('file');
        
        var_dump(filesize($file));
        $file_path = $file->getClientOriginalName();
       //var_dump($file->originalName);

        $params = [
            'Bucket' => config('filesystems.disks.s3.bucket'),
            'Key' => 'hoge/'. $file_path,
            'SourceFile'  => $file,
        ];


        try {
//            $result = $this->s3() -> putObject($params);
//var_dump($result = $this->s3());
        }
        catch(s3Exception $e){
            var_dump($e -> getMessage());
        }

        //$path = Storage::disk('s3')->putFile('/hoge', $file);
        return view('s3UpLoad');
    }
}