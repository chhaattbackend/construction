<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalClass extends Model
{


    

    public function storeS3($file, $path)
    {
        $exe = $file->getClientOriginalName();
        $filename = time() . '-' . $exe;
        $file->storeAs($path, $filename, 's3');

        return $filename;
    }
}
