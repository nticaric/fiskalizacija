<?php namespace Nticaric\Fiskalizacija\Generators;

/**
 * Class representing EchoRequest
 *
 * Poruka echo metodi.
 */
class EchoRequest
{
    /**
     * Poruka
     *
     * @var string $message
     */
    private $message = null;

    public function __construct($message)
    {
        $this->setMessage($message);
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;
        return $this;
    }
}
