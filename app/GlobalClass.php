<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class GlobalClass extends Model
{




    public function storeS3($file, $path)
    {
        $exe = $file->getClientOriginalName();
        $filename = time() . '-' . $exe;
        $destinationPath = public_path('/images/nikal');
        $file->move($destinationPath,$filename);
        $first = $destinationPath.'/'.$filename;

        $img = Image::make($destinationPath . '/' . $filename);
        $img->insert(public_path('images/watermark.png'), 'center');
        $img->save($destinationPath . '/' . 'second' . $filename);
        $second = $destinationPath . '/' . 'second' . $filename;

        $inserted = Image::make($destinationPath . '/' . 'second' . $filename);
        $image = Image::make($inserted)->resize(400, 300)->encode('png');

        $path1 = Storage::disk('s3')->put($path.'/'.$filename , (string)$image);

        @unlink($first);
        @unlink($second);
        // $file->storeAs($path, $filename, 's3');
        return $filename;
    }
}
