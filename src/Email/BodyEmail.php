<?php

namespace Src\Email;

class BodyEmail
{
    public static function contact(array $data, string $title = ''): string
    {
        $nameTrans = __('Name');
        $phoneTrans = __('Phone');

        $message = <<<EOT
            <div style="padding: 1rem; background: #ffffff; border-radius: 5px; color: #711613;">
                <ul style="list-style: none; margin: 0;">
                    <li><strong>{$nameTrans}</strong>: {$data['name']}</li>
                    <li><strong>{$phoneTrans}</strong>: {$data['phone']}</li>
                    <li style="margin-top: 20px;">{$data['message']}</li>
                </ul>
            </div>
        EOT;

        return self::getLayout($message, $title);
    }

    public static function announce(array $data, string $title = ''): string
    {
        $nameTrans = __('Name');
        $emailTrans = __('Email');
        $phoneTrans = __('Phone');
        $typePropertyTrans = __('Purpose of the property');
        $andressTrans = __('Property address');

        $message = <<<EOT
            <div style="padding: 1rem; background: #ffffff; border-radius: 5px; color: #711613;">
                <ul style="list-style: none; margin: 0;">
                    <li><strong>{$nameTrans}</strong>: {$data['name']}</li>
                    <li><strong>{$emailTrans}</strong>: {$data['email']}</li>
                    <li><strong>{$phoneTrans}</strong>: {$data['phone']}</li>
                    <li><strong>Whatsapp</strong>: {$data['whatsapp']}</li>
                    <li><strong>{$typePropertyTrans}</strong>: {$data['type']}</li>
                    <li><strong>{$andressTrans}</strong>: {$data['andress']}</li>
                    <li style="margin-top: 20px;">{$data['message']}</li>
                </ul>
            </div>
        EOT;

        return self::getLayout($message, $title);
    }

    private static function getLayout(string $slot, string $title): string
    {
        $copy = SETTINGS->copyright;

        return <<<EOT
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body style="padding: 1.4rem; background: #711613; font-family: sans-serif">
            <div style="color: #ffffff; padding: 1rem 0; text-align: center;">
                <h1>{$title}</h1>
            </div>

            {$slot}

            <div style="padding: 1rem; background: #6C757D; margin-top: 20px; color: #ffffff; text-align: center; border-radius: 5px;">
                <p>{$copy}</p>
            </div>
        </body>
        </html>
        EOT;
    }
}
