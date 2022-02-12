<?php

class Flux
{

    private $nom;

    private $url;

    private $id;



    public function __construct($id, $nom, $url)
    {
        $this->url = $url;
        $this->id = $id;
        $this->nom = $nom;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Returns a list of Personality objects
     * @return Flux
     */
    function getFlux() {
        return $this;
    }

}