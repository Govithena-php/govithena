<?php

class Filter
{
    private $inputs = [];
    private $fromDate;
    private $toDate;

    public function __construct($names = [], $date = [])
    {
        foreach ($names as $name) {
            $temp = new Input(POST, $name);
            if ($temp == "all") {
                $this->inputs[$name] = "";
            } else {
                $this->inputs[$name] = $temp->get();
            }
        }

        $fd =  new Input(POST, $date[0]);
        $td =  new Input(POST, $date[1]);

        if (strtotime($fd)) {
            $this->fromDate = $fd;
        } else {
            $this->fromDate = "1970-01-01 00:00:00";
        }
        if (strtotime($td)) {
            $this->toDate = $td;
        } else {
            $this->toDate = "2050-01-01 00:00:00";
        }
    }

    public function noFilters()
    {
        return empty(array_filter(array_values($this->inputs))) && empty($this->fromDate) && empty($this->toDate);
    }


    public function apply($sql)
    {
        if ($this->noFilters()) {
            return $sql;
        }
        $sql .= " WHERE ";
        foreach ($this->inputs as $key => $value) {
            if ($value != "") {
                $sql .= $key . " LIKE '%" . $value . "%' AND ";
            }
        }

        $sql .= "timestamp BETWEEN '" . $this->fromDate . "' AND '" . $this->toDate . "' ";

        return $sql;
    }

    public function __toString()
    {
        return implode(", ", $this->inputs);
    }
}
