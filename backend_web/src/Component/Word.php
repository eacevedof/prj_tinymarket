<?php
namespace App\Component;

class Word
{
    private const VOWELS = ["a","e","i","o","u"];
    private const CONSONANTS = [
        "a","b","c","d","f","g","h","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z"
    ];
    private const NUMBERS = [0,1,2,3,4,5,6,7,8,9];
    private const XCHARS = ["$","@","#","&","%","?",";",".","+","-"];

    public function get_password($iLen=4):string
    {
        $word = [];
        foreach(range(0,$iLen-1) as $i){
            if($i % 2 === 0){
                $c = $this->_get_random_constant();
                $c = $this->_get_random_upper($c);
            }
            else{
                $c = $this->_get_random_vowel();
                $c = $this->_get_random_upper($c);
            }
            $word[] = $c;
        }
        $word[] = $this->_get_random_xchar();
        $word[] = $this->_get_random_number(3);
        return implode("",$word);
    }

    public function get_password_hard($iLen=6):string
    {
        $word = [];
        foreach(range(0,$iLen-1) as $i){
            if($i == $iLen-1)
            {
                $nlen = rand(2,4);
                $c = $this->_get_random_number($nlen);
            }
            elseif($i % 2 === 0){
                $c = $this->_get_random_constant();
                $c = $this->_get_random_upper($c);
            }
            elseif($i % 3 === 0) {
                $c = $this->_get_random_vowel();
                $c = $this->_get_random_upper($c);
            }
            else {
                $c = $this->_get_random_xchar();
            }
            $word[] = $c;
        }
        return implode("",$word);
    }

    private function _get_random_vowel()
    {
        $irand = rand(0,4);
        return self::VOWELS[$irand];
    }

    private function _get_random_constant()
    {
        $irand = rand(0,21);
        return self::CONSONANTS[$irand];
    }

    private function _get_random_upper($c)
    {
        $irand = rand(0,1);
        if($irand)
            return strtoupper($c);
        return $c;
    }

    private function _get_random_number($iLen=1)
    {
        $number = [];
        foreach(range(0,$iLen-1) as $i){
            $irange = rand(0,9);
            $number[] = self::NUMBERS[$irange];
        }
        return implode("",$number);
    }

    private function _get_random_xchar($iLen=1)
    {
        $chars = [];
        foreach(range(0,$iLen-1) as $i){
            $irange = rand(0,9);
            $chars[] = self::XCHARS[$irange];
        }
        return implode("",$chars);        
    }

}