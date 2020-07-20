<?php
// https://ourcodeworld.com/articles/read/1059/how-to-implement-your-own-user-authentication-system-in-symfony-4-3-part-3-creating-a-login-form-and-logout-route
// src/Security/LoginAuthenticator.php
namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

use App\Traits\LogTrait;
use App\Component\Curl;

class LoginAuthenticator extends AbstractGuardAuthenticator
{
    use LogTrait;
    private $entityManager;
    //private $csrfTokenManager;
    private $passwordEncoder;

    public function __construct(
        EntityManagerInterface $entityManager,
        //CsrfTokenManagerInterface $csrfTokenManager,
        UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->entityManager = $entityManager;
        //$this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * Called on every request to decide if this authenticator should be
     * used for the request. Returning `false` will cause this authenticator
     * to be skipped.
     */
    public function supports(Request $request)
    {
        //si es la ruta login
        return 'check-login' === $request->attributes->get('_route')
            && $request->isMethod('POST');
    }

    /**
     * Called on every request. Return whatever credentials you want to
     * be passed to getUser() as $credentials.
     */
    public function getCredentials(Request $request)
    {
//$this->logd($request,"obj request");
$this->logd($_POST,"_POST");
        $credentials = [
            "action" => $request->get('action'),
            'email' => $request->get('username'),
            'password' => $request->get('password'),
            //'csrf_token' => $request->get('_csrf_token'),
        ];

$this->logd($credentials,"credentials");

        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['email']
        );

        return $credentials;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        // The token header was empty, authentication fails with HTTP Status
        // Code 401 "Unauthorized"
        if (null === $credentials) return null;

        $action = $credentials["action"] ?? "";
        if ($action !== "admin-login") throw new \Exception("Wrong action provided",401);

        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $credentials['email']]);
        if (!$user) throw new CustomUserMessageAuthenticationException('Email could not be found.');

        return $user;
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return $this->passwordEncoder->isPasswordValid($user, $credentials['password']);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        $data = [
            // you may want to customize or obfuscate the message first
            "usertoken" => "xxx",
            "resourcetoken" => "yyyy",
            // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        ];

        return new JsonResponse($data, Response::HTTP_ACCEPTED);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $data = [
            // you may want to customize or obfuscate the message first
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData())

            // or to translate this message
            // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Called when authentication is needed, but it's not sent
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $data = [
            // you might translate this message
            'message' => 'Authentication Required'
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    public function supportsRememberMe(){return false;}
}