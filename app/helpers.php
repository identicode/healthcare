<?php

if (!function_exists('dd_to_dms')) {

    function dd_to_dms(float $latitude, float $longitude): string
    {
        $latitudeDirection  = $latitude < 0 ? 'S' : 'N';
        $longitudeDirection = $longitude < 0 ? 'W' : 'E';

        $latitudeNotation  = $latitude < 0 ? '-' : '';
        $longitudeNotation = $longitude < 0 ? '-' : '';

        $latitudeInDegrees  = floor(abs($latitude));
        $longitudeInDegrees = floor(abs($longitude));

        $latitudeDecimal  = abs($latitude) - $latitudeInDegrees;
        $longitudeDecimal = abs($longitude) - $longitudeInDegrees;

        $_precision       = 3;
        $latitudeMinutes  = round($latitudeDecimal * 60, $_precision);
        $longitudeMinutes = round($longitudeDecimal * 60, $_precision);

        return sprintf('%s%s° %s %s %s%s° %s %s',
            $latitudeNotation,
            $latitudeInDegrees,
            $latitudeMinutes,
            $latitudeDirection,
            $longitudeNotation,
            $longitudeInDegrees,
            $longitudeMinutes,
            $longitudeDirection
        );

    }
}

if (!function_exists('name')) {
    /**
     * Convert the JSON object of name into readable name
     */
    function name(array | object | null $name, $arrangement = 'FMIL'): ?string
    {
        if ($name == null) {
            return null;
        }

        $name = (array) $name;

        $fname = (array_key_exists('first', $name)) ? ucfirst($name['first']) : "";
        $lname = (array_key_exists('last', $name)) ? ucfirst($name['last']) : "";
        $mname = (array_key_exists('middle', $name)) ? ucfirst($name['middle']) : "";

        // $fname = @$name['fname'];
        // $mname = @$name['mname'];
        // $lname = @$name['lname'];

        switch ($arrangement) {

            case 'LFMI':
                $name = $lname . ", " . $fname . " " . @$mname[0] . ".";
                break;

            case 'LFM':
                $name = $lname . ", " . $fname . " " . $mname;
                break;

            case 'FMIL':
                $name = $fname . " " . @$mname[0] . ". " . $lname;
                break;

            case 'FL':
                $name = $fname . " " . $lname;
                break;

            case 'FMNL':
                $name = $fname . " " . $mname . " " . $lname;
                break;

            case 'SYM-F':
                $name = strtoupper($fname[0]);
                break;

            case 'SYM-FL':
                $name = substr($fname, 0, 1) . substr($lname, 0, 1);
                break;

            default:
                $name = null;
                break;
        }

        return $name;
    }
}
