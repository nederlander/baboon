<?php
/**
 * Baboon Framework
 *
 * @author Merijn Kruithof <merijnkruithof@hotmail.com>
 * @license MIT
 */

namespace Baboon;

use Baboon\Exceptions\IllegalRequestTypeException;

class App
{
    /**
     * @var array
     */
    private $allowed = [
        'get',
        'post',
        'put',
        'delete'
    ];

    /**
     * Check if the property name is legal. It will respond
     * to the request if that's the case.
     *
     * @param string $name
     * @param array $arguments
     */
    public function __call($name, $arguments)
    {
        if (!in_array($name, $this->getAllowedRequestTypes())) {
            throw new IllegalRequestTypeException(sprintf("%s is not a legal request type", $name));
        }

        $this->respond($name, $arguments);
    }

    public function respond($name, array $arguments = array())
    {
        throw new \Exception("This method is not implemented yet.");
    }

    /**
     * Return the allowed request types.
     *
     * @return array
     */
    public function getAllowedRequestTypes()
    {
        return $this->allowed;
    }
}
