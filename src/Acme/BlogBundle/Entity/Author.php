<?php

namespace Acme\BlogBundle\Author;

use Symfony\Component\Validator\Constraints as Assert;

class Author
{
    /**
     * @Assert\NotBlank(message = "author.name.not_blank")
     */
    public  $name;
}

