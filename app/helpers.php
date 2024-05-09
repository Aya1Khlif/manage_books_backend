<php
if (!function_exists('formatDate')) {
    function formatDate($dateString, $format = 'Y-m-d H:i:s')
    {
        return \Illuminate\Support\Carbon::parse($dateString)->format($format);
    }
}
