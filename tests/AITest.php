<?php
use PHPUnit\Framework\TestCase;

final class AITest extends TestCase
{
    public function testGender_Male()
    {
        $result = AI::getGender('สวัสดีครับ');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }
    public function testGender_Female()
    {
        $result = AI::getGender('สวัสดีค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }
    public function testGender_Unknown()
    {
        $result = AI::getGender('');
        $expected_result = 'Unknown';
        $this->assertEquals($expected_result, $result);
    }
    public function testSentiment_Positive()
    {
        $result = AI::getSentiment('ดี');
        $expected_result = 'Positive';
        $this->assertEquals($expected_result,$result);
    }
    public function testSentiment_Neutral()
    {
        $result = AI::getSentiment('เฉยๆ');
        $expected_result = 'Neutral';
        $this->assertEquals($expected_result,$result);
    }
    public function testSentiment_Negative()
    {
        $result = AI::getSentiment('แย่');
        $expected_result = 'Negative';
        $this->assertEquals($expected_result,$result);
    }
    public function testgetRudeWords()
    {
        $result = AI::getRudeWords('อีเหี้ย');
        $expected_result = ['อีเหี้ย'];
        $this->assertEquals($expected_result,$result);
    }
    // public function testgetNoRudeWords(): void
    // {
    //     $result = AI::getRudeWords('ไม่พบคำหยาบ');
    //     $expected_result = ['ไม่พบคำหยาบ'];
    //     $this->assertEquals($expected_result,$result);
    // }
    // public function testTHLanguages(): void
    // {
    //     $result = AI::getLanguages('สวัสดี');
    //     $expected_result = ['TH'];
    //     $this->assertEquals($expected_result,$result);
    // }
    // public function testENLanguages(): void
    // {
    //     $result = AI::getLanguages('hello');
    //     $expected_result = ['EN'];
    //     $this->assertEquals($expected_result,$result);
    // }
    
}