<?php

namespace Training\TestOM\Model;

use \Training\TestOm\Model\ManagerInterface;
use \Training\TestOm\Model\ManagerInterfaceFactory;

class Test {
    
    protected $manager;
    protected $arrayList;
    protected $name;
    protected $number;
    protected $factory;
    
    public function __construct( 
                \Training\TestOm\Model\ManagerInterface $manager,
                \Training\TestOm\Model\ManagerInterfaceFactory $factory,
                $name,
                int $number,
                array $arrayList
                
            )
    {
        $this->manager = $manager;
        $this->arrayList = $arrayList;
        $this->name = $name;
        $this->number = $number;
        $this->factory = $factory;
    }
    
    public function log()
    {
        print_r(get_class($this->manager));
        echo "<br>";
        print_r($this->manager);
        echo "<br>";
        print_r($this->arrayList);
        echo "<br>";
        print_r($this->name);
        echo "<br>";
        print_r($this->number);
        echo "<br>";
        $man = $this->factory->create();
        print_r(get_class($man));
    }
}
