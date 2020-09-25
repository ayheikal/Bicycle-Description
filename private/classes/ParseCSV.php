<?php


class ParseCSV
{
    public $file_name;
    private $header;
    private $data=[];
    private static $delimeter=',';
    private $row_count;

    public function __construct($file_name=""){
        if($file_name!='') {
            $this->fileExist($file_name);
        }
        $this->row_count=0;
    }

    public function parse(){

        if(!isset($this->file_name)){
            echo "file not set ";
            return false;
        }

        $file=fopen($this->file_name,'r');
        while (!feof($file)){
            $row=fgetcsv($file,0,self::$delimeter);
            if($row==[NULL]||$row===FALSE)continue;
            if(!$this->header)$this->header=$row;
            else{
                $this->data[]=array_combine($this->header,$row);
                $this->row_count++;
            }
        }
        fclose($file);
//        return $this->data;
    }

    public function getData(){
        $this->parse();
        return $this->data;
    }

    public function getRowCount(){return $this->row_count;}

    private function reset(){
        $this->data=[];
        $this->row_count=0;
        $this->header=NULL;

    }

    private function fileExist($filename)
    {
        if(!file_exists($filename)){
            echo "FIle Does not exist";
            return false;
        }
        elseif(!is_readable($filename)){
            echo "File is not readable";
            return false;
        }
        $this->file_name=$filename;
        return true;

    }

}