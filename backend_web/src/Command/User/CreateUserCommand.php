<?php
//  php bin/console app:createuser <email> <password>
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
        $this->userService = $userService;
        $this->encoder = $encoder;
        parent::__construct();

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
        if(!$oUser)
            return [
                "email" => $email,
                "password" => $password
            ];

        throw new \Exception("User with email: {$email} already exists");
        return self::FAILURE;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $ardata = $this->handleInput($input);
        $output->writeln($ardata);

        $oUser = new User();
        $oUser->setEmail($ardata["email"]);
        $oUser->setPassword($ardata["password"]);
        $this->userService->register($this->encoder, $oUser);

        $output->write("User: ");
        return self::SUCCESS;
    }
}