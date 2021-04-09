<?php

interface Provider{

    function createProvider() : AuthProvider;
}


interface AuthProvider{
    function login();
    function logout();
}

class LocalHandler implements AuthProvider{

    protected $usr;
    protected $password;

    public function __construct($usr, $password){
        $this->usr      = $usr;
        $this->password = $password;
    }

    function login(){   
        if($this->usr == 'luis' && $this->password == 'admin'){
            echo "Login local provider \n";
        }else{
            throw new Exception("denied access!!");
        }
    }
    function logout(){
        echo "session close succesfully via local! \n";
    }
}

class Local implements Provider{

    protected $usr;
    protected $password;

    public function __construct($usr, $password){
        $this->usr      = $usr;
        $this->password = $password;
    }

    function createProvider() : AuthProvider{

        return new LocalHandler($this->usr, $this->password);
    }
}

class Facebook implements AuthProvider{
    function login(){
        echo "Login via facebook \n";
    }
    function logout(){
        echo "Session close succesfully via local Facebook! \n";
    }
}

class SocialNetwork implements Provider{

    function createProvider(): AuthProvider
    {
        return new Facebook();
    }
}



function client(Provider $provider) : void{

    $auth = $provider->createProvider();
    $auth->login();
    $auth->logout();

}

// CONTROLLER... 
// you can continue adding providers without altering the client's code 
client(new Local('luis', 'admin'));
client(new SocialNetwork());
    



