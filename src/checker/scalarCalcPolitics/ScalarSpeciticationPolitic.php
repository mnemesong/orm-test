<?php

namespace Mnemesong\OrmTest\checker\scalarCalcPolitics;

use Mnemesong\OrmTest\checker\ScalarCalcPoliticInterface;
use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;

class ScalarSpeciticationPolitic implements ScalarCalcPoliticInterface
{
    /**
     * @return class-string
     */
    public function checkingCondClass(): string
    {
        return ScalarSpecification::class;
    }

    /**
     * @param StructureCollection $structs
     * @param ScalarSpecification $scalarSpec
     * @return float|int
     */
    public function calculate(StructureCollection $structs, ScalarSpecification $scalarSpec)
    {
        $class = $this->checkingCondClass();
        /* @var ScalarSpecification $class */
        $typeStr = $scalarSpec->getType();
        $field = $scalarSpec->getField();

        if ($typeStr === 'avg') {
            if(!isset($field)) {
                return null;
            } else {
                return $this->calcAvg($structs, $field);
            }
        } elseif ($typeStr === 'count') {
            if(!isset($field)) {
                return $structs->count();
            } else {
                return $this->calcCount($structs, $field);
            }
        } elseif ($typeStr === 'max') {
            if(!isset($field)) {
                return null;
            } else {
                return $this->calcMax($structs, $field);
            }
        } elseif ($typeStr === 'min') {
            if(!isset($field)) {
                return null;
            } else {
                return $this->calcMin($structs, $field);
            }
        } elseif ($typeStr === 'sum') {
            if(!isset($field)) {
                return null;
            } else {
                return $this->calcSum($structs, $field);
            }
        } elseif ($typeStr === 'long') {
            if(!isset($field)) {
                return null;
            } else {
                return $this->calcLong($structs, $field);
            }
        } elseif ($typeStr === 'short') {
            if(!isset($field)) {
                return null;
            } else {
                return $this->calcShort($structs, $field);
            }
        } else {
            throw new \RuntimeException('Unknown scalar operator type: ' . $typeStr);
        }
    }

    /**
     * @param StructureCollection $structs
     * @param string $field
     * @return float|null
     */
    protected function calcAvg(StructureCollection $structs, string $field): ?float
    {
        $relativeValues = $structs
            ->filteredBy(fn(Structure $s) => (is_numeric($s->get($field))))
            ->map(fn(Structure $s) => ($s->get($field)));
        if(count($relativeValues) === 0) {
            return null;
        }
        $sum = 0;
        foreach ($relativeValues as $val)
        {
            $sum += $val;
        }
        return $sum / count($relativeValues);
    }

    /**
     * @param StructureCollection $structs
     * @param string $field
     * @return int|null
     */
    protected function calcCount(StructureCollection $structs, string $field): ?int
    {
        $relativeValues = $structs
            ->filteredBy(fn(Structure $s) => (!is_null($s->get($field))))
            ->map(fn(Structure $s) => ($s->get($field)));
        return count($relativeValues);
    }

    /**
     * @param StructureCollection $structs
     * @param string $field
     * @return float|null
     */
    protected function calcMax(StructureCollection $structs, string $field): ?float
    {
        $relativeValues = $structs
            ->filteredBy(fn(Structure $s) => (is_numeric($s->get($field))))
            ->map(fn(Structure $s) => ($s->get($field)));
        if(count($relativeValues) === 0) {
            return null;
        }
        $max = current($relativeValues);
        foreach ($relativeValues as $val)
        {
            if($val > $max) {
                $max = $val;
            }
        }
        return $max;
    }

    /**
     * @param StructureCollection $structs
     * @param string $field
     * @return float|null
     */
    protected function calcMin(StructureCollection $structs, string $field): ?float
    {
        $relativeValues = $structs
            ->filteredBy(fn(Structure $s) => (is_numeric($s->get($field))))
            ->map(fn(Structure $s) => ($s->get($field)));
        if(count($relativeValues) === 0) {
            return null;
        }
        $min = current($relativeValues);
        foreach ($relativeValues as $val)
        {
            if($val < $min) {
                $min = $val;
            }
        }
        return $min;
    }

    /**
     * @param StructureCollection $structs
     * @param string $field
     * @return float|null
     */
    protected function calcSum(StructureCollection $structs, string $field): ?float
    {
        $relativeValues = $structs
            ->filteredBy(fn(Structure $s) => (is_numeric($s->get($field))))
            ->map(fn(Structure $s) => ($s->get($field)));
        if(count($relativeValues) === 0) {
            return null;
        }
        $sum = 0;
        foreach ($relativeValues as $val)
        {
            $sum += $val;
        }
        return $sum;
    }

    /**
     * @param StructureCollection $structs
     * @param string $field
     * @return float|null
     */
    protected function calcLong(StructureCollection $structs, string $field): ?float
    {
        $relativeValues = $structs
            ->filteredBy(fn(Structure $s) => (!is_null($s->get($field))))
            ->map(fn(Structure $s) => ($s->get($field)));
        if(count($relativeValues) === 0) {
            return null;
        }
        $long = strlen(current($relativeValues));
        foreach ($relativeValues as $val)
        {
            $currentStrlen = strlen($val);
            if($currentStrlen > $long) {
                $long = $currentStrlen;
            }
        }
        return $long;
    }

    /**
     * @param StructureCollection $structs
     * @param string $field
     * @return float|null
     */
    protected function calcShort(StructureCollection $structs, string $field): ?float
    {
        $relativeValues = $structs
            ->filteredBy(fn(Structure $s) => (!is_null($s->get($field))))
            ->map(fn(Structure $s) => ($s->get($field)));
        if(count($relativeValues) === 0) {
            return null;
        }
        $short = strlen(current($relativeValues));
        foreach ($relativeValues as $val)
        {
            $currentStrlen = strlen($val);
            if($currentStrlen < $short) {
                $short = $currentStrlen;
            }
        }
        return $short;
    }
}