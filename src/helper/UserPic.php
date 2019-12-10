<?php


namespace helper;


/**
 * Class UserPic
 * @package helper
 */
class UserPic
{
    /**
     * @var array
     * All allowed image formats is here
     */
    public static $formats = [
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif'
    ];
    /**
     * @var int
     * restrict max image size
     */
    public static $maxFileSize = 500000;
    /**
     * @var string
     * dir where images will be stored
     */
    public $uploadDir = __DIR__ . '/../assets/userpic';
    /**
     * @var array
     * For array $_FILES['userpic']
     */
    public $file;

    /**
     * @var null|string
     * image basename
     */
    public $basename;

    /**
     * @var string
     * userpic expose path when render page
     */
    public $exposeDir = '/assets/userpic';
    /**
     * UserPic constructor.
     * @param $userPic
     * @param null $basename
     */
    public function __construct($userPic, $basename = null)
    {
        $this->file = $userPic;
        $this->basename = $basename;
    }

    /**
     * @return bool
     */
    public function store()
    {
        return move_uploaded_file($this->file['tmp_name'], $this->uploadDir . '/' . $this->basename . '.' . $this->extension());
    }

    /**
     * @return false|string
     * Find image extension
     */
    public function extension()
    {
        return array_search($this->file['type'], self::$formats);
    }

    /**
     * @return string
     * Get path for render image
     */
    public function path()
    {
        return $this->exposeDir . '/' . $this->basename . '.' . $this->extension();
    }

}