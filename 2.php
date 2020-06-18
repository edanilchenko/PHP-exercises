<?php
class FileOwners
{
    public static function groupByOwners($files){
        $output_array = array();
        foreach($files as $file => $owner){
            if(!is_array($output_array[$owner])){
                $output_array[$owner] = array();
            }
            array_push($output_array[$owner], $file);
        }
        return $output_array;
    }
}

$files = array(
    "Input.txt" => "Randy",
    "Code.py" => "Stan",
    "Output.txt" => "Randy"
);

var_dump(FileOwners::groupByOwners($files));