<?php

namespace Larodel\Assets;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DotenvEditor
{
    public static function setKey($key, $value)
    {
        // مسیر فایل .env
        $envFilePath = base_path('.env');

        // بررسی وجود فایل
        if (File::exists($envFilePath)) {
            // خواندن محتوای فایل .env
            $envContent = File::get($envFilePath);

            // اگر کلید مورد نظر وجود نداشت، آن را به فایل .env اضافه کنید
            if (!Str::contains($envContent, "$key=")) {
                $envContent .= PHP_EOL . "$key=$value";
            } else {
				
				$lines = explode(PHP_EOL, $envContent);

				foreach ($lines as &$line) {
									
					 if (Str::contains($line, "$key=")) {
						
						$envContent = Str::replaceFirst($line, "$key=$value", $envContent);
					}else{

					}
				}
				
			
            }

            // ذخیره تغییرات
            File::put($envFilePath, $envContent);
        }
    }
}
