<?php

namespace Pamit\Core\Storage;

use Pamit\Core\Storage\Contracts\StorageInterface;

class SessionStorage implements StorageInterface
{

    protected $storageKey = 'items';

    public function __construct($storageKey = null)
    {
        if($storageKey){
            $this->storageKey = $storageKey;
        }

        if (!isset($_SESSION[$this->storageKey])) {
            $_SESSION[$this->storageKey] = [];
        }
    }

    public function set($key, $value)
    {
        $_SESSION[$this->storageKey][$key] = serialize($value);
    }

    public function get($key)
    {
        if (!isset($_SESSION[$this->storageKey][$key])) {
            return null;
        }

        return unserialize($_SESSION[$this->storageKey][$key]);
    }

    public function delete($key)
    {
        unset($_SESSION[$this->storageKey][$key]);
    }

    public function destroy()
    {
        unset($_SESSION[$this->storageKey]  );
    }

    public function all()
    {
        $items = [];

        foreach ($_SESSION[$this->storageKey] as $key => $item) {
            $items[$key] = unserialize($item);
        }

        return $items;
    }
}