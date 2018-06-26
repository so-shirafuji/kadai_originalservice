<?php
namespace App\Libraries;

class GurunaviAPI {
    protected $key;// = 'c37353f48f62ba58113179ad70bcd0da';
    protected $baseUrls, $baseUrl;
    protected $patterns;
    protected $replacements;
    protected $uris;

    function __construct($key){
        $this->key = $key;
        $this->uris = [
            'search' => 'https://api.gnavi.co.jp/RestSearchAPI/20150630/',
            'area_m' => 'https://api.gnavi.co.jp/master/GAreaMiddleSearchAPI/20150630/',
            'area_s' => 'https://api.gnavi.co.jp/master/GAreaSmallSearchAPI/20150630/',
        ];
        $this->baseUrls = [
            'https://api.gnavi.co.jp/RestSearchAPI/20150630/' => '@uris?keyid=@key&format=@format&freeword=@freeword&areacode_m=@areacode_m&id=@id',
            'https://api.gnavi.co.jp/master/GAreaMiddleSearchAPI/20150630/' => '@uris?keyid=@key&format=@format',
            'https://api.gnavi.co.jp/master/GAreaSmallSearchAPI/20150630/' => '@uris?keyid=@key&format=@format',
        ];
        $this->baseUrl = $this->baseUrls['https://api.gnavi.co.jp/RestSearchAPI/20150630/'];
        $this->patterns = [
            'uris' => '/@uris/',
            'key' => '/@key/',
            'format' => '/@format/',
            'freeword' => '/@freeword/',
            'areacode' => '/@areacode_m/',
            'id' => '/@id/',
        ];
        $this->replacements = [
            'uris' => $this->uris['search'],
            'key' => $key,
            'format' => 'json',
            'freeword' => '',
            'areacode' => '',
            'id' => '',
        ];
    }

    public function SetRequestQuery($index, $val){
        //exception handling
        if(!isset($this->replacements[$index])){return false;}

        //in the case of uri setting
        if( ($index == 'uris') && preg_match('/RestSearchAPI|GAreaMiddleSearchAPI|GAreaSmallSearchAPI/', $val) ){
            $this->baseUrl = $this->baseUrls[$val];
        }

        $this->replacements[$index] = $val;
        return true;
    }

    public function SetBaseUrl($index){
        if(!isset($this->baseUrls[$index])){return false;}

        $this->baseUrl = $this->baseUrls[$index];
        return true;
    }

    public function GetReplacements(){
        return $this->replacements;
    }

    public function GetUri($index){
        // exception handling
        if(!isset($this->uris[$index])){ return false; }

        return $this->uris[$index];
    }

    public function GetHttpRequestRaw(){
        $requestUrl = preg_replace($this->patterns, $this->replacements, $this->baseUrl);
        $res = file_get_contents($requestUrl);
        return GurunaviAPIHelper::unicode_decode($res);
    }

    public function GetHttpRequest(){
        $requestUrl = preg_replace($this->patterns, $this->replacements, $this->baseUrl);
        $res = file_get_contents($requestUrl);
        return json_decode(GurunaviAPIHelper::unicode_decode($res));
    }    
    // var_dump(json_decode(unicode_decode($res))->garea_middle);
}

class GurunaviAPIHelper {
    #source: http://stackoverflow.com/questions/2934563/how-to-decode-unicode-escape-sequences-like-u00ed-to-proper-utf-8-encoded-char
    public static function replace_unicode_escape_sequence($match) {
        return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
    }
    public static function unicode_decode($str) {
        return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', [GurunaviAPIHelper::class, 'replace_unicode_escape_sequence'], $str);
    }
}