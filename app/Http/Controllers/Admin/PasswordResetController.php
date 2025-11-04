<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PasswordResetController extends Controller
{
    public function reset(Request $request)
    {
        $email = $request->email;

        // ✅ Check if user exists
        $user = DB::table('users')
            ->where('email', $email)
            ->first();

        if ($user) {
            $code = md5($email);

            // ✅ Update user with temporary code
            DB::table('users')
                ->where('id', $user->id)
                ->update(['tmp_code' => $code]);

            // ✅ Send email
            $mail = new PHPMailer(true);

            try {
                /* SMTP Settings */
                $mail->isSMTP();
                $mail->Host       = env('MAIL_HOST');
                $mail->SMTPAuth   = true;
                $mail->Username   = env('MAIL_USERNAME');
                $mail->Password   = env('MAIL_PASSWORD');
                $mail->SMTPSecure = env('MAIL_ENCRYPTION');
                $mail->Port       = env('MAIL_PORT');
                $mail->CharSet    = 'UTF-8';

                $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Request';
                $mail->Body = "
                    <h3>Password Reset Request</h3>
                    <p>Hello,</p>
                    <p>Use this code to reset your password:</p>
                    <h2>{$code}</h2>
                    <p>If you didn’t request this, please ignore this email.</p>
                ";

                // ✅ Corrected this: must call $mail->send()
                if (!$mail->send()) {
                    return back()->with('error', "Email not sent. Error: " . $mail->ErrorInfo);
                } else {
                    return back()->with('success', "Email has been sent successfully to {$email}");
                }

            } catch (Exception $e) {
                // ✅ Catch PHPMailer exception properly
                return back()->with('error', "Email could not be sent. Error: {$mail->ErrorInfo}");
            }

        } else {
            return back()->with('error', "No user found with this email.");
        }
    }
}
