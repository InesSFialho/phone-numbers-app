<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $appends = ['country', 'state', 'code', 'number'];

    public function getCountryAttribute()
    {
        preg_match('/\((?<res>\d{3})/i', $this->phone, $code);

        switch ($code['res']) {
            case '237':
                return $this->country = 'Cameroon';
                break;
            case '251':
                return $this->country = 'Ethiopia';
                break;
            case '212':
                return $this->country = 'Morocco';
                break;
            case '258':
                return $this->country = 'Mozambique';
                break;
            case '256':
                return $this->country = 'Uganda';
                break;
            default:
                return $this->country = 'Not Defined';
                break;
        }
    }

    public function getStateAttribute()
    {
        preg_match('/\(\d{3}\)\s(?<res>\d*)/i', $this->phone, $number);

        switch ($this->country) {
            case 'Cameroon':
                return $this->state = (strlen((string)$number['res']) == 7 || strlen((string)$number['res']) == 8) ? 'Valid' : 'Not Valid';
                break;

            case 'Ethiopia':
                return $this->state = (strlen((string)$number['res']) == 8) ? 'Valid' : 'Not Valid';
                break;

            case 'Morocco':
                return $this->state = (strlen((string)$number['res']) == 8) ? 'Valid' : 'Not Valid';
                break;

            case 'Mozambique':
                return $this->state = (strlen((string)$number['res']) == 7 || strlen((string)$number['res']) == 8) ? 'Valid' : 'Not Valid';
                break;

            case 'Uganda':
                return $this->state = (strlen((string)$number['res']) == 9) ? 'Valid' : 'Not Valid';
                break;
        }

        return $this->state = 'Valid';
    }

    public function getCodeAttribute()
    {
        preg_match('/\((?<res>\d{3})/i', $this->phone, $code);
        return $this->code = $code['res'];
    }

    public function getNumberAttribute()
    {
        preg_match('/\(\d{3}\)\s(?<res>\d*)/i', $this->phone, $number);
        return $this->number = $number['res'];
    }
}
