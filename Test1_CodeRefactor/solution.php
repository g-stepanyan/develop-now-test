<?php
/***
$vehicleTypes = ['sport-car', 'truck', 'bike', 'boat'];
$vehiclesSpeed = [150, 60, 100, 50]; // vehicles speed in km/h
$distance = 350; // destination distance in km
print("Duration of each vehicle to reach destination\n");
for ($i=0;$i< count($vehicleTypes) ; $i++) {
// The boat needs extra 15 min to get ready, so we add + 0.25H
    if ($vehicleTypes[$i] == 'boat') {
        print($vehicleTypes[$i] . ": ". ($distance/$vehiclesSpeed[$i]) + 0.25);
    } else {
        print($vehicleTypes[$i] . ": ". $distance/$vehiclesSpeed[$i]);
    }
}
 **/

class Vehicle
{
    const DISTANCE = 350;

    private $type     = '';
    private $speed    = 0;
    private $extraHrs = 0;


    public function __construct($type = '', $speed = 0, $extraHrs = 0)
    {
        $this->type     = $type;
        $this->speed    = $speed;
        $this->extraHrs = $extraHrs;
    }

    public function printDuration()
    {
        print($this->type . ": " . ((self::DISTANCE / $this->speed) + $this->extraHrs));
    }
}

$vhicles = [
    new Vehicle('sport-car', 150),
    new Vehicle('truck', 60),
    new Vehicle('bike', 100),
    new Vehicle('boat', 50, 0.25),
];

foreach ($vhicles as $vhicle) {
    $vhicle->printDuration();
}