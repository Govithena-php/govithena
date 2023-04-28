<?php

class Filter
{
    private $inputs = [];
    private $submit;

    public function __construct($names = [], $submit)
    {
        foreach ($names as $name) {
            $temp = new Input(POST, $name);
            if ($temp == "all") {
                $this->inputs[$name] = "";
            } else {
                $this->inputs[$name] = $temp->get();
            }
        }
        $this->submit = $submit;
    }

    public function noFilters()
    {
        return empty(array_filter(array_values($this->inputs)));
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
        $sql = substr($sql, 0, -4);
        return $sql;
    }

    public function __toString()
    {
        return implode(", ", $this->inputs);
    }
}
