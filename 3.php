<?php
class Thesaurus
{
    private $thesaurus;

    function Thesaurus($thesaurus){
        $this->thesaurus = $thesaurus;
    }

    public function getSynonyms($word){
        $output_array = array();

        $output_array['word'] = $word;
        if(isset($this->thesaurus[$word])){
            $output_array['synonyms'] = $this->thesaurus[$word];
        }
        else{
            $output_array['synonyms'] = array();
        }

        return json_encode($output_array);
    }
}
$thesaurus = new Thesaurus(
    array(
        "buy" => array("purchase"),
        "big" => array("great", "large")
    ));
echo $thesaurus->getSynonyms("big");
echo "\n";
echo $thesaurus->getSynonyms("agelast");