<?php
use Illuminate\Support\Facades\Mail;

if (!function_exists('sendMailTo')) :

    function sendMailTo($email, $data)
    {
        try{
            if($email != null || $email != ""):
                $view = 'email.default-template';

               if(isset($data['purpose'])){
                   if($data['purpose'] == 'ingredient_stock_alert'):
                       $view  = 'email.ingredient_stock_alert';
                   endif;
                }

                Mail::send($view, [
                    'data' => $data
                ], function ($message) use ($email, $data) {
                    $message    ->to($email);
                    if(isset($data['from']))
                        $message    ->from($data['from']);
                    $message    ->subject($data['subject']);
                });
            return true;
            endif;
        }
        catch (\Exception $e){
            return false;
        }
    }
endif;
