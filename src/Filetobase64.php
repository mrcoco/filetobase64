<?php 
namespace Mrcoco;

/**
 * encode file to base64
 */
class Filetobase64
{
	
	/**
     * @var array
     */
    protected $typeArray = [
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif' => 'image/gif',
        'ico' => 'image/x-icon',
        'mp3' => 'audio/mpeg',
        'ogg' => 'audio/ogg',
        'pdf' => 'application/pdf',
        'doc' => 'application/msword',
        'xls' => 'application/vnd.ms-excel',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',



    ];

    /**
     * File2base64 constructor.
     *
     * @param array $arr
     */
    public function __construct(array $arr = [])
    {
        $this->typeArray = array_merge($this->typeArray, $arr);
    }

    /**
     * @param $fileName
     *
     * @return bool|string
     */
    public function getSuffix($fileName)
    {
        if (false === stripos($fileName, '.')) {
            return false;
        }
        $arr = explode('.', $fileName);

        return trim(end($arr));
    }

    /**
     * @param $fileName
     *
     * @return bool|string
     */
    public function toBase64($fileName)
    {
        if ($fileName && $this->getSuffix($fileName) && is_file($fileName) && isset($this->typeArray[$this->getSuffix($fileName)])) {
            return 'data:'.$this->typeArray[$this->getSuffix($fileName)].';base64,'.base64_encode(file_get_contents($fileName));
        }

        return false;
    }

    /**
     * @param $fileName
     * @param $filePath
     *
     * @return bool
     */
    public function toFile($fileName, $filePath)
    {
        if ($fileName && $filePath && is_file($fileName) && isset($this->typeArray[$this->getSuffix($fileName)])) {
            if (false !== file_put_contents($filePath, $this->toBase64($fileName))) {
                return true;
            }
        }

        return false;
    }
}