<?php

namespace Src\Models;

class User extends Model
{
    public $table = 'users';

    public function login(string $email, string $password): array
    {
        $user = $this->where('email', '=', $email)->first();

        if (isset($user)) {
            if ($user->status == 'off') {
                return ['status' => false, 'message' => __('This user is inactive!')];
            } elseif (password_verify($password, $user->password)) {
                $this->removeTokensInvalid($user->id);
                $token = $this->generateToken();

                $accToken = new AccessToken();
                $accToken->create([
                    'token' => $token,
                    'user_id' => $user->id,
                ]);

                $user->token = $token;

                return ['status' => true, 'message' => __('Login successfully! Welcome :user', [':user' => $user->name]), 'user' => $user];
            } else {
                return ['status' => false, 'message' => __('Invalid password!')];
            };
        } else {
            return ['status' => false, 'message' => __('User not registered in the system!')];
        };
    }

    public function logout(?int $userId = null): void
    {
        $accToken = new AccessToken();

        if (isset($userId)) {
            $accToken->where('user_id', '=', $userId)->delete();
        } else {
            $token = $_COOKIE['token'];

            $accToken->where('token', '=', $token)->delete();

            setcookie('token', '', time() - 3600, "/");
            setcookie('user_name', '', time() - 3600, "/");
            setcookie('user_id', '', time() - 3600, "/");
            setcookie('user_avatar', '', time() - 3600, "/");
            setcookie('site_settings', '', time() - 3600, "/");

            session_destroy();
        };
    }

    public function token(): AccessToken
    {
        return $this->hasMany(AccessToken::class, 'access_token', 'user_id');
    }

    public function properties(): Property
    {
        return $this->hasMany(Property::class, 'properties', 'user_id');
    }

    protected function generateToken(): string
    {
        return bin2hex(random_bytes(30));
    }

    protected function removeTokensInvalid(int $userId): void
    {
        $accToken = new AccessToken();
        $accToken->where('user_id', '=', $userId)->delete();
    }
}
