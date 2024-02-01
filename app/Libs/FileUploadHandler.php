<?php

namespace App\Libs;

class FileUploadHandler 
{
    private static $rootUploadDir = 'files';

    public static function uploadFile($file, $dir, $rootUploadDir = null)
    {
        $rootUploadDir ??= self::$rootUploadDir;
        
        self::checkCreateUploadDir($dir, $rootUploadDir);
        $fileName = self::genUniqUploadFileName($dir, $file->getClientOriginalExtension(), $rootUploadDir);
        
        $fileDirPath = $rootUploadDir.'/'.$dir;
        $file->move(public_path($fileDirPath), $fileName);
        $filePath = $fileDirPath.'/'.$fileName;
        chmod(public_path($filePath), 0777);

        return $filePath;
    }

    public static function checkCreateUploadDir($dir, $rootUploadDir = null)
    {
        $rootUploadDir ??= self::$rootUploadDir;

        self::createDir(public_path($rootUploadDir));

        self::createDir(public_path($rootUploadDir.'/'.$dir));
    }

    public static function createDir($dirAbsPath)
    {
        if (!file_exists($dirAbsPath)) {
            $oldmask = umask(0);
            mkdir($dirAbsPath, 0777, true);
            umask($oldmask);
        }
    }

    public static function genUniqUploadFileName($dir, $fileExtension, $rootUploadDir = 'files')
    {
        $rootUploadDir ??= self::$rootUploadDir;

        do {
            $filename = md5(uniqid(rand(), true)).'.'.$fileExtension;
        }
        while(file_exists(public_path($rootUploadDir.'/'.$dir.'/'.$filename)));

        return $filename;
    }

}

