<?php

namespace Snide\Zibase\Client;

use Snide\Zibase\Client as BaseClient;

/**
 * Class Response
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class Response extends BaseClient
{
    /**
     * Constructor
     * 
     * Inject binary datas into response object
     * 
     * @param binary $buffer
     */
    public function __construct($buffer)
    {
        $data = unpack(
            "c4header/ncommand/c16reserved1/c16zibaseId/c12reserved2/Nparam1/Nparam2/Nparam3/Nparam4/nmyCount/nyourCount/c*message", 
            $buffer
        );
        
        $this->header    = substr($buffer, 0, 4);
        $this->reserved1 = substr($buffer, 6, 16);
        $this->zibaseId  = substr($buffer, 22, 16);
        $this->reserved2 = substr($buffer, 38, 12);   
        $this->message   = substr($buffer, 70);  
             
        $this->command   = $data["command"];
        $this->param1    = $data["param1"];
        $this->param2    = $data["param2"];
        $this->param3    = $data["param3"];
        $this->param4    = $data["param4"];
        $this->myCount   = $data["myCount"];
        $this->yourCount = $data["yourCount"];     

        var_dump($this); 
    }
}