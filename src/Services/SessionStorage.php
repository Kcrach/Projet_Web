<?php

namespace pw\Services;

session_start();

/**
 * @class SessionStorage
 * Create a collection stores into PHP session
 */
class SessionStorage
{
    public function __construct()
    {
        if (!isset($_SESSION['collection'])) {
            $_SESSION['collection'] = [];
        }
    }

    /**
     * Add an element into collection
     * @param mixed $element
     * @return SessionStorage
     */
    public function addElement($element)
    {
        $_SESSION['collection'][] = $element;

        return $this;
    }

    /**
     * Get all elements of collection
     * @return array
     */
    public function getElements()
    {
        return $_SESSION['collection'];
    }

    /**
     * Remove an element
     * @param int $index
     * @return array
     */
    public function removeElement($index)
    {
        if (isset($_SESSION['collection'][$index])) {
            unset($_SESSION['collection'][$index]);
        }

        return $_SESSION['collection'];
    }

    public function setConnected($_bool){
        $_SESSION['connected'] = $_bool;
        return $this;
    }

    public function isConnected(){
        if(isset($_SESSION['connected']))
            return $_SESSION['connected'];
        else
            return false;
    }

    public function setBlogger($_bool){
        $_SESSION['blogger'] = $_bool;
        return $this;
    }

    public function isBlogger(){
        if(isset($_SESSION['blogger']))
            return $_SESSION['blogger'];
        else
            return false;
    }

}
