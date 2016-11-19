<?php

class cronCommand extends CConsoleCommand{
    public function run($args)
    {
        BargainController::confirmBid();
        
    }
}