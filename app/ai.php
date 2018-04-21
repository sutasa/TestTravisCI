<?php

class AI
{
    public static function process($text)
    {
        $result = [
            'gender' => self::getGender($text),
            'sentiment' => self::getSentiment($text),
            'rude_words' => self::getRudeWords($text),
            'languages' => self::getLanguages($text),
        ];
        return $result;
    }

    /**
     * @return string 'Male' or 'Female' or 'Unknown'
     */
    public static function getGender($text)
    {
        $female = array("ค่ะ","หนู","ฉัน");
        $male = array("ครับ","ผม","นาย");

        for($i=0;$i<sizeof($male);$i++){
            
            if(strpos($text, $male[$i]) !== false){                
                return 'Male';
            }
        }

        for($i=0;$i<sizeof($female);$i++)
        {
            if(strpos($text, $female[$i]) !== false){
                return 'Female';
            }
        }  
        return 'Unknown';
    }

    /**
     * @return string 'Positive' or 'Neutral' or 'Negative'
     */
    public static function getSentiment($text)
    {
        $pt = array("ดีใจ","มีความสุข","สุขใจ",'ดี');
        $nt = array("เสียใจ","ไม่มีความสุข","ทุกข์ใจ",'แย่');
       
        for($i=0;$i<sizeof($pt);$i++){
            
            if(strpos($text, $pt[$i]) !== false){                
                return 'Positive';
            }
        }

        for($i=0;$i<sizeof($nt);$i++){
            if(strpos($text, $nt[$i]) !== false){
                return 'Negative';
            }
        }  
        return 'Neutral';
    }

    /**
     * @return array of all rude words in Thai
     */
    public static function getRudeWords($text)
    {
        $bf = array('อีเหี้ย','ไอควาย','ไอสัส','เย็ดแม่ม','ช้างเย็ด','จันไร');
        $result = array();
        for($i=0;$i<sizeof($bf);$i++){
            if(strpos($text, $bf[$i]) !== false){                
                array_push($result,$bf[$i]);
            }
        }

        return $result;
    }

    /**
     * @return array of languages (TH, EN)
     */
    public static function getLanguages($text)
    {
        $result = [];
        $re = '/[ก-๛]+/u';
        $en = '/[a-zA-Z]+/u';
        preg_match_all($re, $text, $matches, PREG_SET_ORDER, 0);
        if (!empty($matches)) {
            array_push($result, 'TH');
        }
        
        preg_match_all($en, $text, $matches, PREG_SET_ORDER, 0);
        if (!empty($matches)) {
            array_push($result, 'EN');
        }
        
        // preg_match_all($en, $re, $text, $matches, PREG_SET_ORDER, 0);
        // if (!empty($matches)) {
        //     array_push('TH', 'EN' );
        // }

        return $result;

    }
}
