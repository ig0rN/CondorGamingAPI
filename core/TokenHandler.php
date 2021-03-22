<?php

namespace Core;

class TokenHandler
{
    private string $method;

    /**
     * AccessDenied constructor.
     * ideal solution is to pass Request $request from Symfony
     * @param string $method
     */
    public function __construct(string $method)
    {
        $this->method = strtoupper($method);
    }

    public function verifyToken(): bool {
//        if (!$customerToken = $this->findTokenFromRequest()) {
//            return false;
//        }
//
//        Token Object
//        $dbToken = $this->db->getTokenByString($customerToken);
//        if(empty($dbToken)) {
//          return false;
//        }
//
//        if ($dbToken->expired()) {
              //delete token and force new authorization
//
//            $this->db->remove($dbToken);
//            $this->db->flush();
//
//            return false;
//        }

        return true;
    }

    /**
     * Find token in global variables
     *
     * @return string|null
     */
//    private function findTokenFromRequest()
//    {
//        if ($this->method === 'GET' && isset($_GET['token']) && !empty(($_GET['token']))) {
//            return $_GET['token'];
//        }
//        if ($this->method === 'POST' && isset($_POST['token']) && !empty(($_POST['token']))) {
//            return $_POST['token'];
//        }
//        return null;
//    }
}