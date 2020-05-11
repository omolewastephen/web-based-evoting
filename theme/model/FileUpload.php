<?php

class FileUpload
{
    protected $location;
    protected $extension;
    protected $size;
    protected $originalSize;
    protected $unit;
    protected $data = '';
    protected $message = array();
    protected $result;

    function __construct($location, $extension = array(), $size, $unit)
    {
        $this -> location = $location;

        if( function_exists('filter_list') )
        {
            if(filter_var($size, FILTER_VALIDATE_INT))
            {
                $convertSize = new FileSizeConverter($size, $unit);
                $this -> size = $convertSize -> convert();
                $this -> originalSize = $size;
            }
            else
            {
                throw new Exception('The size must be an integer');
            }
        }
        else
        {
            if(!is_numeric($size))
            {
                throw new Exception('The size must be an integer');
            }
            else
            {
                $convertSize = new FileSizeConverter($size, $unit);
                $this -> size = $convertSize -> convert();
                $this -> originalSize = $size;
            }
        }

        if(!is_array($extension))
        {
            throw new Exception('The extension must be an array');
        }
        else
        {
            $this -> extension = $extension;
        }

        if(is_string($unit))
        {
            $this -> unit = $unit;
        }
        else
        {
            throw new Exception('The unit must be a string');
        }
    }

    public function uploadSingleFile($name)
    {
        $sizeOK = false;
        $typeOK = false;

        // check extension
        $typeOK = $this -> checkExt($_FILES[$name]['type']);

        // check size
        $sizeOK = $this -> checkSize($_FILES[$name]['size']);

        if($typeOK && $sizeOK)
        {
            $rand = mt_rand(000,999);
            $this -> location = $this -> location . date('jnYGis') . $rand . str_replace(" ", "_", $_FILES[$name]['name']);

            $success = move_uploaded_file($_FILES[$name]['tmp_name'], $this -> location);

            if($success && $_FILES[$name]['error'] == 0)
            {
                $this -> data = $this -> location;
                $this -> message[] = 'File was uploaded successfully';
                $this -> result = array(true, $this -> data);
            }
            elseif($_FILES[$name]['error'] == 1)
            {
                $this -> message[] = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
                $this -> result = array(false, $this -> data);
            }
            elseif($_FILES[$name]['error'] == 3)
            {
                $this -> message[] = 'The uploaded file was only partially uploaded.';
                $this -> result = array(false, $this -> data);
            }
            elseif($_FILES[$name]['error'] == 4)
            {
                $this -> message[] = 'No file was uploaded.';
                $this -> result = array(false, $this -> data);
            }
            else
            {
                $this -> message[] = 'File wasn\'t uploaded successfully.';
                $this -> result = array(false, $this -> data);
            }
        }
        else
        {
            $validType = join(', ', $this -> formatExt());
            throw new Exception($_FILES[$name]['type'] . 'Your size exceeds ' . $this -> originalSize . strtoupper($this -> unit) . '. The accepted file types are: ' . $validType);
        }
        return $this -> result;
    }

    public function uploadMultipleFiles($name, $all = true)
    {
        if(!is_array($_FILES[$name]['name']))
        {
            throw new Exception('The name argument must be an array, e.g; name="image[]"');
        }
        else
        {
            $number = count($_FILES[$name]['name']);
        }

        switch($all)
        {
            case true:
                $empty = true;
                foreach($_FILES[$name]['name'] as $e)
                {
                    if(!empty($e))
                    {
                        $empty = false;
                    }
                    else
                    {
                        $empty = true;
                    }
                }

                if($empty)
                {
                    throw new Exception("All upload must be filled");
                }

                // check size
                $counter = 0;
                $failedSizeTest = array();
                while($counter < $number)
                {
                    $check = $this -> checkSize($_FILES[$name]['size'][$counter]);
                    if($check != true)
                    {
                        $failedSizeTest[] = $_FILES[$name]['name'][$counter];
                    }
                    $counter ++;
                }

                if(empty($failedSizeTest))
                {
                    // check type
                    $counter = 0;
                    $failedTypeTest = array();
                    while($counter < $number)
                    {
                        $check = $this -> checkExt($_FILES[$name]['type'][$counter]);
                        if($check != true)
                        {
                            $failedTypeTest[] = $_FILES[$name]['name'][$counter];
                        }
                        $counter ++;
                    }

                    if(empty($failedTypeTest))
                    {
                        // move file to location
                        $counter = 0;
                        $moveSuccessful = array();
                        $failedMove = array();
                        while($counter < $number)
                        {
                            $rand = mt_rand(000,999);
                            if(move_uploaded_file($_FILES[$name]['tmp_name'][$counter], $this -> location . date('jnYGis') . $rand . $_FILES[$name]['name'][$counter]))
                            {
                                $moveSuccessful[] = $this -> location . date('jnYGis') . $rand . $_FILES[$name]['name'][$counter];
                            }
                            else
                            {
                                $failedMove[] = $_FILES[$name]['name'][$counter];
                            }
                            $counter ++;
                        }

                        if(empty($failedMove))
                        {
                            $this -> data = $moveSuccessful;
                            $this -> message[] = 'File was uploaded successfully';
                            $this -> result = array(true, $this -> data);
                        }
                        else
                        {
                            throw new Exception('The following popup did not upload due to system error: ' . join(', ', $failedTypeTest) . '.');
                        }
                    }
                    else
                    {
                        throw new Exception('The following popup did not upload because of their file types: ' . join(', ', $failedTypeTest) . '. The accepted file types are: ' . join(', ', $this -> formatExt()));
                    }

                }
                else
                {
                    throw new Exception('The following popup exceeds ' . $this -> originalSize . strtoupper($this -> unit) . ': <br />' . join(',<br />', $failedSizeTest));
                }
                break;
            case false:
                // check to make sure at least 1 image will be uploaded
                $empty = true;
                $fileKeysForUpload = array();
                foreach($_FILES[$name]['name'] as $key => $fileName)
                {
                    if(!empty($fileName))
                    {
                        $fileKeysForUpload[] = $key;
                        $empty = false;
                    }
                }
                if($empty)
                {
                    throw new Exception('At least one(1) image must be uploaded');
                }

                $number = count($fileKeysForUpload);
                $filesToUpload = array();
                $error = array();

                foreach($fileKeysForUpload as $pic)
                {
                    $sizeOK = false;
                    $typeOK = false;
                    // check for the size
                    $sizeOK = $this -> checkSize($_FILES[$name]['size'][$pic]);

                    // check for the type
                    $typeOK = $this -> checkExt($_FILES[$name]['type'][$pic]);

                    if($typeOK && $sizeOK)
                    {
                        $rand = mt_rand(000,999);
                        $filesToUpload[$pic] = $this -> location . date('jnYGis'). $rand . $_FILES[$name]['name'][$pic];
                    }
                    else
                    {
                        $error[$pic] = $_FILES[$name]['name'][$pic];
                    }
                }

                if($number == count($filesToUpload))
                {
                    foreach($filesToUpload as $key => $img)
                    {
                        move_uploaded_file($_FILES[$name]['tmp_name'][$key], $img);
                    }
                    $this -> data = $filesToUpload;
                    $this -> result = array(true, $this -> data);
                    //$this -> message[] = $_FILES[$name]['name'][$key];
                }
                else
                {
                    $errFiles = join(', ', $error);
                    $allowedTypes = join(', ', $this -> formatExt());
                    throw new Exception('Error uploading the files: ' . $errFiles . '.<br />Maximum size: ' .
                        $this -> originalSize . strtoupper($this -> unit) . '<br />Allowed types: ' . $allowedTypes);
                }

                break;
            default:
                throw new Exception('A boolean value is expected, either True or False');
                break;
        }
        return $this -> result;
    }

    private function checkSize($name)
    {
        $result = false;
        if($name < $this -> size)
        {
            $result = true;
        }
        return $result;
    }

    private function checkExt($name)
    {
        $result = false;
        foreach($this -> extension as $ext)
        {
            if($name == $ext)
            {
                $result = true;
            }
        }
        return $result;
    }

    public function returnMsg()
    {
        return 'Files ' . join(', ', $this -> message) . ' uploaded successfully.';
    }

    private function formatExt()
    {
        $extOutput = array();

        foreach($this -> extension as $ext)
        {
            list($type, $extension) = explode('/', $ext);
            $extOutput[] = $extension;
        }
        return $extOutput;
    }

    public static function checkForAtLeastOneImage($name)
    {
        $result = false;
        foreach($_FILES[$name]['name'] as $num => $file)
        {
            if(!empty($_FILES[$name]['name'][$num]))
                $result = true;
            break;
        }
        return $result;
    }
}
