<?php


class Bicycle
{
    private $brand,$model,$year,$category,$color,$description,$gender,$price;
    protected $weight_kg;
    protected $condition_id=3;
    const CATEGORIES=["road","mountain","hybrid","cruiser","city","BMX"];
    const GENDERS=["male","female","unisex"];
    const BICYCLES_CONDITION=
        ['Beat Up','Decent','Good','Great','Like New'];
    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function __construct($args=[])
    {
//        $this->brand=$args["brand"]?$args["brand"]:'';
//        $this->model=$args["model"]?$args["model"]:NULL;
//        $this->year=$args["year"]?$args["year"]:NULL;
//        $this->color=$args["color"]?$args["color"]:NULL;
//        $this->description=$args["description"]?$args["description"]:NULL;
//        $this->gender=$args["gender"]?$args["gender"]:NULL;
//        $this->category=$args["category"]?$args["category"]:NULL;
//        $this->price=$args["price"]?$args["price"]:0.0;
//        $this->condition_id=$args["condition_id"]?$args["condition_id"]:3;
//        $this->weight_kg=$args["weight_kg"]?$args["weight_kg"]:0.0;

        foreach ($args as $key=>$value){
            if(property_exists($this,$key))
            {
                $this->$key=$value;
            }
        }

    }
    public function get_weight_kg(){
        return number_format($this->weight_kg). ' kg';
    }
    public function set_weight_kg($weight_kg){
        $this->weight_kg=floatval($weight_kg);
    }
    public function get_weight_lbs(){
        return floatval($this->weight_kg)*2.2 ." lbs";
    }
    public function set_weight_lbs($weight_lbs){
        $this->weight_kg=floatval($weight_lbs)/2.2;
    }
    public function get_bicycle_condition(){
        if($this->condition_id>0){
            return self::BICYCLES_CONDITION[$this->condition_id-1];
        }
        return "unknown";
    }

}