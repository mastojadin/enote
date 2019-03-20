<?php namespace App\Helpers;

class Alerts
{
    public static function getAlert($id)
    {
        $to_return = [];

        switch ($id[0]) {
            case '0':
                $to_return['type'] = 'success';
                switch($id[1]) {
                    case '0':
                        $to_return['msg'] = 'Action successful.';
                        break;
                    default:
                        $to_return['msg'] = 'Success Error';
                }
                break;
            case '1':
                $to_return['type'] = 'warning';
                switch($id[1]) {
                    case '0':
                        $to_return['msg'] = 'Server error. Please try again.';
                        break;
                    case '1':
                        $to_return['msg'] = 'Image not properly uploaded. Please try again.';
                        break;
                    default:
                        $to_return['msg'] = 'Warning Error';
                }
                break;
            case '2':
                $to_return['type'] = 'danger';
                switch($id[1]) {
                    default:
                        $to_return['msg'] = 'Danger Error';
                }
                break;
            case '3':
                $to_return['type'] = 'info';
                switch($id[1]) {
                    default:
                        $to_return['msg'] = 'Info Error';
                }
                break;
            default:
                $to_return['type'] = 'default';
        }

        return $to_return;
    }
}
