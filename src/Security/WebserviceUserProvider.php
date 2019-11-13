<?php

namespace App\Security;

use App\Security\User\WebserviceUser;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class WebserviceUserProvider implements UserProviderInterface
{
    public function loadUserByUsername($username)
    {
        return $this->fetchUser($username);
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof WebserviceUser) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        $username = $user->getUsername();

        return $this->fetchUser($username);
    }

    public function supportsClass($class)
    {
        return WebserviceUser::class === $class;
    }

    private function fetchUser($username)
    {
        $api = HttpClient::create();

        //$email = str_replace('"', "", $form['email']->getData());
        // make a call to your webservice here
        $response =  $api->request('GET', "http://127.0.0.1:9000/users/$username");
        
        $userData = $response->toArray();
        // pretend it returns an array on success, false if there is no user

        if ($userData) {
            $password = $userData[0]['mot_de_passe'];
            $username = $userData[0]['email'];
            $salt = 'null';
            $roles = ['USER_ROLES'];

            // ...

            return new WebserviceUser($username, $password, $salt, $roles);
        }

        throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $username)
        );
    }
}