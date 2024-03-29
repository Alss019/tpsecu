<?php

class Utilisateur
{
    //attributs
    private ?int $id_util;
    private ?string $name_util;
    private ?string $first_name_util;
    private ?string $mail_util;
    private ?string $pwd_util;
    private ?int $id_role;
    private ?bool $valide_util;
    private ?string $token_util;

    //  * ---------------------- *
    //  * -----CONSTRUCTEUR----- *
    //  * ---------------------- *

    public function __construct(?string $name, ?string $first, ?string $mail, ?string $pwd, ?int $id_role)
    {
        $this->name_util = $name;
        $this->first_name_util = $first;
        $this->mail_util = $mail;
        $this->pwd_util = $pwd;
        $this->id_role = $id_role;
        $this->valide_util = 0;
    }

    //  * ---------------------- *
    //  * --------GETTER-------- *
    //  * ---------------------- *

    public function getIdUtil(): ?int
    {
        return $this->id_util;
    }
    public function getNameUtil(): ?string
    {
        return $this->name_util;
    }
    public function getFirstNameUtil(): ?string
    {
        return $this->first_name_util;
    }
    public function getMailUtil(): ?string
    {
        return $this->mail_util;
    }
    public function getPwdUtil(): ?string
    {
        return $this->pwd_util;
    }
    public function getIdRole(): ?int
    {
        return $this->id_role;
    }
    public function getValide(): ?bool
    {
        return $this->valide_util;
    }
    public function getToken(): ?string
    {
        return $this->token_util;
    }


    //  * ---------------------- *
    //  * --------SETTER-------- *
    //  * ---------------------- *


    public function setIdUtil(?int $id): void
    {
        $this->id_util = $id;
    }
    public function setNameUtil(?string $name): void
    {
        $this->name_util = $name;
    }
    public function setFirstNameUtil(?string $first): void
    {
        $this->first_name_util = $first;
    }
    public function setMailUtil(?string $mail): void
    {
        $this->mail_util = $mail;
    }
    public function setPwdUtil(?string $pwd): void
    {
        $this->pwd_util = $pwd;
    }
    public function setIdRole(?int $id): void
    {
        $this->id_role = $id;
    }
    public function setValide(?bool $valide): void
    {
        $this->valide_util = $valide;
    }
    public function setToken(?string $token): void
    {
        $this->token_util = $token;
    }
}
