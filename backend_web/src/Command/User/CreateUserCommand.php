<?php
//  php bin/console app:createuser <email> <password> <profile: 1-5>
// para que funcione hay que sar .env.local con ip 127 no el contenedor
namespace App\Command\User;

use App\Entity\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use App\Services\Common\UserService;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateUserCommand extends Command
{
    const SUCCESS = 0;
    const FAILURE = 1;

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:createuser';

    private UserService $userService;
    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder, UserService $userService)
    {
        parent::__construct();
        $this->userService = $userService;
        $this->encoder = $encoder;
    }

    //datos del menú: php bin/console
    protected function configure()
    {
        //php bin/console list
        $this->setDescription("Creates a new user.")
            // the "--help" option
            ->setHelp('This command allows you to create a user...')
        ;
        $this
            // ...
            ->addArgument('email', InputArgument::REQUIRED, 'User email')
            ->addArgument('password', InputArgument::REQUIRED, 'User password')
            ->addArgument('profile', InputArgument::OPTIONAL, 'User profile: 1:admin, 2:system, 3:enterprise, 4:user, 5:anonymous')
        ;
    }

    private function handleInput(InputInterface $input)
    {
        $email = $input->getArgument("email");
        $email = trim($email);
        if(!$email)  throw new \Exception("Email required");

        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            throw new \Exception("Invalid email: {$email}");

        $password = $input->getArgument("password");
        $password = trim($password);
        if(!$password) throw new \Exception("Password required");

        $oUser = $this->userService->find_one_by_email($email);
        if($oUser)
            throw new \Exception("User with email: {$email} already exists");

        $profile = $input->getArgument("profile");
        $profile = trim($profile);
        if($profile){
            $iprofile = (int) $profile;
            $profile = $iprofile;

            if($iprofile>5 || $iprofile<1)
                throw new \Exception("Wrong profile submited: {$iprofile}");
        }

        if(!$profile) $profile = 3; //user

        return [
            "email" => $email,
            "password" => $password,
            "profile" => $profile
        ];

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $ardata = $this->handleInput($input);
        //$output->writeln($ardata);
        $output->writeln([
            "Usuario creado:",
            "email: {$ardata["email"]}",
            "password: {$ardata["password"]}",
            "profile: {$ardata["profile"]}",
        ]);

        $oUser = new User();
        $oUser->setEmail($ardata["email"]);
        $oUser->setPassword($ardata["password"]);
        $oUser->setIdProfile($ardata["profile"]);
        $this->userService->register($this->encoder, $oUser);

        return self::SUCCESS;
    }
}