<?php

namespace App\Http\Controllers\Traits;

trait FileUploadTrait
{
  public function imageUpload($request, $key, $image_path)
  {
    $new_request = $request;

    if (array_key_exists($key, $request)) {
      $file = $request[$key];

      $ext = $file->extension();
      $file_name = md5(microtime()) . '.' . $ext;
      $file->move($image_path, $file_name);

      $new_request = array_merge($request, [$key => $file_name]);
    }

    return $new_request;
  }
}
