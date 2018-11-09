<?php

namespace Training\AdditionalTestOM\Model;


class Test {
    
    private $manager;
    private $arrayList;
    private $name;
    private $number;
    
    public function __construct( 
                \Training\TestOm\Model\ManagerInterface $manager,
                $name,
                int $number,
                array $arrayList
            )
    {
        $this->manager = $manager;
        $this->arrayList = $arrayList;
        $this->name = $name;
        $this->number = $number;
    }
    
    public function log()
    {
        print_r(getClass($this->manager));
        echo "<br>";
        print_r($this->manager);
        echo "<br>";
        print_r($this->arrayList);
        echo "<br>";
        print_r($this->name);
        echo "<br>";
        print_r($this->number);
    }
}
