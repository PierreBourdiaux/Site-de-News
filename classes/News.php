<?php

class News { 

public $urlart;

public $titre;

public $date;

public $nom;

public $url;


	public function __construct(string $urlart, string $titre, string $date, string $nom, string $url) {
		$this->url=$url;
		$this->urlart=$urlart;
		$this->date=$date;
		$this->nom=$nom;
		$this->titre=$titre;
	}

	/**
	 * @return string
	 */
	public function getUrlart(): string
	{
		return $this->urlart;
	}

	/**
	 * @param string $urlart
	 */
	public function setUrlart(string $urlart)
	{
		$this->urlart = $urlart;
	}

	/**
	 * @return string
	 */
	public function getTitre(): string
	{
		return $this->titre;
	}

	/**
	 * @param string $titre
	 */
	public function setTitre(string $titre)
	{
		$this->titre = $titre;
	}

	/**
	 * @return string
	 */
	public function getDate(): string
	{
		return $this->date;
	}

	/**
	 * @param string $date
	 */
	public function setDate(string $date)
	{
		$this->date = $date;
	}

	/**
	 * @return string
	 */
	public function getNom(): string
	{
		return $this->nom;
	}

	/**
	 * @param string $nom
	 */
	public function setNom(string $nom)
	{
		$this->nom = $nom;
	}

	/**
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * @param string $url
	 */
	public function setUrl(string $url)
	{
		$this->url = $url;
	}

 
}

?>
