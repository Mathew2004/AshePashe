<?php

if (!function_exists("extractCoordinatesFromUrl")) {
    function extractCoordinatesFromUrl($url)
    {
        // Improved regex pattern to match lat,lng from Google Maps URL
        $pattern = '/@(-?\d+\.\d+),(-?\d+\.\d+)/';

        if (preg_match($pattern, $url, $matches)) {
            return [
                'lat' => $matches[1],
                'lng' => $matches[2],
            ];
        }

        // Alternative patterns to capture lat/lng from URL
        $patterns = [
            '/@(-?\d+\.\d+),(-?\d+\.\d+),/', // Coordinates with optional zoom level
            '/place\/(-?\d+\.\d+),(-?\d+\.\d+)/', // Coordinates in place URL
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return [
                    'lat' => $matches[1],
                    'lng' => $matches[2],
                ];
            }
        }

        return null;
    }
}

function getCoordinatesFromUrl($url)
{
    $coordinates = extractCoordinatesFromUrl($url);

    if ($coordinates) {
        return $coordinates;
    }

    return response()->json(['error' => 'Invalid URL or coordinates not found'], 400);
}

function haversineDistance($lat1, $lon1, $lat2, $lon2)
{
    $earthRadius = 6371; // Radius of the Earth in kilometers

    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);

    $a = sin($dLat / 2) * sin($dLat / 2) +
        cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
        sin($dLon / 2) * sin($dLon / 2);

    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    return $earthRadius * $c; // Distance in kilometers
}


function natural_time(DateTime $datetime) {

    $now = new DateTime('now', new DateTimeZone('Asia/Dhaka')); // or your specific timezone
    $datetime->setTimezone(new DateTimeZone('Asia/Dhaka'));

    if ($datetime < $now) {
        return 'Finished';
    }
    $diff = $now->diff($datetime);

    $units = [
        'year' => $diff->y,
        'month' => $diff->m,
        'day' => $diff->d,
        'hour' => $diff->h,
        'minute' => $diff->i,
        'second' => $diff->s
    ];

    foreach ($units as $unit => $value) {
        if ($value > 0) {
            return $value . ' ' . $unit . ($value > 1 ? 's' : '') . ' left';
        }
    }

    return 'Finished';
}




?>