<?php

class FileSizeConverter
{
    protected $val;
    protected $sizeUnit;
    protected $toSizeUnit;
    protected $result;

    /*  1024bytes = 1KB
        1024KB = 1MB
        1024MB = 1GB
        (1024 * 1024)bytes = 1MB
        (1024 * 1024 * 1024)bytes = 1GB
    */
    public function __construct($val, $sizeUnit, $toSizeUnit = 'bytes')
    {
        $this -> val = $val;
        $this -> sizeUnit = strtoupper($sizeUnit);
        $this -> toSizeUnit = strtoupper($toSizeUnit);

    }

    public function convert()
    {
        switch($this -> sizeUnit)
        {
            case 'BYTES':
                switch($this -> toSizeUnit)
                {
                    case 'BYTES':
                        $this -> result = $this -> val;
                        break;
                    case 'KB':
                        $this -> result = $this -> val / 1024;
                        break;
                    case 'MB':
                        $this -> result = $this -> val / (1024 * 1024);
                        break;
                    case 'GB':
                        $this -> result = $this -> val / (1024 * 1024 * 1024);
                        break;
                    default:
                        throw new Exception('Invalid unit to convert your BYTES to');
                        break;
                }
                break;
            case 'KB':
                switch($this -> toSizeUnit)
                {
                    case 'BYTES':
                        $this -> result = $this -> val * 1024;
                        break;
                    case 'KB':
                        $this -> result = $this -> val;
                        break;
                    case 'MB':
                        $this -> result = $this -> val / 1024;
                        break;
                    case 'GB':
                        $this -> result = $this -> val / (1024 * 1024);
                        break;
                    default:
                        throw new Exception('invalid unit to convert your KILOBYTE to');
                        break;
                }
                break;
            case 'MB':
                switch($this -> toSizeUnit)
                {
                    case 'BYTES':
                        $this -> result = $this -> val * 1024 * 1024;
                        break;
                    case 'KB':
                        $this -> result = $this -> val * 1024;
                        break;
                    case 'MB':
                        $this -> result = $this -> val;
                        break;
                    case 'GB':
                        $this -> result = $this -> val / 1024;
                        break;
                    default:
                        throw new Exception('Invalid unit to convert your MEGABYTE to');
                        break;
                }
                break;
            case 'GB':
                switch($this -> toSizeUnit)
                {
                    case 'BYTES':
                        $this -> result = $this -> val * 1024 * 1024 * 1024;
                        break;
                    case 'KB':
                        $this -> result = $this -> val * 1024 * 1024;
                        break;
                    case 'MB':
                        $this -> result = $this -> val * 1024;
                        break;
                    case 'GB':
                        $this -> result = $this -> val;
                        break;
                    default:
                        throw new Exception('Invalid unit to convert your GIGABYTE to');
                        break;
                }
                break;
            default:
                throw new Exception('Invalid unit of input');
                break;
        }

        return $this -> result;
    }
}
